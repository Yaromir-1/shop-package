<?php

namespace Yaromir\ShopPackage\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Yaromir\ShopPackage\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::all();

        return view('shoppackage::clients.index', compact('clients'));
    }

    public function create()
    {
        return view('shoppackage::clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:clients|email',
            'password' => 'required|string',
        ]);

        Client::create([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        return redirect()->route('clients.index')
            ->with('success', 'Client created successfully.');
    }

    public function show(Client $client)
    {
        return view('shoppackage::clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('shoppackage::clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:clients|email',
            'password' => 'required|string',
        ]);

        $client->update([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        return redirect()->route('clients.index')
            ->with('success', 'Client updated successfully');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Client deleted successfully');
    }
}
