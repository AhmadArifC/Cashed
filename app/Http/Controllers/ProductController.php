<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        $products = $query->get();

        return view('products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()
        ->where('active', 1)
        ->get();

        return view('products.create', [
            'categories' => $categories
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image',
        ]);

        $product = new product();
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = Storage::disk('public')->put('product', $request->image);
        $product->active = $request->active == 'on';
        $product->save();

        return redirect()
        ->route('products.index')
        ->with('success', 'Product berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::query()
        ->where('active', 1)
        ->get();

        return view('products.edit', [
            'categories' => $categories,
            'product' => $product
        ]);



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;

        if ($request->image) {
            $product->image = Storage::disk('public')->put('products', $request->image);
        }

        $product->active = $request->active == 'on';
        $product->save();

        return redirect()
        ->route('products.index')
        ->with('success', 'Product berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
        ->route('products.index')
        ->with('success', 'Product berhasil dihapus');
    }
}
