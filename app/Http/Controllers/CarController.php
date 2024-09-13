<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CarController extends Controller
{

    public function index()
    {
        $inactiveCars = Car::where('isActive', 0)->
        orderBy('created_at', 'desc')->get();
        $activeCars = Car::where('isActive', 1)->
        orderBy('created_at', 'desc')->get();

        return view('cars.index', [
            'inactiveCars' => $inactiveCars,
            'activeCars' => $activeCars
        ]);
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date|after_or_equal:today',
        ], [
            'start_date.required' => 'The start date is required.',
            'start_date.date' => 'The start date must be a valid date.',
            'start_date.after_or_equal' => 'The start date cannot be earlier than today.',
            'end_date.required' => 'The end date is required.',
            'end_date.date' => 'The end date must be a valid date.',
            'end_date.after' => 'The end date must be a date after the start date.',
            'end_date.after_or_equal' => 'The end date cannot be earlier than today.',
        ]);

        $startDate = $validated['start_date'];
        $endDate = $validated['end_date'];

        $availableCars = Car::where('isActive', 1)
            ->whereDoesntHave('book', function ($query) use ($startDate, $endDate) {
            $query->whereBetween('start_date', [$startDate, $endDate])
                ->orWhereBetween('end_date', [$startDate, $endDate])
                ->orWhere(function ($query) use ($startDate, $endDate) {
                    $query->where('start_date', '<=', $startDate)
                        ->where('end_date', '>=', $endDate);
                });
        })
            ->orderBy('created_at', 'desc')
            ->get();

        session(['start_date' => $startDate]);
        session(['end_date' => $endDate]);
        $numOfDays = (int) Carbon::parse($startDate)->diffInDays(Carbon::parse($endDate)) +1;
        session(['numOfDays' => $numOfDays]);


        return view('cars.index', compact('availableCars'));
    }

    public function placeBooking(Request $request, $carId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15|regex:/^[0-9\-\(\)\/\+\s]*$/'
        ]);

        Booking::create([
            'car_id' => $carId,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'start_date' => session('start_date'),
            'end_date' => session('end_date'),
            'numOfDays' => session('numOfDays'),
            'cost' => session('dailyCost') * session('numOfDays'),
        ]);

        session()->forget(['start_date', 'end_date', 'dailyCost', 'numOfDays']);

        return redirect('/');
    }

    public function create()
    {
        return view('admins.create');
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
}
