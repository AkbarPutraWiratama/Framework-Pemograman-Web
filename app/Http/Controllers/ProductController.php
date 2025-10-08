<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::all();
        return view('master-data.product-master.index', compact('products'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        return view('master-data.product-master.create-product');
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'type' => 'required|string|max:100',
            'information' => 'nullable|string',
            'qty' => 'required|integer|min:1',
            'producer' => 'required|string|max:255',
        ]);

        Product::create($request->all());

        return redirect()->back()->with('success', 'Product created successfully!');
    }
}
