<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Products";
        $products = Product::orderBy('id', 'desc')->get();
        return view('products.index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Product";
        return view('products.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category' => 'required',
            'image' => 'required|image|file|max:3072',
            'is_best_seller' => 'required',
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('public/product-image');
        }
        
        Product::create($validatedData);
        
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Detail Product";
        $product = Product::find($id);
        return view('products.show', compact('product', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Product";
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category' => 'required',
            'image' => 'image|file|max:3072',
            'is_best_seller' => 'required',
        ]);

        // Periksa apakah ada foto baru diunggah
        if ($request->hasFile('image')) {
            // Hapus foto lama dari storage
            Storage::delete($product->image);

            // Simpan foto baru di dalam storage
            $validatedData['image'] = $request->file('image')->store('public/product-image');
        }

        // Update data dokter
        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}