<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController; // Perhatikan nama controller tunggal
use App\Http\Controllers\RiskController;
use App\Http\Controllers\MitigationsController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|-------------------------------------------------------------------------- 
| Web Routes 
|-------------------------------------------------------------------------- 
| Here is where you can register web routes for your application. These 
| routes are loaded by the RouteServiceProvider within a group which 
| contains the "web" middleware group. Now create something great! 
|
*/

// Routes for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
	Route::get('dashboard', [HomeController::class, 'home'])->name('dashboard');


    // Profile routes
    Route::get('/user-profile', [InfoUserController::class, 'create']);
    Route::post('/user-profile', [InfoUserController::class, 'store']);

    // Logout route (POST method for security)
    Route::post('/logout', [SessionsController::class, 'destroy'])->name('logout');

    Route::resources([
        'users' => UserController::class,
        'risks' => RiskController::class,
        'mitigations' => MitigationsController::class,
        'statuses' => StatusController::class,
    ]);

    Route::get('/risks', [RiskController::class, 'index'])->name('risks.index');
    Route::get('/risks/create', [RiskController::class, 'create'])->name('risks.create');
    Route::post('/risks', [RiskController::class, 'store'])->name('risks.store');
    Route::get('/risks/{id}/edit', [RiskController::class, 'edit'])->name('risks.edit');
    Route::put('/risks/{id}', [RiskController::class, 'update'])->name('risks.update');
    Route::delete('/risks/{id}', [RiskController::class, 'destroy'])->name('risks.destroy');

    Route::get('/mitigations', [MitigationsController::class, 'index'])->name('mitigations.index');
    Route::get('/mitigations/create', [MitigationsController::class, 'create'])->name('mitigations.create');
    Route::post('/mitigations', [MitigationsController::class, 'store'])->name('mitigations.store');
    Route::get('/mitigations/{id}/edit', [MitigationsController::class, 'edit'])->name('mitigations.edit');
    Route::put('/mitigations/{id}', [MitigationsController::class, 'update'])->name('mitigations.update');
    Route::delete('/mitigations/{id}', [MitigationsController::class, 'destroy'])->name('mitigations.destroy');

    Route::get('/statuses', [StatusController::class, 'index'])->name('statuses.index');
    Route::get('/statuses/create', [StatusController::class, 'create'])->name('statuses.create');
    Route::post('/statuses', [StatusController::class, 'store'])->name('statuses.store');
    Route::get('/statuses/{id}/edit', [StatusController::class, 'edit'])->name('statuses.edit');
    Route::put('/statuses/{id}', [StatusController::class, 'update'])->name('statuses.update');
    Route::delete('/statuses/{id}', [StatusController::class, 'destroy'])->name('statuses.destroy');
});

// Routes for guest users (login, register, forgot password)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/login', [SessionsController::class, 'store']);

    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/forgot-password', [ResetController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [ResetController::class, 'sendEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

// Role-based routes
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'home'])->name('dashboard');
});

Route::middleware(['auth', 'user-access:analis'])->group(function () {
    Route::get('/analis/dashboard', [HomeController::class, 'analisHome'])->name('analis.dashboard');
});

Route::middleware(['auth', 'user-access:managerti'])->group(function () {
    Route::get('/managerti/dashboard', [HomeController::class, 'managerTIHome'])->name('managerti.dashboard');
});
