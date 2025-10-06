<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SupplierController;

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

Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);  // Ruta de registro



Route::prefix('suppliers')->group(function () {
    Route::get('', [SupplierController::class, 'get']);  // Ruta para obtener la lista de proveedores
    Route::post('create', [SupplierController::class, 'store']);  // Ruta para crear un proveedor
    Route::put('{supplier}', [SupplierController::class, 'update']);  // Ruta para actualizar un proveedor
    Route::delete('{supplier}', [SupplierController::class, 'destroy']);  // Ruta para eliminar un proveedor
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
