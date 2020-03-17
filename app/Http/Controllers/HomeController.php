<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookController;

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

    public function userIndex()
    {
        $booksList = BookController::getBooks();
        $favorites = UserController::getFavoritesBooks(Auth::id());

        return view('home', ["booksList" => $booksList,"favorites" => $favorites]);
    }
}
