<x-layout>

    <form method="POST" action="/admin/store" enctype="multipart/form-data">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-white/30 pb-12">
                <h2 class="text-base font-semibold leading-7">Create a New Car</h2>
                <p class="mt-1 text-sm leading-6">We just need a handful of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-forms.form-field>
                        <x-forms.form-label for="title">Type</x-forms.form-label>

                        <div class="mt-2">
                            <x-forms.form-input name="type" id="type" placeholder="Type of the car..." />

                            <x-forms.form-error name="type" />
                        </div>
                    </x-forms.form-field>

                    <x-forms.form-field>
                        <x-forms.form-label for="salary">Cost per day</x-forms.form-label>

                        <div class="mt-2">
                            <x-forms.form-input name="cost" id="cost" placeholder="Daily cost..." />

                            <x-forms.form-error name="cost" />
                        </div>
                    </x-forms.form-field>

                    <x-forms.form-field>
                        <x-forms.form-label for="logo">Picture of the car</x-forms.form-label>

                        <div class="mt-2">
                            <x-forms.form-input name="logo" id="logo" type="file" />
                        </div>
                        <x-forms.form-error name="logo" />

                    </x-forms.form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold leading-6">Cancel</a>
            <x-forms.form-button>Save</x-forms.form-button>
        </div>
    </form>
</x-layout>
