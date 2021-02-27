<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('index');
});
Route::get('/profile', 'User@index');
Route::get('/singelproduct/{id}', 'singelproductController@index');

Route::get('/products/{id}', 'SubCatController@FetchProducts');
Route::get('/categories', 'SubCatController@FetchCategories');
Route::get('/cart/{id}-{qty}', 'cartController@add');
Route::delete('/cart/{key}', 'cartController@delete');
Route::get('/checkout', 'cartController@Checkout');
Route::get('/cart', function(){
    return view('cart');
});



Route::get('/', 'productController@homeFetch');
Route::get('/subcategories/{id}', 'SubCatController@Fetch');

// Route::get('admin', 'AdminController@index');
Route::post('/admin/addadmin', 'AdminController@store');
Route::get('/admin/delateadmin/{id}', 'AdminController@destroy');
Route::get('/admin/editadmin/{id}/editadmin', "AdminController@edit");
Route::put('/admin/updateadmin/{id}', 'AdminController@update');



Route::get('/admin/category', 'CategoryController@index');
Route::post('/admin/category', 'CategoryController@store');
Route::get('/admin/category/{id}', 'CategoryController@destroy');
Route::get('/admin/category/{id}/editcategory', "CategoryController@edit");
Route::put('/admin/category/{id}', 'CategoryController@update');

Route::get('/admin/subcategory', 'SubcategoryController@index');
Route::post('/admin/subcategory', 'SubcategoryController@store');
Route::get('/admin/subcategory/{id}', 'SubcategoryController@destroy');
Route::get('/admin/subcategory/{id}/editsubcat', "SubcategoryController@edit");
Route::put('/admin/subcategory/{id}', 'SubcategoryController@update');


Route::get('/admin/product', 'productController@indexAdmin');
Route::post('/admin/product', 'productController@store');
Route::get('/admin/product/{id}', 'productController@destroy');
Route::get('/admin/product/{id}/editproduct', "productController@edit");
Route::put('/admin/product/{id}', 'productController@update');

Auth::routes();
Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@indexLogin')->name('admin.dashboard');
});
