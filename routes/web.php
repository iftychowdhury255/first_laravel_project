<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[FrontendController::class,'index']);
Route::get('/shop/pages',[FrontendController::class,'shopPage']);
Route::get('/product/details/{id}',[FrontendController::class,'productDetails']);
Route::post('/product/add/to/cart',[FrontendController::class,'productAddToCart']);
Route::get('/cart/delete/{id}',[FrontendController::class,'cartDelete']);
Route::get('/view/cart/products',[FrontendController::class,'viewCartProducts']);
Route::get('/checkout',[FrontendController::class,'checkout']);
Route::get('/checkout',[FrontendController::class,'checkout']);
Route::post('/customer/confirmed/order',[FrontendController::class,'customerConfirmedOrder']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index']);
Route::get('/categories/add', [BackendController::class, 'CategoryAdd']);
Route::get('/categories/manage', [BackendController::class, 'CategoryManage']);
Route::post('/category/store', [BackendController::class, 'CategoryStore']);
Route::get('/category/edit/{id}', [BackendController::class, 'categoryEdit']);
Route::get('/category/delete/{id}', [BackendController::class, 'categoryDelete']);
Route::post('/category/update/{id}', [BackendController::class, 'categoryUpdate']);

Route::get('/product/store', [ProductController::class, 'productAdd']);
Route::get('/product/manage', [ProductController::class, 'productManage']);
Route::post('/product/store', [ProductController::class, 'productStore']);
Route::get('/product/edit/{id}', [ProductController::class, 'productEdit']);
Route::get('/product/delete/{id}', [ProductController::class, 'productDelete']);
Route::post('/product/update/{id}', [ProductController::class, 'productUpdate']);

Route::get('/order/manage', [OrderController::class, 'orderManage']);

