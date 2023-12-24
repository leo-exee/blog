<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Consulter l\'article de votre choix') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="py-6">
                    @if ($posts->count() == 0)
                        <div class="w-full text-center	">
                            <p class="font-semibold text-3xl text-gray-600 dark:text-gray-500 leading-tight">
                                Aucun article n'a été publié pour le moment :(
                            </p>
                        </div>
                    @else
                        <div class="grid grid-cols-4 gap-4">
                            @foreach ($posts as $post)
                                <div
                                    class="p-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg space-y-2">
                                    <h2 class="text-2xl font-bold">{{ $post->title }}</h2>
                                    <p class="text-gray-500 dark:text-gray-400">Categorie : <span
                                            class="font-semibold">{{ $post->category->name }}</span></p>
                                    <p class="text-gray-500 dark:text-gray-400">Autheur : <span
                                            class="font-semibold">{{ $post->user->name }}</span></p>
                                    <div>
                                        @foreach ($post->tags as $tag)
                                            <span class="px-1 py-0.5 rounded-lg text-xs font-bold"
                                                style="background: {{ $tag->color }};">{{ $tag->name }}</span>
                                        @endforeach
                                    </div>
                                    <p class="text-gray-500 dark:text-gray-400">{{ $post->created_at->format('d/m/Y') }}
                                    </p>
                                    <div class="flex w-full justify-end">
                                        <a href="{{ route('posts.show', $post->id) }}"
                                            class="text-blue-500 dark:text-blue-400">Voir l'article <i
                                                class="fa-solid fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
