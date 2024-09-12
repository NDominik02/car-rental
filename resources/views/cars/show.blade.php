<x-layout>
    {{ session(['dailyCost' => $car->dailyCost]) }}
    <form method="POST" action="/cars/{{ $car->id }}/book" enctype="multipart/form-data">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-white/30 pb-12">
                <h2 class="text-base font-semibold leading-7">Book the Car</h2>
                <p class="mt-1 text-sm leading-6">We just need a handful of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-forms.form-field>
                        <x-forms.form-label for="name"></x-forms.form-label>

                        <div class="mt-2">
                            <x-forms.form-input name="name" id="name" placeholder="Full name" />

                            <x-forms.form-error name="name" />
                        </div>
                    </x-forms.form-field>

                    <x-forms.form-field>
                        <x-forms.form-label for="email"></x-forms.form-label>

                        <div class="mt-2">
                            <x-forms.form-input name="email" id="email" placeholder="Email address" />

                            <x-forms.form-error name="email" />
                        </div>
                    </x-forms.form-field>

                    <x-forms.form-field>
                        <x-forms.form-label for="address"></x-forms.form-label>

                        <div class="mt-2">
                            <x-forms.form-input name="address" id="address" placeholder="Address" />

                            <x-forms.form-error name="address" />
                        </div>
                    </x-forms.form-field>

                    <x-forms.form-field>
                        <x-forms.form-label for="phone"></x-forms.form-label>

                        <div class="mt-2">
                            <x-forms.form-input name="phone" id="phone" placeholder="Phone number" />

                            <x-forms.form-error name="phone" />
                        </div>
                    </x-forms.form-field>

                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold leading-6">Cancel</a>
            <x-forms.form-button>Book</x-forms.form-button>
        </div>
    </form>
</x-layout>
