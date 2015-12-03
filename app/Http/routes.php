<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Category;
use App\Product;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

\Debugbar::enable();
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'AdminController@getHome');

Route::get('/admin/add-product', 'AdminController@getAddProduct');
Route::post('/admin/add-product', 'AdminController@postAddProduct');

Route::get('/admin/add-category', 'AdminController@getAddCategory');
Route::post('/admin/add-category', 'AdminController@postAddCategory');

Route::get('/admin/modify-products', 'AdminController@getModifyProducts');
Route::post('/admin/modify-products', 'AdminController@postModifyProducts');
Route::post('/admin/delete-product', 'AdminController@deleteProduct');

Route::get('/admin/modify-categories', 'AdminController@getModifyCategories');
Route::post('/admin/modify-categories', 'AdminController@postModifyCategories');
Route::post('/admin/delete-category', 'AdminController@deleteCategory');

Route::get('/product-list', 'ProductController@getProductList');
Route::post('/add-to-cart', 'ProductController@addProductToCart');



Route::get('/categories', function (Request $request) {
	$c = Product::with('categories')->get();
    return response()->json($request->user());
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');