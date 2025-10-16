@extends('layouts.app')
@section('content')
  <h1>Edit Produk</h1>
  <form action="{{ route('product-update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
      <label>Nama:</label>
      <input type="text" name="name" value="{{ old('name', $product->name) }}">
      @error('name')
        <div style="color:red">{{ $message }}</div>
      @enderror
    </div>
    <div>
      <label>Harga:</label>
      <input type="text" name="price" value="{{ old('price', $product->price) }}">
      @error('price')
        <div style="color:red">{{ $message }}</div>
      @enderror
    </div>
    <div>
      <label>Stok:</label>
      <input type="text" name="stock" value="{{ old('stock', $product->stock) }}">
      @error('stock')
        <div style="color:red">{{ $message }}</div>
      @enderror
    </div>
    <div>
      <button type="submit">Simpan Perubahan</button>
    </div>
  </form>
  <a href="{{ route('product-index') }}">Kembali ke daftar</a>
@endsection
