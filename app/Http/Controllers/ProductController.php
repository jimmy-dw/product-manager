<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Get all the products in the specified category
     *
     * @param int $category_id ID of the specified category
     * @return Response
     */
    public function getProductsByCategory(int $category_id)
    {
        // Validate
        if (!$category_id) {
            return $this->response->error('Category ID must be specified', 400);
        }

        $category = Category::find($category_id);

        if (!$category) {
            return $this->response->error('Could not find a category for the specified ID ' . $category_id, 400);
        }

        return $category->products;
    }

    /**
     * Display a product
     *
     * @return Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Create a product
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'bail|required|max:255',
            'category_id' => 'bail|required|exists:categories,id',
            'description' => 'max:255',
        ]);

        // TODO: Handle category_product inserts

        return Product::create($data);
    }

    /**
     * Display the specified product
     *
     * @param  int  $id ID of the specified product
     * @return Response
     */
    public function show($id)
    {
        // TODO: Show the category information
        return Product::findOrFail($id);
    }

    /**
     * Update the specified product
     *
     * @param Request $request
     * @param  int  $id ID of the specified product
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // TODO: Update validation rules & and handle category IDs
        $data = $request->validate([
            'title' => 'bail|required|unique:categories|max:255',
        ]);

        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    /**
     * Remove the specified product
     *
     * @param  int  $id ID of the specified product
     * @return Response
     */
    public function destroy($id)
    {
        return Product::destroy($id);
    }
}
