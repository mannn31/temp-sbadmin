<?php

use App\Http\Controllers\AllUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess'])->name('loginProcess');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin', [DashboardController::class, 'admin'])->name('admin');
    Route::get('/users/all', [UserController::class, 'allUser'])->name('user-all');
    Route::post('/users/all', [UserController::class, 'storeAllUser'])->name('user-all-store');
    Route::get('/users/all/{id}', [UserController::class, 'showAllUser'])->name('user-all-show');
    Route::get('/users/all/{id}/edit', [UserController::class, 'editAllUser'])->name('user-all-edit');
    Route::put('/users/all/{id}', [UserController::class, 'updateAllUser'])->name('user-all-update');
    Route::delete('/users/all/{id}', [UserController::class, 'destroyAllUser'])->name('user-all-destroy');

    /* User Per Level */
    // Admin
    Route::get('/users/admin', [UserController::class, 'userAdmin'])->name('user-admin');
    Route::post('/users/admin', [UserController::class, 'storeUserAdmin'])->name('user-admin-store');

    // Visitor
    Route::get('/users/visitor', [UserController::class, 'userVisitor'])->name('user-visitor');
    Route::post('/users/visitor', [UserController::class, 'storeUserVisitor'])->name('user-visitor-store');

    Route::get('/profile/{id}', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/profile/{id}/edit', [DashboardController::class, 'editProfile'])->name('edit-profile');
    Route::put('/profile/{id}', [DashboardController::class, 'updateProfile'])->name('update-profile');

    Route::get('/dashboard', [DashboardController::class, 'notAdmin'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});