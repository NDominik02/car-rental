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
        <p>Name: {{ $booking->name }}</p>
        <p>Email: {{ $booking->email }}</p>
        <p>Address: {{ $booking->address }}</p>
        <p>Phone number: {{ $booking->phone }}</p>
        <p>Booking days: {{ $booking->numOfDays }}</p>
        <p>Cost: {{ $booking->cost }}</p>
    </div>

</div>
