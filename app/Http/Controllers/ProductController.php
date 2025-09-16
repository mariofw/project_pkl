<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // Menampilkan form untuk menambah produk baru
    public function create()
    {
        return view('admin.products.create');
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index');
    }

    // Menampilkan form untuk mengedit produk
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Mengupdate produk
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index');
    }

    // Menghapus produk
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
