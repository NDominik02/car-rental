<x-layout>
    <x-slot:heading>
        Create Car
    </x-slot:heading>

    <form method="POST" action="/cars">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a New Car</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Type</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="type" id="type" placeholder="CEO" />

                            <x-form-error name="type" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="salary">Cost per day</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="cost" id="cost" placeholder="$50,000 USD" />

                            <x-form-error name="cost" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <x-form-button>Save</x-form-button>
        </div>
    </form>
</x-layout>
