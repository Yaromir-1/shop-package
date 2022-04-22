<?php

namespace Yaromir\ShopPackage\Http\Controllers;

use Yaromir\ShopPackage\Models\Storage;
use Illuminate\Http\Request;

class StorageController extends Controller
{

    public function index()
    {
        $storages = Storage::all();

        return view('shoppackage::storages.index', compact('storages'));
    }

    public function create()
    {
        return view('shoppackage::storages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        Storage::create($request->all());

        return redirect()->route('storages.index')
            ->with('success', 'Storage created successfully.');
    }

    public function show(Storage $storage)
    {
        return view('shoppackage::storages.show', compact('storage'));
    }

    public function edit(Storage $storage)
    {
        return view('shoppackage::storages.edit', compact('storage'));
    }

    public function update(Request $request, Storage $storage)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
        ]);
        $storage->update($request->all());

        return redirect()->route('storages.index')
            ->with('success', 'Storage updated successfully');
    }

    public function destroy(Storage $storage)
    {
        $storage->delete();

        return redirect()->route('storages.index')
            ->with('success', 'Storage deleted successfully');
    }
}
