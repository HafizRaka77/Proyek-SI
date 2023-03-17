<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller {

    public function index() {
        $product = Product::all();
        return view('product.index', [
            'title' => 'Product',
            'data' => $product
        ]);
    }

    public function create() {
        return view('product.create', [
            'title' => 'Create Product'
        ]);
    }

    public function show(Product $product) {
        $product = Product::where('id', $product->id)->first();
        return view('product.show', [
            'title' => 'Product Detail',
            'data' => $product
        ]);
    }

    public function store(ProductRequest $request) {
        $product = $request->validated();
        if (request()->file('image')) {
            $product['image'] = $request->file('image')->store('public/product-image');
        }
        $product['image'] = Str::replaceFirst('public/', '', $product['foto']);
        try {
            $products = Product::create($product);
            return redirect()->route('product.index')->with('addProduct', 'Produk berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failedAddProduct', 'Produk gagal ditambahkan, silahkan cek form');
        }
    }

    public function update(ProductRequest $request, Product $product) {
        $products = $request->validated();
        if (request()->file('image')) {
            if($product->image) {
                Storage::delete($product->foto);
            }
            $products['image'] = $request->file('image')->store('public/product-image');
        }
        $products['image'] = Str::replaceFirst('public/', '', $products['foto']);
        try {
            Product::where('id', $product)->update($products);
            return redirect()->route('product.index')->with('updateProduct', 'Produk berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failedUpdateProduct', 'Produk gagal diupdate, silahkan cek form');
        }
    }

    public function delete(Product $product) {
        try {
            $delete = Product::find($product);
            $delete->is_deleted = 'true';
            $delete->save();
            return redirect()->route('product.index')->with('deleteProduct', 'Produk berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failedUpdateProduct', 'Produk gagal dihapus');
        }
    }
}
