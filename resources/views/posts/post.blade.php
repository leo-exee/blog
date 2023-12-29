<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($post->title) }}
        </h2>
    </x-slot>

    <div class="text-gray-800 dark:text-gray-200 py-4 max-w-7xl mx-auto sm:px-6 lg:px-8 flex w-full">
        <div class="mr-4 w-2/5 bg-white dark:bg-gray-800 shadow rounded-lg h-min sticky top-24">
            @if ($post->image)
                <img class="w-full rounded-t-lg" src="{{ asset('storage/images/' . $post->image) }}">
            @endif

            <div class="sm:px-6 lg:px-8 py-4">
                <div>
                    <p class="text-2xl font-bold">{{ $post->title }}</p>
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
                    <p class="text-gray-500 dark:text-gray-400">Autheur : <span class="font-semibold">inconnu</span></p>
                @endif

                <p class="text-gray-500 dark:text-gray-400">Date de publication : <span
                        class="font-semibold">{{ $post->created_at->format('d/m/Y') }}</span>

                <div class="mt-2">
                    @foreach ($post->tags as $tag)
                        <a href="{{ route('tags.posts', $tag->id) }}"
                            class="inline-flex px-1 py-0.5 rounded-lg text-xs font-bold text-white"
                            style="background: {{ $tag->color }};">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="post" class="w-3/5 bg-rounded mt-0 break-words">
            {!! $post->content !!}
        </div>
    </div>
</x-app-layout>
