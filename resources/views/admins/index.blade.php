<x-layout>
    <section>

            <x-section-heading>
                Booking information
            </x-section-heading>

        <div class="grid gap-8">
            @foreach($bookings as $booking)
                <x-car-card-wide :$booking />
            @endforeach
        </div>
    </section>
</x-layout>
