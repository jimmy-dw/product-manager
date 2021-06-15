<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a category
     *
     * @return Response
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Create a category
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'bail|required|max:255',
            'description' => 'max:255',
        ]);

        return Product::create($data);
    }

    /**
     * Display the specified category
     *
     * @param  int  $id ID of the specified category
     * @return Response
     */
    public function show($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Update the specified category
     *
     * @param Request $request
     * @param  int  $id ID of the specified category
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'bail|required|unique:categories|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($data);
        return $category;
    }

    /**
     * Remove the specified category
     *
     * @param  int  $id ID of the specified category
     * @return Response
     */
    public function destroy($id)
    {
        return Category::destroy($id);
    }
}
