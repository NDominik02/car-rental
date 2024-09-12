<x-layout>

    <h2 class="font-bold text-lg">{{ $car->type }}</h2>

    @can('edit', $job)
        <p class="mt-6">
           <x-button href="/jobs/{{ $job->id }}/edit">Edit Car</x-button>
        </p>
    @endcan
</x-layout>
