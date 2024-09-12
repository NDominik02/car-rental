<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car Rental</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-zinc-900 text-white">

    <div class="px-10">
        <nav class="flex justify-between items-center py-4 border-b border-white/30">
            <div>
                <a href="/">
                    <img src="{{ \Vite::asset('resources/images/car_logo.svg') }}" alt="">
                </a>
            </div>

            <div class="space-x-12 font-bold">
                <x-nav-link href="/" :active="request()->is('/') || request()->is('search*')">Rent a Car</x-nav-link>
            @if(request()->is('admin') || request()->is('admin/editor'))
                    <x-nav-link href="/admin" :active="request()->is('admin')">Bookings</x-nav-link>
                    <x-nav-link href="/admin/editor" :active="request()->is('admin/editor')">Editor</x-nav-link>
                @endif
            </div>

            @if(request()->is('admin') || request()->is('admin/editor'))
                <div>
                    <x-button href="/cars/create">Add a Car</x-button>
                </div>
            @else
                <div>
                    <x-button href="/admin">Admin</x-button>
                </div>
            @endif
        </nav>
    </div>

    <main class="mt-10 max-w-[986px] mx-auto">
        {{ $slot }}
    </main>

</body>
</html>
