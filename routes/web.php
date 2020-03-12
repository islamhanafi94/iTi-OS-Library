<?php

use Illuminate\Support\Facades\Route;
use App\Category;

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

Route::get('/index',"bookscontroller@index")->name("index")->middleware("auth");

Route::resource('/dashboard/user', 'UserController')->middleware("auth");

Route::resource('/dashboard/books',"BookController");
Route::get("/dashboard/books","BookController@index");

Route::resource('/dashboard/category',"CategoryController");

Route::resource('lease',"LeaseController");

Route::resource('chart',"LeaseChartController");

// Temp route for testing dashboard
Route::get('dashboard',function(){
    return view('layouts.dashboard');
});

Route::get('dashboard/category',function(){
    return view('categories',['categories'=> Category::all()]);
})->name('category');

Route::get('dashboard/reports', 'LeaseChartController@index');
