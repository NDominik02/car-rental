<x-layout>

    <section class="text-center">
        <h1 class="font-bold text-4xl">Lets Find The Perfect Rental Car For You</h1>

        <div class="mt-6 mb-10">
            <form action="/search" method="GET">
                @csrf
                <div class="grid grid-cols-1 gap-6 place-items-center">
                    <div>
                        <label for="start_date" class="w-full max-w-sm block text-sm font-medium text-gray-700">Pick-Up Date</label>
                        <input type="date" id="start_date" name="start_date" class="text-black mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm">
                        <x-forms.form-error name="start_date" />
                    </div>
                    <div>
                        <label for="end_date" class="w-full max-w-sm block text-sm font-medium text-gray-700">Return Date</label>
                        <input type="date" id="end_date" name="end_date" class="text-black mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm">
                        <x-forms.form-error name="end_date" />
                    </div>
                </div>

                <div class="mt-6">
                    <x-forms.form-button type="submit">
                        Search
                    </x-forms.form-button>
                </div>
            </form>
        </div>
    </section>

    <section>
        <x-section-heading>
            Available cars for rent
        </x-section-heading>

        <div class="grid lg:grid-cols-3 gap-8">
            @isset($availableCars)
                @if($availableCars->isEmpty())
                    <p>No cars available for the selected dates.</p>
                @else
                    @foreach($availableCars as $car)
                        <a href="/cars/{{ $car->id }}">
                        <x-car-card :$car />
                        </a>
                    @endforeach
                @endif
            @endif
        </div>
    </section>
</x-layout>
