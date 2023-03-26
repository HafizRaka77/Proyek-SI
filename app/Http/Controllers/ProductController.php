<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
class ProductController extends Controller {

    public function index() {
        // if(request()->ajax()) {
        //     $products = Product::latest()->get();
        //     return DataTables::of($products)
        //         ->addIndexColumn()
        //         ->addColumn('aksi', function($row) {
        //             $look = '<a href="/" type="button" class="btn btn-outline-primary">Lihat</a>';
        //             $edit = '<a href="/" type="button" class="btn btn-outline-success">Edit</a>';
        //             $delete = '<button type="button" class="btn btn-outline-danger">Hapus</button>';
        //             $btn = [$look, $edit, $delete];
        //             return $btn;
        //         })
        //         ->rawColumns(['aksi'])
        //         ->make(true);
        // }
        $products = Product::where('is_deleted', false)->orderBy('title')->paginate(10);
        return view('admin.pages.product.index', [
            'data' => $products
        ]);
    }

    public function create() {
        return view('admin.pages.product.create');
    }

    public function edit(Product $product) {
        $size = ['S', 'M', 'L', 'XL', 'XXL'];
        $product = Product::where('id', $product->id)->first();
        return view('admin.pages.product.edit', [
            'data' => $product,
            'size' => $size,
        ]);
    }

    public function show(Product $product) {
        $size = ['S', 'M', 'L', 'XL', 'XXL'];
        $product = Product::where('id', $product->id)->first();
        return view('admin.pages.product.show', [
            'data' => $product,
            'size' => $size,
        ]);
    }

    public function store(ProductRequest $request) {
        try {
            DB::beginTransaction();
            $product = $request->validated();
            if (request()->file('image')) {
                $product['image'] = $request->file('image')->store('public/product-image');
                $product['image'] = Str::replaceFirst('public/', '', $product['image']);
            }
            // dd($product);
            Product::create($product);
            DB::commit();
            return redirect()->route('product.index')->with('createdProduct', 'Produk berhasil ditambahkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('failedAddProduct', 'Produk gagal ditambahkan, silahkan cek form');
        }
    }

    public function update(ProductRequest $request, Product $product) {
        try {
            DB::beginTransaction();
            $products = $request->validated();
            if (request()->file('image')) {
                if($request->oldImage) {
                    Storage::delete($request->image);
                }
                $products['image'] = $request->file('image')->store('public/product-image');
                $products['image'] = Str::replaceFirst('public/', '', $products['image']);
            }
            Product::where('id', $product->id)->update($products);
            DB::commit();
            return redirect()->route('product.index')->with('updateProduct', 'Produk berhasil diubah');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('failedUpdateProduct', 'Produk gagal diupdate, silahkan cek form');
        }
    }

    public function delete(Product $product) {
        try {
            DB::beginTransaction();
            $delete = Product::find($product->id);
            $delete->is_deleted = true;
            $delete->save();
            DB::commit();

            return redirect()->route('product.index')->with('deleteProduct', 'Produk berhasil dihapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('failedDeleteProduct', 'Produk gagal dihapus, coba ulangi');
        }
    }
}
