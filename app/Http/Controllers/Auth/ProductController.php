<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return response()->json([
            'success' => true,
            'message' => 'List Data Product',
            'data' => $products
        ], 200);
        
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
        
        $product = Product::create($validatedData);
        
        if ($product) {
            return response()->json([
                'success' =>true,
                'message' => 'Success Add Product',
                'data' => $product,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product Failed to Save',
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}