<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $data = Brand::all();
        return view('admin.brands.index', compact('data'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->save();

        return redirect()->route('brands.index')->with('success', 'Brand created successfully');
    }

    public function edit(Brand $brand)
    {
        $data = $brand;
        return view('admin.brands.edit', compact('data'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brand->name = $request->name;
        $brand->save();

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully');
    }
}
