<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public  function index()
    {
        $products = Product::all();
        // Logic to retrieve and display products
        return view('products.index', ['products' => $products]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
    }

    public function add()
    {
        // Logic to show the form for adding a new product

        return view('products.add');
    }
    
    public function store(Request $request)

    {
        // Logic to handle the form submission and store the product
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $newproduct = Product::create($validatedData);

        return redirect()->route('product.index')->with('success', 'Product added successfully!');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validatedData);

        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }
}
