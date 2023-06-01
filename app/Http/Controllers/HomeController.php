<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $data = product::paginate(6);
        return view('user.home', compact('data'));
    }

    public function allproduct()
    {
        $data=product::all();
        
        return view('user.allproduct', compact('data'));
    }
}

