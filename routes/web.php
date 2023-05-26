<?php

use App\Http\Controllers\FrontController;
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

Route::get('fff', function () {
    return view('welcome');
});
Route::get('/', [FrontController::class, 'index']);
Route::get('stock', [FrontController::class, 'stock']);
Route::get('stockDetail/{id}', [FrontController::class, 'stockDetail']);
Route::get('sell', [FrontController::class, 'sell']);
Route::get('cancel', [FrontController::class, 'cancel']);
Route::post('storeProduct', [FrontController::class, 'storeProduct']);
Route::post('editStock', [FrontController::class, 'editStock']);
Route::get('deleteStock/{id}', [FrontController::class, 'deleteStock']);

