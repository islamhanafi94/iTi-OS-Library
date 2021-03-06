<?php

namespace App\Http\Controllers;

use App\User;
use App\Book;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allBooks = \App\Book::select('*')->get();

        $allCategories =  CategoryController::index();

        return view('books', [
            'allBooks' => $allBooks,
            'allCategories' => $allCategories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', Rule::unique('books')->where(function ($query) {
                return $query->where('deleted_at', NULL);
            })],
            'author' => 'required|max:256',
            'available_copies' => 'required',
            'lease_price_per_day' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);

        if ($files = $request->file('image')) {
            $destinationPath = 'image/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        $categoryID  = CategoryController::getCategoryId($request->category);
        Book::create(
            [
                "title" => $request->title,
                "author" => $request->author,
                "stock" => $request->available_copies,
                "category_id" => $categoryID,
                "available_copies" => $request->available_copies,
                "lease_price_per_day" => $request->lease_price_per_day,
                "image" => $profileImage,
                "description" => $request->description
            ]
        );

        return redirect('dashboard/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $comments = $book->commentedBy()->get();
        $rate = Auth::user()->rate()->where('book_id', $book->id)->get();
        $ratesCount = count($rate);
        if ($ratesCount == 0) {
            return view('book', ['book' => $book, 'comments' => $comments]);
        } else {
            return view('book', ['book' => $book, 'comments' => $comments, 'rate' => $rate[0]]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $categoryID  = CategoryController::getCategoryId($request->category);

        //Validation

        DB::table('books')
            ->where('id', $book->id)
            ->update([
                "title" => $request->title,
                "author" => $request->author,
                "stock" => $request->available_copies,
                "category_id" => $categoryID,
                "available_copies" => $request->available_copies,
                "lease_price_per_day" => $request->lease_price_per_day,
                "image" => $book->image,
                "description" => $request->description
            ]);

        return redirect('dashboard/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('dashboard/books');
    }

    /**
     * Display a listing of Books.
     *
     * @return array of Books.
     */

    public static function getAllBooks()
    {
        $allBooks = \App\Book::select('*')->get();
        return $allBooks;
    }

    public static function handleSortData($sortdata, $userSearch, $sortvalue)
    {
        if ($sortdata == "category") {
            return Book::where("category_id", $sortvalue)->get();
        } else if ($sortdata == "search") {
            return Book::where("title", "like", "%$userSearch%")->orWhere("author", "like", "%$userSearch%")->get();
        }
    }
    public static function getBooksByCategory($category)
    {
        return Book::where("category_id", $category)->get();
    }
    public static function getSearchData($userSearch)
    {
        return Book::where("title", "like", "%$userSearch%")->orWhere("author", "like", "%$userSearch%")->get();
    }

    public static function getBooks()
    {
        return Book::all();
    }

    public static function updateBookRate(int $id, float $avgRate)
    {
        $book = Book::find($id);
        DB::table('books')->where('id', $book->id)->update(["rating" => $avgRate]);
    }
}
