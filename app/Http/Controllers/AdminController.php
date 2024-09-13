<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Illuminate\Http\Request;
use App\Models\Car;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admins.index', [
            'bookings' => Booking::orderBy('id', 'desc')->get()
        ]);
    }

    public function editor()
    {
        $inactiveCars = Car::where('isActive', 0)->orderBy('created_at', 'desc')->get();
        $activeCars = Car::where('isActive', 1)->orderBy('created_at', 'desc')->get();

        return view('admins.editor', [
            'inactiveCars' => $inactiveCars,
            'activeCars' => $activeCars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('admins.show', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, $id)
    {
        $car = Car::find($id);

        $request->validate([
            'type' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $car->type = $request->input('type');

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/car_images', $filename);

            $car->logo = $filename;
        }

        $car->isActive = $request->has('isActive') ? 1 : 0;
        $car->save();

        if($car->isActive == 0)
        {
            $car->book()->delete();
        }

        return redirect()->back()->with('success', 'Car updated successfully');
    }
}
