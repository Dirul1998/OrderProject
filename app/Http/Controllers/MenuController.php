<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Outlet;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        $outlets = Outlet::all();
        return view('menus.create', compact('outlets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'outlet_id' => 'required|exists:outlets,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $menu = new Menu();
        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->price = $request->price;
        $menu->outlet_id = $request->outlet_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/menu'), $imageName);
            $menu->image = $imageName;
        }

        $menu->save();

        return redirect()->route('menus.index')->with('success', 'Menu item created successfully.');
    }

    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menus.show', compact('menu'));
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $outlets = Outlet::all();
        return view('menus.edit', compact('menu', 'outlets'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->price = $request->price;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/menu'), $imageName);
            $menu->image = $imageName;
        }

        $menu->save();

        return redirect()->route('menus.index')->with('success', 'Menu item updated successfully.');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Menu item deleted successfully.');
    }
}
