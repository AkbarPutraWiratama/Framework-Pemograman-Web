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
    Product::create($validated);

    // Redirect ke index dengan pesan sukses
    return redirect()
        ->route('product-index')->with('success', 'Product created successfully!');
    }

    public function edit($id)
    {
    $product = Product::findOrFail($id);
    return view('master-data.product-master.edit-product', compact('product'));
    }

    public function update(Request $request, $id)
    {
    // Validasi input pertama
    $request->validate([
        'name' => 'required|max:255',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        // tambahkan validasi lain jika ada
    ]);

    // Ambil produk
    $product = Product::findOrFail($id);
    // Update data
    $product->name = $request->name;
    $product->price = $request->price;
    $product->stock = $request->stock;
    // jika ada field lain, isi juga
    $product->save();

    // Redirect kembali ke daftar dengan pesan sukses
    return redirect()->route('product-index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('product-index')->with('success', 'Product deleted successfully.');
    }
}
