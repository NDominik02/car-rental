<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inactiveCars = Car::where('isActive', 0)->orderBy('created_at', 'desc')->get();
        $activeCars = Car::where('isActive', 1)->orderBy('created_at', 'desc')->get();

        return view('cars.index', [
            'inactiveCars' => $inactiveCars,
            'activeCars' => $activeCars
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'type' => 'required|string',
            'cost' => 'required|numeric|min:0',
        ], [
            'logo.required' => 'Uploading a car picture is required!',
            'logo.image' => 'Only image files are allowed!',
            'logo.mimes' => 'The image must be in JPEG, PNG or JPG format!',
            'logo.max' => 'The image size must not exceed 2MB!',
            'type.required' => 'Car type is required!',
            'type.string' => 'Car type must be a string!',
            'cost.required' => 'Car cost is required!',
            'cost.numeric' => 'Car cost must be a number!',
            'cost.min' => 'Car cost cannot be negative!',
        ]);

        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('car_images', 'public');
        } else {
            $imagePath = null;
        }


        Car::create([
            'logo' => $imagePath,
            'type' => $request->type,
            'dailyCost' => $request->cost,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('cars.show', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('cars.edit', ['car' => $car]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        Gate::authorize('edit-job', $car);

        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $car->update([
            'type' => request('type'),
            'dailyCost' => request('dailyCost'),
        ]);

        return redirect('/cars/' . $car->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        Gate::authorize('edit-job', $car);

        $car->delete();

        return redirect('/');
    }
}
