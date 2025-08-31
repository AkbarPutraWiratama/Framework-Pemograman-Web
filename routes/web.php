<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

// Halaman pengguna
Route::get('/pengguna/{id}', function ($id) {
    return view('pengguna', data: ['id' => $id]);
})->name('pengguna');

// Group untuk manage
Route::prefix('manage')->group(function () {
    Route::get('/edit/{id}', function ($id) {
        return view('manage.edit-profile', ['id' => $id]);
    })->name('edit-profile');
});

// About (umum)
Route::get('/about/{id}', function ($id) {
    return view('about', ['id' => $id]);
})->name('about');

// Contact (spesifik user)
Route::get('/contact/{id}', function ($id) {
    return view('contact', ['id' => $id]);
})->name('contact');