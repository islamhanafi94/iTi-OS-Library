<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        $categoriesList = \App\Category::select('name')->get();
        return $categoriesList;

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
        $request->validate([
            'name' => [
                'required', 'alpha',
                Rule::unique('categories')->where(function ($query) {
                    return $query->where('deleted_at', NULL);
                }),
            ]
        ]);


        Category::create($request->all());
        return redirect()->route('category')->with('status', 'Added new Category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('updateCategory', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => [
                'required', 'alpha',
                Rule::unique('categories')->where(function ($query) {
                    return $query->where('deleted_at', NULL);
                })->ignore($category),
            ],
        ]);

        $category->name = $request->name;
        $category->save();

        return redirect()->route('category')->with('status', 'Category Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->books()->delete();
        $category->delete();
        return redirect()->route('category')->with('status', 'Category Deleted Sucssessfuly');
    }

    /**
     * Retrieve category id.
     *
     * @param   string $categoryName
     * @return  integer $id
     */
    public static function getCategoryId(string $categoryName)
    {
        $categoryID = DB::table('categories')
            ->select('id')
            ->where('name', '=', $categoryName)
            ->get();
        $index = count($categoryID);    
        return $categoryID[$index-1]->id;
    }

    public static function getAllCategories()
    {
        return Category::all();
    }
}
