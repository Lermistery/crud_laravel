<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRole;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function () {
    if (!session('user')) {
        return redirect('/login');
    }
    return view('dashboard');
});

// Route Register (publik, tidak perlu login)
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);

// Group route untuk kelola jabatan dan user yang dilindungi Middleware CheckRole
Route::middleware([CheckRole::class])->group(function () {
    
    // Route untuk CRUD Users (kecuali create & store yang sudah didaftarkan di atas)
    Route::resource('users', UserController::class)->except(['show', 'create', 'store']);

});
