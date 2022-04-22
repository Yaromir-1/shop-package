<?php

namespace Yaromir\ShopPackage\Http\Controllers;

use Yaromir\ShopPackage\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{

    public function index()
    {
        $providers = Provider::all();

        return view('shoppackage::providers.index', compact('providers'));
    }

    public function create()
    {
        return view('shoppackage::providers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string',
        ]);

        Provider::create($request->all());

        return redirect()->route('providers.index')
            ->with('success', 'Provider created successfully.');
    }

    public function show(Provider $provider)
    {
        return view('shoppackage::providers.show', compact('provider'));
    }

    public function edit(Provider $provider)
    {
        return view('shoppackage::providers.edit', compact('provider'));
    }

    public function update(Request $request, Provider $provider)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string',
        ]);
        $provider->update($request->all());

        return redirect()->route('providers.index')
            ->with('success', 'Provider updated successfully');
    }

    public function destroy(Provider $provider)
    {
        $provider->delete();

        return redirect()->route('providers.index')
            ->with('success', 'Provider deleted successfully');
    }
}
