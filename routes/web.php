<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/pengguna/{id}', function ($id) {
    return view('pengguna', data: ['id' => $id]);
})->name('pengguna');

Route::prefix('manage')->group(function () {
    Route::get('/edit/{id}', function ($id) {
        return view('manage.edit-profile', ['id' => $id]);
    })->name('edit-profile');
});

Route::get('/about/{id}', function ($id) {
    return view('about', ['id' => $id]);
})->name('about');

Route::get('/contact/{id}', function ($id) {
    return view('contact', ['id' => $id]);
})->name('contact');