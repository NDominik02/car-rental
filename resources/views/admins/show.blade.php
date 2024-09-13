<x-layout>
    <form method="POST" action="/admin/editor/{{ $car->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="space-y-12">
            <div class="border-b border-white/30 pb-12">
                <h2 class="text-base font-semibold leading-7">Edit Car Details</h2>
                <p class="mt-1 text-sm leading-6">Update the details of the car.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <!-- Car Type -->
                    <x-forms.form-field>
                        <x-forms.form-label for="type">Type</x-forms.form-label>
                        <div class="mt-2">
                            <x-forms.form-input
                                name="type"
                                id="type"
                                value="{{ old('type', $car->type) }}" />
                            <x-forms.form-error name="type" />

                        </div>
                    </x-forms.form-field>

                    <!-- Logo -->
                    <x-forms.form-field>
                        <x-forms.form-label for="logo">Picture of the car</x-forms.form-label>
                        <div class="mt-2">
                            <input
                                type="file"
                                name="logo"
                                id="logo" />
                            <x-forms.form-error name="logo" />

                         </div>
                    </x-forms.form-field>

                    <!-- Active Status -->
                    <x-forms.form-field>
                        <div class="flex items-center space-x-2">
                            <x-forms.form-label for="isActive" class="whitespace-nowrap">Active</x-forms.form-label>
                            <input
                                type="checkbox"
                                id="isActive"
                                name="isActive" {{ old('isActive', $car->isActive) ? 'checked' : '' }} class="form-checkbox">
                        </div>
                        <x-forms.form-error name="isActive" />

                    </x-forms.form-field>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold leading-6">Cancel</a>
            <x-forms.form-button>Save Changes</x-forms.form-button>
        </div>
    </form>
</x-layout>
