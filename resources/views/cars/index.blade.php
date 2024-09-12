<x-layout>

    <section class="text-center">
        <h1 class="font-bold text-4xl">Lets Find The Perfect Rental Car For You</h1>

        <div class="mt-6 mb-10">
            <form action="" method="POST">
                <div class="grid grid-cols-1 gap-6 place-items-center">
                    <div>
                        <label for="start-date" class="w-full max-w-sm block text-sm font-medium text-gray-700">Pick-Up Date</label>
                        <input type="date" id="start-date" name="start-date" class="text-black mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="end-date" class="w-full max-w-sm block text-sm font-medium text-gray-700">Return Date</label>
                        <input type="date" id="end-date" name="end-date" class="text-black mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm">
                    </div>
                </div>

                <div class="mt-6">
                    <x-button type="submit">
                        Search
                    </x-button>
                </div>
            </form>
        </div>
    </section>

    <section>
        <x-section-heading>
            Available cars for rent
        </x-section-heading>

        <div class="grid lg:grid-cols-3 gap-8">
            @foreach($activeCars as $car)
                <x-car-card :$car />
            @endforeach
        </div>
    </section>
</x-layout>
