<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestion des utilisateurs de votre blog') }}
        </h2>
    </x-slot>

    <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            @if ($users->isEmpty())
                <div class="mt-4 w-full text-center	">
                    <p class="font-semibold text-3xl text-gray-600 dark:text-gray-500 leading-tight">
                        Aucun utilisateurs
                    </p>
                </div>
            @else
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($users as $user)
                        @include('users/form', ['user' => $user])
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
