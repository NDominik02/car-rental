<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view ('admins.index', [
            'bookings' => Booking::orderBy('id', 'desc')->get()
        ]);
    }

    public function editor()
    {
        $inactiveCars = Car::where('isActive', 0)->
        orderBy('created_at', 'desc')->get();
        $activeCars = Car::where('isActive', 1)->
        orderBy('created_at', 'desc')->get();

        return view('admins.editor', [
            'inactiveCars' => $inactiveCars,
            'activeCars' => $activeCars
        ]);
    }

    public function store(StoreBookingRequest $request)
    {
        //
    }

    public function show(Car $car)
    {
        return view('admins.show', ['car' => $car]);
    }

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
