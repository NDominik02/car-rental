<x-layout>
    <section>
        <x-section-heading>
            Available cars
        </x-section-heading>

        <div class="grid lg:grid-cols-3 gap-8">
            @foreach($activeCars as $car)
                <a href="/admin/editor/{{ $car->id }}">
                    <x-car-card :$car />
                </a>
            @endforeach
        </div>
    </section>

    <section>
        <x-section-heading class="mt-10">
            Unavailable cars
        </x-section-heading>

        <div class="grid lg:grid-cols-3 gap-8">
            @foreach($inactiveCars as $car)
                <a href="/admin/editor/{{ $car->id }}">
                <x-car-card :$car />
                </a>
            @endforeach
        </div>
    </section>
</x-layout>
