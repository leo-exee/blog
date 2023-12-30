<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestion des tags de votre blog') }}
        </h2>
    </x-slot>

    <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @include('tags/form', [
            'url' => route('tags.store'),
        ])
        @if ($tags->isEmpty())
            <div class="w-full text-center">
                <p class="font-semibold text-3xl text-gray-600 dark:text-gray-500 leading-tight">
                    Aucun tag disponible
                </p>
            </div>
        @else
            <div class="mt-4 grid grid-cols-4 gap-4">
                @foreach ($tags as $tag)
                    @include('tags/form', [
                        'url' => route('tags.update', $tag->id),
                    ])
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
