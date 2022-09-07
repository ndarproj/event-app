<x-app-layout>

    <h2 class="font-bold text-2xl">Edit {{ ucwords($event->name) }}</h2>
    <span class="flex my-6">
        <a href="{{ route('events.show', ['event' => $event->id]) }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
        </a>
    </span>
    <div class="mt-4 -mb-3">
    </div>
</x-app-layout>
