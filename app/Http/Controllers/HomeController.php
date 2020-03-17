<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $this->middleware('auth');
        // $this->middleware('CheckUser');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->is_active) {
            // if(Auth::user()->is_admin){
            //     // show Admin Dashboard
            //     return view('layouts.dashboard');
            // }
            $booksList = BookController::getAllBooks();
            return view('home', ["booksList" => $booksList]);
        } else {
            Auth::logout();
            return view('welcome');
        }
    }

    public function userIndex()
    {
        $booksList = BookController::getBooks();
        $favorites = UserController::getFavoritesBooks(Auth::id());

        return view('home', ["booksList" => $booksList,"favorites" => $favorites]);
    }
}
