<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/orders','OrderController');
Route::resource('/order_details','OrderDetailController');
Route::resource('/products','ProductController');
Route::resource('/setting','SettingController');
Route::resource('/Supplier','SupplierController');
Route::resource('/transactions','TransactionController');
Route::resource('/users','UserController'); 
Route::resource('/companies','CompanyController');
Route::get('barcode','ProductCOntroller@getProductBarcode')->name('products.barcode');// these is used to link the route address product.barcode in the nav section of barcode
Route::resource('/sections','SectionController');

