<?php

namespace Yaromir\ShopPackage\Http\Controllers;

use Yaromir\ShopPackage\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();

        return view('shoppackage::products.index', compact('products'));
    }

    public function create()
    {
        return view('shoppackage::products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('shoppackage::products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('shoppackage::products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required','string','max:255', Rule::unique('products')->ignore($product)],
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|integer',
        ]);
        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
