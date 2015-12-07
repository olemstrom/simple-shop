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
    return view('home', [
    	"allCategories" => Category::all()
	]);
});

Route::get('/', function(){
	$products = AdminController::getProductList();

	return veiw('view3', [
		"view3"=> $products
	]);
});

Route::get('/category/{categoryname}', 'ProductController@getProductsByCategory');

Route::get('computer', function() {
	return view('todo.user.user2');
});

Route::get('electronics', function() {
	return view('todo.user.user3');
});

Route::get('homeAppliance', function() {
	return view('todo.user.user4');
});

Route::get('games', function() {
	return view('todo.user.user5');
});

Route::get('adminHome', function() {
	return view('todo.admin.view1');
});

Route::get('adminAddProduct', function() {
	return view('todo.admin.view2');
});

Route::get('adminDelOrModProd', function() {
	return view('todo.admin.view3');
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

Route::get('/admin/manage-orders', 'AdminController@getManageOrders');
Route::post('/admin/delete-orders', 'AdminController@deleteOrders');


Route::get('/product-list', 'ProductController@getProductList');
Route::post('/add-to-cart', 'ProductController@addProductToCart');

Route::get('/checkout', 'CheckoutController@getCheckout');
Route::post('/create-order', 'CheckoutController@createOrder');


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');