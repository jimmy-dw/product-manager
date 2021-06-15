<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Categories

// GET    | api/categories            | categories.index   | CategoryController@index
// POST   | api/categories            | categories.store   | CategoryController@store
// GET    | api/categories/{category} | categories.show    | CategoryController@show
// PUT    | api/categories/{category} | categories.update  | CategoryController@update
// DELETE | api/categories/{category} | categories.destroy | CategoryController@destroy

Route::apiResource('categories', 'CategoryController');




// Products

// GET    | api/products           | products.index   | ProductController@index
// POST   | api/products           | products.store   | ProductController@store
// GET    | api/products/{product} | products.show    | ProductController@show
// PUT    | api/products/{product} | products.update  | ProductController@update
// DELETE | api/products/{product} | products.destroy | ProductController@destroy

Route::apiResource('products', 'ProductController');




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
