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
        //
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
        $categoryController = new CategoryController;
        $categoryID  = $categoryController->getCategoryId($request->category);
        // validation ?

        // return $request;

        // get category id first then insert
        // CategoryController.getCategoryId($request->category);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
