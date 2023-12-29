<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Consulter l\'article de votre choix') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="py-4">
                    @if ($posts->isEmpty())
                        <div class="w-full text-center	">
                            <p class="font-semibold text-3xl text-gray-600 dark:text-gray-500 leading-tight">
                                Aucun article n'a été publié pour le moment :(
                            </p>
                        </div>
                    @else
                        <div class="flex flex-col space-y-4">
                            @foreach ($posts->reverse() as $post)
                                <div
                                    class="h-64 flex bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-gray-900 dark:text-gray-100">
                                    @if ($post->image)
                                        <img class="w-1/3 object-cover"
                                            src="{{ asset('storage/images/' . $post->image) }}">
                                    @else
                                        <img class="w-1/3 px-24 py-4 object-contain no-picture"
                                            src="{{ asset('assets/no-image.png') }}">
                                    @endif
                                    <div class="w-2/3 flex flex-col place-content-between p-6 ">
                                        <div>
                                            <a href="{{ route('posts.show', $post->id) }}"
                                                class="text-2xl font-semibold underline">{{ $post->title }} </a>
                                            <p class="text-gray-500 dark:text-gray-400">Categorie : <a
                                                    href="{{ route('categories.posts', $post->category->id) }}"
                                                    class="font-semibold underline">{{ $post->category->name }}</a>
                                            </p>
                                            @if ($post->user)
                                                <p class="text-gray-500 dark:text-gray-400">Autheur : <a
                                                        href="{{ route('users.posts', $post->user->id) }}"
                                                        class="font-semibold underline">{{ $post->user->name }}</a></p>
                                            @else
                                                <p class="text-gray-500 dark:text-gray-400">Autheur : <span
                                                        class="font-semibold">inconnu</span></p>
                                            @endif
                                            <p class="text-gray-500 dark:text-gray-400">Date de publication : <span
                                                    class="font-semibold">{{ $post->created_at->format('d/m/Y') }}</span>
                                            </p>
                                            <div>
                                                @php $maxTags = 5; @endphp

                                                @foreach ($post->tags->take($maxTags) as $tag)
                                                    <a href="{{ route('tags.posts', $tag->id) }}"
                                                        class="inline-flex px-1 py-0.5 rounded-lg text-xs font-bold text-white"
                                                        style="background: {{ $tag->color }};">{{ $tag->name }}</a>
                                                @endforeach

                                                @if ($post->tags->count() > $maxTags)
                                                    <span
                                                        class="inline-flex px-1 py-0.5 rounded-lg text-xs font-bold text-black dark:text-white bg-gray-100 dark:bg-gray-900">
                                                        +{{ $post->tags->count() - $maxTags }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex w-full justify-end">
                                            <a class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                                href="{{ route('posts.show', $post->id) }}">
                                                Lire l'article
                                                <i class="ml-1 fa-solid fa-angle-right"></i>
                                            </a>
                                        </div>
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
