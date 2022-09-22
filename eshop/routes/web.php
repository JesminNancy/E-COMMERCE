<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
 Route::get('/',[FrontController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [FrontendController::class, 'index']);


    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('add-categories', [CategoryController::class, 'addCategory']);
    Route::post('insert-categories', [CategoryController::class, 'insertData']);
    Route::get('edit-categories/{id}', [CategoryController::class, 'editCategory']);
    Route::put('update-category/{id}', [CategoryController::class, 'updateCategory']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products', [ProductController::class, 'addProduct']);
    Route::post('insert-products', [ProductController::class, 'insertProduct']);
    Route::get('edit-product/{id}', [ProductController::class, 'editProduct']);
    Route::put('update-products/{id}', [ProductController::class, 'updateProduct']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);
});