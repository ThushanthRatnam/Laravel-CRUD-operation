<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BranchStockController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\SalesOrderController;
use App\Http\Controllers\UserHierachyController;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();
Route::group(['prefix' => '', 'middleware' =>  ['auth']],function (){
    

     //Branches
     Route::get('branch', [BranchController::class,'index']);
     Route::get('branch/add', [BranchController::class,'get_add']);
     Route::post('branch/add',[BranchController::class,'post_add']);
     Route::get('branch/{id}/edit',[BranchController::class,'get_edit']);
     Route::post('branch/{id}/edit',[BranchController::class,'post_edit']);
     Route::get('branch/{id}/delete',[BranchController::class,'get_delete']);
     Route::get('branch/{id}/view', [BranchController::class,'get_view']);
     
     //Products
     Route::get('product', [productController::class,'index']);
     Route::get('product/add', [productController::class,'get_add']);
     Route::post('product/add',[productController::class,'post_add']);
     Route::get('product/{id}/edit',[productController::class,'get_edit']);
     Route::post('product/{id}/edit',[productController::class,'post_edit']);
     Route::get('product/{id}/delete',[productController::class,'get_delete']);
     Route::get('product/{id}/view', [ProductController::class,'get_view']);

     //Branch Stocks
     Route::get('branch_stock', [BranchStockController::class,'index']);
     Route::get('branch_stock/add', [BranchStockController::class,'get_add']);
     Route::post('branch_stock/add',[BranchStockController::class,'post_add']);
     Route::get('branch_stock/{id}/edit',[BranchStockController::class,'get_edit']);
     Route::post('branch_stock/{id}/edit',[BranchStockController::class,'post_edit']);
     Route::get('branch_stock/{id}/delete',[BranchStockController::class,'get_delete']);
     Route::get('branch_stock/{id}/view', [BranchStockController::class,'get_view']);
});
