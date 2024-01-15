@props([
    'publication'
])

<a href="{{ route('publication.show', ['publication' => $publication]) }}" class="p-6 bg-white border border-dark-500 rounded-lg shadow hover:bg-dark-100/10 dark:bg-dark-100 dark:border-dark-200 dark:hover:bg-dark-200">
    <h5 class="mb-2 text-2xl font-bold text-dark-100 dark:text-white">{{ $publication->title }}</h5>
    <p class="text-dark-200 dark:text-dark-400">{{ $publication->excerpt }}</p>
</a>
