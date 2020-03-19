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

Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware(["auth", "CheckUser"]);

Route::get('/home', 'HomeController@userIndex')->name('home');

Route::get('/index',"BookController@userIndex")->name("index")->middleware("auth");


Route::resource('/dashboard/user', 'UserController')->middleware(["auth", "CheckUser"]);

// for user
Route::resource('/book',"BookController");
Route::get('/book/{book}', 'BookController@show')->name('book.show');

// for admin
Route::resource('/dashboard/books',"BookController")->middleware("CheckUser");
Route::get("/dashboard/books","BookController@index")->middleware("CheckUser");

Route::resource('/dashboard/category',"CategoryController")->middleware("CheckUser");

Route::resource('lease',"LeaseController");

Route::resource('chart',"LeaseChartController");

Route::resource('comment',"CommentController")->middleware('auth');

Route::get('dashboard/category',function(){
    return view('categories',['categories'=> Category::all()]);
})->name('category')->middleware("CheckUser");;

Route::get('dashboard/reports', 'LeaseChartController@index')->middleware("CheckUser");;


Route::resource('favorites','FavoriteController');

Route::resource('rates','RateController');

// Route::get('/favorite','FavoriteController@store')->name("addfavorite");
