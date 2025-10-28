<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RoleCheck;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UtsController;
use App\Http\Controllers\ProdukController;



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

// Route::middleware(['auth','RoleCheck:admin,owner'])->group(function () {
//     Route::get('/products/{number}', [ProductController::class, 'index'])->name('products.index');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/produk/{angka}', [ProdukController::class, 'show']);

Route::get('/products', [ProductController::class, 'index'])->name('product-index');
Route::get('/products/create', [ProductController::class, 'create'])->name('product-create');
Route::post('/products/store', [ProductController::class, 'store'])->name('product-store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product-edit');
Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('product-update');
Route::delete('/products/{id}/delete', [ProductController::class, 'destroy'])->name('product-delete');

Route::get('/product-export-excel', [ProductController::class, 'exportExcel'])->name('product.export.excel');



require __DIR__.'/auth.php';