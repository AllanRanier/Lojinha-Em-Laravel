<?php

use App\Http\Controllers\CategorysController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SubCategorysController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\AuthCheck;
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




// Route::prefix('login')->group(function () {
//     Route::get('', [LoginController::class, 'index'])->name('login.index');
//     Route::post('authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
// });


Route::post('login/auth', [LoginController::class, 'authenticate']) -> name('login.authenticate');
Route::get('login/sair', [LoginController::class, 'logout']) -> name('login.sair');
Route::get('login', [LoginController::class, 'index'])->name('login');


Route::group(['middleware' => ['AuthCheck']], function () {

    Route::get('/', function () {
        return view('base');
    })->name('dashboard');

    Route::prefix('usuarios')->group(function () {
        Route::get('index', [UsersController::class, 'index'])->name('usuarios.index');
        Route::get('create', [UsersController::class, 'create'])->name('usuarios.create');
        Route::post('store', [UsersController::class, 'store'])->name('usuarios.store');
        Route::post('update/{id}', [UsersController::class, 'update'])->name('usuarios.update');
        Route::get('edit/{id}', [UsersController::class, 'edit'])->name('usuarios.edit');
        Route::get('destroy/{id}', [UsersController::class, 'destroy'])->name('usuarios.destroy');
        Route::get('pesquisa', [UsersController::class, 'query'])->name('usuarios.query');
    });

    Route::prefix('produtos')->group(function () {
        Route::get('index', [ProductsController::class, 'index'])->name('produtos.index');
        Route::get('create', [ProductsController::class, 'create'])->name('produtos.create');
        Route::post('store', [ProductsController::class, 'store'])->name('produtos.store');
        Route::post('update/{id}', [ProductsController::class, 'update'])->name('produtos.update');
        Route::get('edit/{id}', [ProductsController::class, 'edit'])->name('produtos.edit');
        Route::get('destroy/{id}', [ProductsController::class, 'destroy'])->name('produtos.destroy');
        Route::get('pesquisa', [ProductsController::class, 'query'])->name('produtos.query');
    });

    Route::prefix('clientes')->group(function () {
        Route::get('index', [ClientsController::class, 'index'])->name('clientes.index');
        Route::get('create', [ClientsController::class, 'create'])->name('clientes.create');
        Route::post('store', [ClientsController::class, 'store'])->name('clientes.store');
        Route::post('update/{id}', [ClientsController::class, 'update'])->name('clientes.update');
        Route::get('edit/{id}', [ClientsController::class, 'edit'])->name('clientes.edit');
        Route::get('destroy/{id}', [ClientsController::class, 'destroy'])->name('clientes.destroy');
        Route::get('pesquisa', [ClientsController::class, 'query'])->name('clientes.query');
    });

    Route::prefix('categorias')->group(function () {
        Route::get('index', [CategorysController::class, 'index'])->name('categorias.index');
        Route::get('create', [CategorysController::class, 'create'])->name('categorias.create');
        Route::post('store', [CategorysController::class, 'store'])->name('categorias.store');
        Route::post('update/{id}', [CategorysController::class, 'update'])->name('categorias.update');
        Route::get('edit/{id}', [CategorysController::class, 'edit'])->name('categorias.edit');
        Route::get('destroy/{id}', [CategorysController::class, 'destroy'])->name('categorias.destroy');
        Route::get('pesquisa', [CategorysController::class, 'query'])->name('categorias.query');
    });

    Route::prefix('subcategoria')->group(function () {
        Route::get('index', [SubCategorysController::class, 'index'])->name('subcategoria.index');
        Route::get('create', [SubCategorysController::class, 'create'])->name('subcategoria.create');
        Route::post('store', [SubCategorysController::class, 'store'])->name('subcategoria.store');
        Route::post('update/{id}', [SubCategorysController::class, 'update'])->name('subcategoria.update');
        Route::get('edit/{id}', [SubCategorysController::class, 'edit'])->name('subcategoria.edit');
        Route::get('destroy/{id}', [SubCategorysController::class, 'destroy'])->name('subcategoria.destroy');
        Route::get('pesquisa', [SubCategorysController::class, 'query'])->name('subcategoria.query');
    });

});
