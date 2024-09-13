@props(['car'])

<div class="p-4 bg-zinc-800 rounded-xl flex-col text-center
            border border-transparent hover:border-green-800 group transition-colors duration-400">
    <div>
        <x-car-logo :car="$car" :width="350" :height="200"/>
    </div>

    <div class="py-8 font-bold">
        <h3 class="group-hover:text-green-800 text-xl transition-colors duration-400">{{ $car->type }}</h3>
        <p class="text-sm">${{ $car->dailyCost }} USD per day</p>
    </div>
</div>
