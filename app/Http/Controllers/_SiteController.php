<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class _SiteController extends Controller
{
    public function index()
    {
        try {
            // return view('index');
            return to_route('products.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function dashboard()
    {
        try {
            return view('dashboard');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
