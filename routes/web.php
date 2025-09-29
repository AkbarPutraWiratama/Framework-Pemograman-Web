<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RoleCheck;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UtsController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/uts', [UtsController::class, 'index'])->name('uts.index');
Route::get('/uts/pemrograman-web', [UtsController::class, 'pemrogramanWeb'])->name('uts.pemrograman_web');
Route::get('/uts/database', [UtsController::class, 'database'])->name('uts.database');


Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
});

// Route::get('/dashboard/admin', function () {
//     return view('dashboard.admin');
// })->middleware(['auth', 'verified', 'RoleCheck:admin'])->name('dashboard.admin');

// Route::get('/dashboard/user', function () {
//     return view('dashboard.user');
// })->middleware(['auth', 'verified', 'RoleCheck:user'])->name('dashboard.user');

// Route::get('/dashboard/owner', function () {
//     return view('dashboard.owner');
// })->middleware(['auth', 'verified', 'RoleCheck:owner'])->name('dashboard.owner');

Route::get('/rahasia', function () {
    return view('rahasia');
})->middleware(['auth', 'verified', 'RoleCheck:admin,owner'])->name('rahasia');

Route::middleware(['auth','RoleCheck:admin,owner'])->group(function () {
    Route::get('/products/{number}', [ProductController::class, 'index'])->name('products.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';