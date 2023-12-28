<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($post->title) }}
        </h2>
    </x-slot>

    <div class="text-gray-800 dark:text-gray-200 py-4 max-w-7xl mx-auto sm:px-6 lg:px-8 flex w-full">
        <div class="mr-4 w-2/5 bg-white dark:bg-gray-800 shadow rounded-lg h-min sticky top-6">
            @if ($post->image)
                <img class="w-full rounded-t-lg" src="{{ asset('storage/images/' . $post->image) }}">
            @endif

            <div class="sm:px-6 lg:px-8 py-4">
                <div>
                    <p class="text-2xl font-bold">{{ $post->title }}</p>
                </div>


                <div>
                    <p>Categorie : <span class="font-semibold">{{ $post->category->name }}</span></p>
                </div>

                <div>
                    <p>Autheur : <span class="font-semibold">{{ $post->user->name ?? 'inconnu' }}</span></p>
                </div>

                <div>
                    <p>Date de publication : <span class="font-semibold">{{ $post->created_at->format('d/m/Y') }}</span>
                    </p>
                </div>

                <div class="mt-2">
                    @foreach ($post->tags as $tag)
                        <span class="inline-flex px-1 py-0.5 rounded-lg text-xs font-bold text-white"
                            style="background: {{ $tag->color }};">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="post" class="w-full bg-rounded p-2 mt-0">
            {!! $post->content !!}
        </div>
    </div>
</x-app-layout>
