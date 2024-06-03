<?php

namespace App\Http\Controllers;
use App\Models\Outlet;

use Illuminate\Http\Request;

class OutletController extends Controller
{
    //
    public function index()
    {
        $outlets = Outlet::all();
        return view('outlets.index', compact('outlets'));
    }

    public function create()
    {
        return view('outlets.create');
    }

    public function outletStatistics()
    {
        $totalOutlets = Outlet::count();
        // $averageOutletsPerCity = Outlet::groupBy('city')->count();

        return view('dashboard', compact('totalOutlets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        $outlet = new Outlet();
        $outlet->name = $request->name;
        $outlet->address = $request->address;
        $outlet->phone = $request->phone;
        $outlet->save();

        return redirect()->route('outlets.index')->with('success', 'Outlet created successfully.');
    }

    public function show($id)
    {
        $outlet = Outlet::findOrFail($id);
        return view('outlets.show', compact('outlet'));
    }

    public function edit($id)
    {
        $outlet = Outlet::findOrFail($id);
        return view('outlets.edit', compact('outlet'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        $outlet = Outlet::findOrFail($id);
        $outlet->name = $request->name;
        $outlet->address = $request->address;
        $outlet->phone = $request->phone;
        $outlet->save();

        return redirect()->route('outlets.index')->with('success', 'Outlet updated successfully.');
    }

    public function destroy($id)
    {
        $outlet = Outlet::findOrFail($id);
        $outlet->delete();

        return redirect()->route('outlets.index')->with('success', 'Outlet deleted successfully.');
    }
}
