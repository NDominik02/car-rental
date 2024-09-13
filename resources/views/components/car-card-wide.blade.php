@props(['booking'])

<div class="p-4 bg-zinc-800 rounded-xl flex">

    <div>
        <div><img src="http://picsum.photos/seed/{{ rand(0, 100000) }}/250/116" alt="" class="rounded-xl"></div>


    <div class="py-8 font-bold text-center">
        <h3 class="group-hover:text-green-800 text-xl transition-colors duration-400">{{ $booking->car->type }}</h3>
        <p class="text-sm">${{ $booking->car->dailyCost }} USD per day</p>
    </div>
    </div>

    <div class="ml-10">
        <p><b>Name:</b> {{ $booking->name }}</p>
        <p><b>Email:</b> {{ $booking->email }}</p>
        <p><b>Address:</b> {{ $booking->address }}</p>
        <p><b>Phone number:</b> {{ $booking->phone }}</p>
        <p><b>Booking days:</b> {{ $booking->numOfDays }}
        <p><b> From:</b> {{ $booking->start_date }} <b>Till:</b> {{ $booking->end_date }}</p>
        <p><b>Paid:</b> {{ $booking->cost }}$</p>
    </div>

</div>
