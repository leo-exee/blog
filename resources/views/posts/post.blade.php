<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($post->title) }}
        </h2>
    </x-slot>

    <div class="text-gray-800 dark:text-gray-200 py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 flex w-full">
        <div class="mr-4 sm:px-6 lg:px-8 py-4 w-2/5 bg-white dark:bg-gray-800 shadow rounded-lg h-min sticky top-6">
            <div>
                <p class="text-2xl font-bold">{{ $post->title }}</p>
            </div>


            <div>
                <p>Categorie : <span class="font-semibold">{{ $post->category->name }}</span></p>
            </div>


            <div>
                @foreach ($post->tags as $tag)
                    <span class="px-1 py-0.5 rounded-lg text-xs font-bold"
                        style="background: {{ $tag->color }};">{{ $tag->name }}</span>
                @endforeach
            </div>

        </div>
        <div class="w-full bg-rounded p-2 mt-0">
            {!! $post->content !!}
        </div>
    </div>
</x-app-layout>
