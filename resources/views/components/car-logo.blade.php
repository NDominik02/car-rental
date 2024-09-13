@props(['car', 'width', 'height'])

<img src="{{ asset($car->logo) }}" alt=""
     style="width: {{ $width }}px; height: {{ $height }}px;"
     class="rounded-xl">
