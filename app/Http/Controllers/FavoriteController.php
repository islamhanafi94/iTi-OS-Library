<?php

namespace App\Http\Controllers;

use App\Book;
use App\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = UserController::getFavoritesBooks(Auth::id());
        return view('favorites', ["books" => $books, "fav" => Favorite::all()]);
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
        //
        Favorite::create([
            "user_id" => Auth::id(),
            "book_id" => $request->book_id
        ]);
        return redirect('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        if (isset($request->source)) {
            $favorite = Favorite::whereRaw('user_id = ? and book_id = ? ', [Auth::id(), $request->book_id]);
            $favorite->delete();
            return redirect('index');
        }
        $favorite = Favorite::whereRaw('user_id = ? and book_id = ? ', [$request->user_id, $request->book_id]);
        $favorite->delete();
        return redirect('favorites');
    }
}
