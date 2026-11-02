<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();

        return view('master-data.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('master-data.product.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}