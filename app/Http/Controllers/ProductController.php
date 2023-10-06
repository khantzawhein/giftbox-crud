<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function edit(Product $product) {
        return view('products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product) {
        $payload = $request->validated();
        if ($request->hasFile('product_image')) {
            Storage::disk('public')->delete($product->product_image);
            $payload['product_image'] = $request->file('product_image')->storePublicly('product-images', 'public');
        }
        $product->update($payload);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function store(StoreProductRequest $request) {
        $payload = $request->validated();
        $payload['product_image'] = $request->file('product_image')->storePublicly('product-images', 'public');
        Product::create($payload);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function destroy(Product $product) {
        Storage::disk('public')->delete($product->product_image);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
