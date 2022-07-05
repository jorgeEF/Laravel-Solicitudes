<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\CategoriesController;

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

Route::redirect('/', '/pedidos');

Route::redirect('/home', '/pedidos');

Route::get('/pedidos', [PedidosController::class, 'index'])->name('pedidos');

Route::get('/pedidos/create', [PedidosController::class, 'create'])->middleware("auth")->name('pedidos-create');

Route::post('pedidos', [PedidosController::class, 'store'])->middleware("auth")->name('pedidos');

Route::get('/pedidos/edit/{id}', [PedidosController::class, 'edit'])->middleware("auth")->name('pedidos-edit');

Route::patch('/pedidos/update/{id}', [PedidosController::class, 'update'])->middleware("auth")->name('pedidos-update');

Route::post('/pedidos/approve/{id}', [PedidosController::class, 'approve'])->middleware("auth")->name('pedidos-approve');

Route::post('/pedidos/reject/{id}', [PedidosController::class, 'reject'])->middleware("auth")->name('pedidos-reject');

Route::delete('/pedidos/destroy/{id}', [PedidosController::class, 'destroy'])->middleware("auth")->name('pedidos-destroy');


Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');

Route::get('/categories/create', [CategoriesController::class, 'create'])->middleware("auth")->name('categories-create');

Route::post('categories', [CategoriesController::class, 'store'])->middleware("auth")->name('categories');

Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->middleware("auth")->name('categories-edit');

Route::patch('/categories/update/{id}', [CategoriesController::class, 'update'])->middleware("auth")->name('categories-update');

Route::delete('/categories/destroy/{id}', [CategoriesController::class, 'destroy'])->middleware("auth")->name('categories-destroy');

Auth::routes();
