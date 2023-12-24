<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestion des tags de votre blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div>
                    @include('tags/form', [
                        'url' => route('tags.store'),
                    ])
                </div>
                @if ($tags->count() == 0)
                    <div class="mt-6 w-full text-center	">
                        <p class="font-semibold text-3xl text-gray-600 dark:text-gray-500 leading-tight">
                            Aucun tag disponible
                        </p>
                    </div>
                @else
                    <div class="mt-6 grid grid-cols-4 gap-4">
                        @foreach ($tags as $tag)
                            <div>
                                @include('tags/form', [
                                    'url' => route('tags.update', $tag->id),
                                ])
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
