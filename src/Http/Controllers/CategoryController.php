<?php

namespace Yaromir\ShopPackage\Http\Controllers;

use Yaromir\ShopPackage\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        return view('shoppackage::categories.index', compact('categories'));
    }

    public function create()
    {
        return view('shoppackage::categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories|max:255',
            'measure' => 'required|string|in:kg,pc',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        return view('shoppackage::categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('shoppackage::categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required','string','max:255', Rule::unique('categories')->ignore($category)],
            'measure' => 'required|string|in:kg,pc',
        ]);
        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
