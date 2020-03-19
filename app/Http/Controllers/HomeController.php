<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('checkActive');
        // $this->middleware('CheckUser');
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('dashboard');
        $booksList = BookController::getAllBooks();
        return view('layouts.dashboard', ["booksList" => $booksList]);
    }

    public function userIndex(Request $request)
    {
        $booksList = BookController::getBooks();
        $favorites = UserController::getFavoritesBooks(Auth::id());
        $catagory = CategoryController::getAllCategories();

        //check if user sorted data by latest or rating and sort the books the user curruntly listing 
        if (isset($request->latest) || isset($request->rate)) {
            return handleSorting($request, $booksList, $catagory, $favorites);
        }

        //check if user fliterd books by category 
        if (isset($request->catagory)) {
            return handleFilterByCategory($request, $booksList, $catagory, $favorites);
        }


        // check if user fliterd books by search
        if (isset($request->search)) {
            return handleSearch($request, $booksList, $catagory, $favorites);
        }

        return view("home", ["booksList" => $booksList, "catagory" => $catagory, "sortdata" => "none", "sortvalue" => "none", "favorites" => $favorites]);
    }
}


function handleSorting(Request $request, $booksList, $catagory, $favorites)
{
    $sortdata = $request->sortdata;
    $sortvalue = $request->sortvalue;
    if ($sortdata === "category") {
        if ($sortvalue === "all")
            $booksList = BookController::getBooks();
        else
            $booksList =  BookController::handleSortData($sortdata, null, $sortvalue);
    } elseif ($sortdata === "search") {
        $userSearch = $request->sortvalue;
        $booksList = BookController::handleSortData($sortdata, $userSearch, null);;
    } else if ($sortdata === "none") {
        $booksList = BookController::getBooks();
    }

    if (isset($request->latest)) {
        $booksList = $booksList->sortByDesc("created_at");
    } elseif (isset($request->rate)) {
        $booksList = $booksList->sortByDesc("rating");
    }

    return view("home", ["booksList" => $booksList, "catagory" => $catagory, "sortdata" => $request->sortdata, "sortvalue" => $request->sortvalue, "favorites" => $favorites]);
}


function handleSearch(Request $request, $booksList, $catagory, $favorites)
{
    $userSearch = $request->search;
    $booksList =  BookController::getSearchData($userSearch);
    return view("home", ["booksList" => $booksList, "catagory" => $catagory, "sortdata" => "search", "sortvalue" => $request->search, "favorites" => $favorites]);
}


function handleFilterByCategory(Request $request, $booksList, $catagory, $favorites)
{
    if ($request->catagory === "all")
        return view("home", ["booksList" => $booksList, "catagory" => $catagory, "sortdata" => "category", "sortvalue" => $request->catagory, "favorites" => $favorites]);
    else {
        $booksList =  BookController::getBooksByCategory($request->catagory);
        return view("home", ["booksList" => $booksList, "catagory" => $catagory, "sortdata" => "category", "sortvalue" => $request->catagory, "favorites" => $favorites]);
    }
}
