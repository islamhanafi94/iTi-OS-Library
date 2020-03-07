<?php

namespace App\Http\Controllers;

use App\books;
use App\categories;
use Illuminate\Http\Request;


class bookscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //real version...
    public function index(Request $request)
    {
        //
        $catagory = categories::all();
        if (isset($request->catagory)) {
            if ($request->catagory === "all")
                return view("index", ["books" => books::all(), "catagory" => $catagory]);
            else {
                $books =  books::where("category_id", $request->catagory)->get();
                if ($books == null)
                    return view("index", ["catagory" => $catagory]);
                else
                    return view("index", ["books" => $books, "catagory" => $catagory]);
            }
        } else {
            $books =  books::all();
            if ($books == null)
                return view("index", ["catagory" => $catagory]);
            else
                return view("index", ["books" => $books, "catagory" => $catagory]);
        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, books $books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(books $books)
    {
        //
    }
}
