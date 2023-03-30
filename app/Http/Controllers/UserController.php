<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $products = Product::where('is_deleted', false)->orderBy('title')->paginate(10);
        return $products;
    }

    public function show(Product $product) {
        $size = ['S', 'M', 'L', 'XL', 'XXL'];
        $product = Product::where('id', $product->id)->first();
        return [
            'data' => $product,
            'size' => $size,
        ];
    }
}
