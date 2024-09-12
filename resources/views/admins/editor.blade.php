<x-layout>
    <section>
        <x-section-heading>
            Available cars
        </x-section-heading>

        <div class="grid lg:grid-cols-3 gap-8">
            @foreach($activeCars as $car)
                <x-car-card :$car />
            @endforeach
        </div>
    </section>

    <section>
        <x-section-heading class="mt-10">
            Unavailable cars
        </x-section-heading>

        <div class="grid lg:grid-cols-3 gap-8">
            @foreach($inactiveCars as $car)
                <x-car-card :$car />
            @endforeach
        </div>
    </section>
</x-layout>
