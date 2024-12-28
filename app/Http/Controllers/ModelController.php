<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models;
use App\Models\Brand;

class ModelController extends Controller
{

    public function index()
    {
        $data = Models::all();
        return view('admin.models.index', compact('data'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('admin.models.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $model = new Models();
        $model->brand_id = $request->brand_id;
        $model->code = $request->code;
        $model->name = $request->name;
        $model->save();

        return redirect()->route('models.index')->with('success', 'Model created successfully');
    }

    public function edit(Models $model)
    {
        $data = $model;
        $brands = Brand::all();
        return view('admin.models.edit', compact('data', 'brands'));
    }

    public function update(Request $request, Models $model)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $model->brand_id = $request->brand_id;
        $model->code = $request->code;
        $model->name = $request->name;
        $model->save();

        return redirect()->route('models.index')->with('success', 'Model updated successfully');
    }

    public function destroy(Models $model)
    {
        $model->delete();

        return redirect()->route('models.index')->with('success', 'Model deleted successfully');
    }
}
