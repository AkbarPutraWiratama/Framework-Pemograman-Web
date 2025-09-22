<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Terima parameter angka dari route, tambah angka (contoh +7),
     * lalu kirim ke view 'products.index'.
     *
     * @param  int  $number
     * @return \Illuminate\View\View
     */
    public function index($number)
    {
        // pastikan integer
        $number = (int) $number;

        // angka yang ditambahkan (bebas ganti)
        $added = 7;

        // hasil penjumlahan
        $sum = $number + $added;

        // lempar ke view products.index dengan variabel 'number' dan 'sum'
        return view('products.index', compact('number', 'added', 'sum'));
    }
};