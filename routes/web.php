<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

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

// CRUD de productos
Route::resource('producto', ProductoController::class);
Route::get('/producto/{producto}/deleteConfirm', [ProductoController::class, 'deleteConfirm'])->name('producto.deleteConfirm');
