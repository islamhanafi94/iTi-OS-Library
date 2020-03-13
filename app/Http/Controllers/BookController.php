<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CategoryController;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // dd($request);
        // return ($request->title);
        // validation ?
        $request->validate([
            'title' => 'required|alpha|',
            'author' => 'required|alpha|max:256',
            'available_copies' => 'required',
            'lease_price_per_day' => 'required',
            'description' => 'required',
            'category' => 'required'
            ]);
            
        $categoryID  = CategoryController::getCategoryId($request->category);
        Book::create([
            "title" => $request->title,
            "author" => $request->author,
            "stock" => $request->available_copies,
            "category_id"=>$categoryID,
            "available_copies" => $request->available_copies,
            "lease_price_per_day" => $request->lease_price_per_day,
            "image" => $request->image,
            "description"=>$request->description
            ]
        );
        // return redirect()->route('islam');

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
        //
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
                "image" => $request->image || $book->image,
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


    public function userIndex(Request $request)
    {   //return $request;
        $catagory = CategoryController::getAllCategories();
        if (isset($request->catagory)) {
            if ($request->catagory === "all")
                return view("index", ["books" => Book::all(), "catagory" => $catagory]);
            else {
                $books =  Book::where("category_id", $request->catagory)->get();
                if ($books == null)
                    return view("index", ["catagory" => $catagory]);
                else
                    return view("index", ["books" => $books, "catagory" => $catagory]);
            }
        } else {
            $books =  Book::all();
            if ($books == null)
                return view("index", ["catagory" => $catagory]);
            else
                return view("index", ["books" => $books, "catagory" => $catagory]);
        }
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

    
    // redirct ->route(book page, var => bookList , all comments )

}
