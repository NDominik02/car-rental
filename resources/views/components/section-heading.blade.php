<div class="items-center gap-x-2">
    <span class="w-2 h-2 bg-white inline-block rounded-full"></span>

    <h3
    {{ $attributes->merge(['class' => 'mb-6 relative inline-block after:absolute after:left-0 after:bottom-0 after:w-full after:border-b-2 after:border-green-800']) }}
>
    {{ $slot }}
</h3>
</div>

