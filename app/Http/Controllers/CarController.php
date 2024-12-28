<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Models;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $data = Car::all();
        return view('admin.cars.index', compact('data'));
    }

    public function create()
    {
        $models = Models::all();
        return view('admin.cars.create', compact('models'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'model_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'plate_number' => 'required|string|max:255',
            'transmission' => 'required|in:manual,automatic',
            'tax' => 'required|string|max:255',
            'exp_date' => 'required|date',
            'year' => 'required|integer',
            'color' => 'required|string|max:255',
            'kilometers' => 'required|integer',
            'registration_area' => 'required|string|max:255',
            'cc_engine' => 'required|integer',
            'image' => 'required|image',
            'price' => 'required|string|max:255',
            'is_sold' => 'required|boolean',
            'description' => 'required|string',
        ]);

        $car = new Car();
        $car->model_id = $request->model_id;
        $car->name = $request->name;
        $car->plate_number = $request->plate_number;
        $car->transmission = $request->transmission;
        $car->tax = $request->tax;
        $car->exp_date = $request->exp_date;
        $car->year = $request->year;
        $car->color = $request->color;
        $car->kilometers = $request->kilometers;
        $car->registration_area = $request->registration_area;
        $car->cc_engine = $request->cc_engine;
        $car->image = $request->file('image')->store('cars', 'public');
        $car->price = $request->price;
        $car->is_sold = $request->is_sold;
        $car->description = $request->description;
        $car->save();

        return redirect()->route('cars.index')->with('success', 'Car created successfully');
    }

    public function show(Car $car)
    {
        $data = $car;
        return view('admin.cars.show', compact('data'));
    }

    public function edit(Car $car)
    {
        $data = $car;
        $models = Models::all();
        return view('admin.cars.edit', compact('data', 'models'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'model_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'plate_number' => 'required|string|max:255',
            'transmission' => 'required|in:manual,automatic',
            'tax' => 'required|string|max:255',
            'exp_date' => 'required|date',
            'year' => 'required|integer',
            'color' => 'required|string|max:255',
            'kilometers' => 'required|integer',
            'registration_area' => 'required|string|max:255',
            'cc_engine' => 'required|integer',
            'image' => 'image',
            'price' => 'required|string|max:255',
            'is_sold' => 'required|boolean',
            'description' => 'required|string',
        ]);

        $car->model_id = $request->model_id;
        $car->name = $request->name;
        $car->plate_number = $request->plate_number;
        $car->transmission = $request->transmission;
        $car->tax = $request->tax;
        $car->exp_date = $request->exp_date;
        $car->year = $request->year;
        $car->color = $request->color;
        $car->kilometers = $request->kilometers;
        $car->registration_area = $request->registration_area;
        $car->cc_engine = $request->cc_engine;
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($car->image);
            $car->image = $request->file('image')->store('cars', 'public');
        }
        $car->price = $request->price;
        $car->is_sold = $request->is_sold;
        $car->description = $request->description;
        $car->save();

        return redirect()->route('cars.index')->with('success', 'Car updated successfully');
    }

    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully');
    }
}
