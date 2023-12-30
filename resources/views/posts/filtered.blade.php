<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($filter) }}
        </h2>
    </x-slot>

    <div class="sm:px-6 lg:px-8 py-4 w-full max-w-7xl mx-auto">
        @if ($posts->isEmpty())
            <div class="mt-4 w-full text-center	">
                <p class="font-semibold text-3xl text-gray-600 dark:text-gray-500 leading-tight">
                    Aucun article disponible :(
                </p>
            </div>
        @endif
        <div class="grid grid-cols-3 gap-4">
            @foreach ($posts as $post)
                <div class="bg-white dark:bg-gray-800 shadow rounded-xl" style="height: 32rem;">
                    @if ($post->image)
                        <img class="w-full rounded-t-xl h-1/2 object-cover"
                            src="{{ asset('storage/images/' . $post->image) }}">
                    @else
                        <img class="w-full rounded-t-xl h-1/2 object-contain no-picture px-32"
                            src="{{ asset('assets/no-image.png') }}">
                    @endif

                    <div class="sm:px-6 lg:px-8 py-4 flex flex-col place-content-between h-1/2">
                        <div class="text-gray-800 dark:text-gray-200">
                            <div>
                                <a href="{{ route('posts.show', $post->id) }}"
                                    class="text-2xl underline font-bold">{{ $post->title }}</a>
                            </div>


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

                            <div class="mt-2">
                                @php $maxTags = 3; @endphp

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
                        <div class="flex mt-4 space-x-2 justify-center">
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
    </div>
</x-app-layout>
