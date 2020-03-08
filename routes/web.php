<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('manager','ManagerController')->middleware('auth');

Route::get('/index',"bookscontroller@index")->name("index")->middleware("auth");

//Route::resource("books","bookscontroller")->middleware("auth");

Route::resource("users","userscontroller")->middleware("auth");

// Temp route for testing dashboard

Route::get('dashboard',function(){
    return view('layouts.dashboard');
});


Route::get('dashboard/books',function(){
    return view('books');
})->name('books');

