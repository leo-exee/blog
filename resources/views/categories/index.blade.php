<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestion des categories de votre blog') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div>
                    @include('categories/form', [
                        'url' => route('categories.store'),
                    ])
                </div>
                @if ($categories->isEmpty())
                    <div class="mt-6 w-full text-center	">
                        <p class="font-semibold text-3xl text-gray-600 dark:text-gray-500 leading-tight">
                            Aucune categorie disponible
                        </p>
                    </div>
                @else
                    <div class="mt-6 grid grid-cols-4 gap-4">
                        @foreach ($categories as $category)
                            <div>
                                @include('categories/form', [
                                    'url' => route('categories.update', $category->id),
                                ])
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
