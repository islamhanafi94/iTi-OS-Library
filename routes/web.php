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

// for admin
Route::group(['middleware' => ['admin']], function () {

    Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware("auth");

    Route::resource('/dashboard/category', "CategoryController");

    Route::get('dashboard/category', function () {
        return view('categories', ['categories' => Category::all()]);
    })->name('category');

    Route::resource('/dashboard/books', "BookController");

    Route::get("/dashboard/books", "BookController@index");

    Route::resource('chart', "LeaseChartController");

    Route::get('dashboard/reports', 'LeaseChartController@index');

    Route::resource('/dashboard/user', 'UserController')->middleware("auth");
});

// for user
Route::group(['middleware' => ['user']], function () {

    Route::get('/home', 'HomeController@userIndex')->name('home');

    Route::resource('/book', "BookController");

    Route::get('/book/{book}', 'BookController@show')->name('book.show');

    Route::resource('userProfile', 'ProfileController');

    Route::resource('comment', "CommentController")->middleware('auth');

    Route::resource('favorites', 'FavoriteController');

    Route::resource('rates', 'RateController');

    Route::resource('lease', "LeaseController");
});
