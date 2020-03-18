<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware("auth");

Route::get('/home', 'HomeController@userIndex')->name('home');

Route::get('/index',"BookController@userIndex")->name("index")->middleware("auth");


Route::resource('/dashboard/user', 'UserController')->middleware("auth");

// for user
Route::resource('/book',"BookController");
Route::get('/book/{book}', 'BookController@show')->name('book.show');

// for admin
Route::resource('/dashboard/books',"BookController");
Route::get("/dashboard/books","BookController@index");

Route::resource('/dashboard/category',"CategoryController");

Route::resource('lease',"LeaseController");

Route::resource('chart',"LeaseChartController");

Route::resource('comment',"CommentController")->middleware('auth');

Route::get('dashboard/category',function(){
    return view('categories',['categories'=> Category::all()]);
})->name('category');

Route::get('dashboard/reports', 'LeaseChartController@index');


Route::resource('favorites','FavoriteController');

Route::resource('rates','RateController');

// Route::get('/favorite','FavoriteController@store')->name("addfavorite");
