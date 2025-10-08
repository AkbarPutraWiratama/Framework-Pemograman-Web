<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function show($angka)
    {
        // Cek apakah nilai ganjil atau genap
        if ($angka % 2 == 0) {
            $type = 'success';
            $message = "Nilai $angka adalah genap.";
        } else {
            $type = 'warning';
            $message = "Nilai $angka adalah ganjil.";
        }

        // Kirim data ke view
        return view('produk', [
            'type' => $type,
            'message' => $message
        ]);
    }
}
