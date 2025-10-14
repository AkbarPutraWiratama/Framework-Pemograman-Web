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
    $validated = $request->validate([
        'product_name' => 'required|string|max:255',
        'unit' => 'required|string',
        'type' => 'required|string',
        'information' => 'nullable|string',
        'qty' => 'required|integer',
        'producer' => 'required|string|max:255',
    ]);

    // Simpan data
    \App\Models\Product::create($validated);

    // Redirect ke index dengan pesan sukses
    return redirect()
        ->route('product-index')
        ->with('success', 'Product created successfully!');
}

    public function destroy($id)
    {
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('product-index')->with('success', 'Product deleted successfully.');
    }
}
