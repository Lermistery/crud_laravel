<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\JabatanController;
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

// Group route untuk kelola jabatan dan user yang dilindungi Middleware CheckRole
Route::middleware([CheckRole::class])->group(function () {
    
    // Route untuk CRUD Jabatan
    Route::get('/jabatan', [JabatanController::class, 'index']);
    Route::post('/jabatan', [JabatanController::class, 'store']);
    Route::put('/jabatan/{id}', [JabatanController::class, 'update']);
    Route::delete('/jabatan/{id}', [JabatanController::class, 'destroy']);

    // Route untuk CRUD Users
    Route::resource('users', UserController::class)->except(['show']);

});
