<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\EmployeesController;

use App\Http\Controllers\InputController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DeceasedController;

/*
|--------------------------------------------------------------------------
| Rutas Web
|--------------------------------------------------------------------------
|
| Aquí definimos las rutas públicas y las rutas protegidas del panel
| administrativo.
|
*/

// Ruta pública (landing page)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Rutas de registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Rutas protegidas para el área administrativa
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Ruta para cerrar sesión
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas Premium
Route::prefix('premium')->middleware('auth')->group(function () {
    Route::get('/', [PremiumController::class, 'index'])->name('premium.index');
});

// Rutas de proveedores
Route::prefix('suppliers')->middleware('auth')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('/create', [SupplierController::class, 'create'])->name('suppliers.create');
    Route::post('/store', [SupplierController::class, 'store'])->name('suppliers.store');
    Route::get('/{supplier}/show', [SupplierController::class, 'show'])->name('suppliers.show');
    Route::put('/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
    Route::delete('/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');
});

// Rutas de sucursales
Route::prefix('sucursal')->middleware('auth')->group(function () {
    Route::get('/', [SucursalController::class, 'index'])->name('sucursal.index');
    Route::get('/create', [SucursalController::class, 'create'])->name('sucursal.create');
    Route::post('/store', [SucursalController::class, 'store'])->name('sucursal.store');
    Route::get('/{sucursal}/show', [SucursalController::class, 'show'])->name('sucursal.show');
    Route::put('/{sucursal}', [SucursalController::class, 'update'])->name('sucursal.update');
    Route::delete('/{sucursal}', [SucursalController::class, 'destroy'])->name('sucursal.destroy');
});

// Rutas de Beneficiarios

Route::prefix('customer')->middleware('auth')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/{customer}/show', [CustomerController::class, 'show'])->name('customer.show');
    Route::put('/{customer}', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('customer.destroy');
});

// Rutas de Contratos

Route::prefix('contract')->middleware('auth')->group(function () {
    Route::get('/', [ContractController::class, 'index'])->name('contract.index');
    Route::get('/create', [ContractController::class, 'create'])->name('contract.create');
    Route::post('/store', [ContractController::class, 'store'])->name('contract.store');
    Route::get('/{contract}/show', [ContractController::class, 'show'])->name('contract.show');
    Route::put('/{contract}', [ContractController::class, 'update'])->name('contract.update');
    Route::delete('/{contract}', [ContractController::class, 'destroy'])->name('contract.destroy');
});

Route::prefix('empleados')->middleware('auth')->group(function () {
    Route::get('/', [EmployeesController::class, 'index'])->name('empleados.index');
    Route::get('/create', [EmployeesController::class, 'create'])->name('empleados.create');
    Route::post('/store', [EmployeesController::class, 'store'])->name('empleados.store');
    Route::get('/{employee}/show', [EmployeesController::class, 'show'])->name('empleados.show');
    Route::put('/{employee}', [EmployeesController::class, 'update'])->name('empleados.update');
    Route::delete('/{employee}', [EmployeesController::class, 'destroy'])->name('empleados.destroy');
});
// Rutas de insumos
Route::prefix('inputs')->middleware('auth')->group(function () {
    Route::get('/', [InputController::class, 'index'])->name('inputs.index');
    Route::get('/create', [InputController::class, 'create'])->name('inputs.create');
    Route::post('/', [InputController::class, 'store'])->name('inputs.store');
    Route::get('/{input}/edit', [InputController::class, 'edit'])->name('inputs.edit');
    Route::put('/{input}', [InputController::class, 'update'])->name('inputs.update');
    Route::delete('/{input}', [InputController::class, 'destroy'])->name('inputs.destroy');
});

// Rutas de servicios
Route::prefix('services')->middleware('auth')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
});

// Rutas de difuntos
Route::prefix('deceased')->middleware('auth')->group(function () {
    Route::get('/', [DeceasedController::class, 'index'])->name('deceased.index');
    Route::get('/create', [DeceasedController::class, 'create'])->name('deceased.create');
    Route::post('/', [DeceasedController::class, 'store'])->name('deceased.store');
    Route::get('/{deceased}/edit', [DeceasedController::class, 'edit'])->name('deceased.edit');
    Route::put('/{deceased}', [DeceasedController::class, 'update'])->name('deceased.update');
    Route::delete('/{deceased}', [DeceasedController::class, 'destroy'])->name('deceased.destroy');
});
