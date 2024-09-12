<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CarController extends Controller
{

    public function index()
    {
        $inactiveCars = Car::where('isActive', 0)->orderBy('created_at', 'desc')->get();
        $activeCars = Car::where('isActive', 1)->orderBy('created_at', 'desc')->get();

        return view('cars.index', [
            'inactiveCars' => $inactiveCars,
            'activeCars' => $activeCars
        ]);
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ], [
            'start_date.required' => 'The start date is required.',
            'start_date.date' => 'The start date must be a valid date.',
            'end_date.required' => 'The end date is required.',
            'end_date.date' => 'The end date must be a valid date.',
            'end_date.after' => 'The end date must be a date after the start date.',
        ]);

        $startDate = $validated['start_date'];
        $endDate = $validated['end_date'];

        $availableCars = Car::whereDoesntHave('book', function ($query) use ($startDate, $endDate) {
            $query->whereBetween('start_date', [$startDate, $endDate])
                ->orWhereBetween('end_date', [$startDate, $endDate])
                ->orWhere(function ($query) use ($startDate, $endDate) {
                    $query->where('start_date', '<=', $startDate)
                        ->where('end_date', '>=', $endDate);
                });
        })->get();

        return view('cars.index', compact('availableCars'));
    }

    public function create()
    {
        return view('cars.create');
    }

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

    public function show(Car $car)
    {
        return view('cars.show', ['car' => $car]);
    }

    public function edit(Car $car)
    {
        return view('cars.edit', ['car' => $car]);

    }

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

    public function destroy(Car $car)
    {
        Gate::authorize('edit-job', $car);

        $car->delete();

        return redirect('/');
    }
}
