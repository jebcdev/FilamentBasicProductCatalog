<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = Product::all();

            return view('products.index', [
                'products' => $products
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function details(Product $product)
    {
        try {
            $product->load('category');
            // return response()->json($product);
            return view('products.details', [
                'product' => $product
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function categories()
    {
        try {
            $categories = Category::query()->withCount('products')->get();
            // return response()->json($categories);
            return view('products.categories', [
                'categories' => Category::all()
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function productsByCategory(Category $category)
    {
        try {
            $category->load('products');

           return view('products.index', [
                'products' => $category->products
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
