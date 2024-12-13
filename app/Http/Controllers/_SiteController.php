<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class _SiteController extends Controller
{
    public function index()
    {
        try {
            return view('index');
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
