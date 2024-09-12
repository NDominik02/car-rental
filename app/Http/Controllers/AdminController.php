<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
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
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
