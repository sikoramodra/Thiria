@props([
    'route',
    'icon',
    'name',
])

<div>
    <a href="{{ route($route) }}" class="flex group">
        <i data-feather="{{ $icon }}" class="group-hover:text-blue-100 duration-200 ease-in-out"></i>
        <p class="text-lg group-hover:text-blue-100 duration-200 ease-in-out">{{ $name }}</p>
    </a>
</div>
