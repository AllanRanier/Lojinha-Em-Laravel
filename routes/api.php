<?php

use App\Http\Controllers\CategorysController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('usuarios')->group(function () {
    Route::get('get/email/{email}', [UsersController::class, 'checkEmail']);
    Route::get('get/username/{username}', [UsersController::class, 'checkUserName']);
});

Route::prefix('clientes')->group(function () {
    Route::get('get/email/{email}', [ClientsController::class, 'checkEmail']);
    Route::get('get/cpf/{cpf}', [ClientsController::class, 'checkCpf']);
});


Route::prefix('categorias')->group(function () {
    Route::get('get/category/{category}', [CategorysController::class, 'checkCategory']);
});


