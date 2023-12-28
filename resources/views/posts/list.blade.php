<div class="sm:pl-6 lg:pl-8 py-12 w-2/3">
    @if ($posts->isEmpty())
        <div class="mt-6 w-full text-center	">
            <p class="font-semibold text-3xl text-gray-600 dark:text-gray-500 leading-tight">
                Vous n'avez pas encore écrit d'article :(
            </p>
            <a href="{{ route('posts.create') }}"
                class="mt-4 text-xl text-gray-500 dark:text-gray-600 leading-tight underline">
                Ecrire
                votre première
                article
            </a>
        </div>
    @endif
    <div class="grid grid-cols-2 gap-4">
        @foreach ($posts as $post)
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg h-96">
                @if ($post->image)
                    <img class="w-full rounded h-2/5 object-cover" src="{{ asset('storage/images/' . $post->image) }}">
                @else
                    <img class="w-full rounded h-2/5 object-contain no-picture px-32"
                        src="{{ asset('assets/no-image.png') }}">
                @endif

                <div class="sm:px-6 lg:px-8 h-full py-4 flex flex-col place-content-between h-3/5">
                    <div class="text-gray-800 dark:text-gray-200">
                        <div>
                            <p class="text-2xl font-bold">{{ $post->title }}</p>
                        </div>


                        <div>
                            <p>Categorie : <span class="font-semibold">{{ $post->category->name }}</span></p>
                        </div>

                        <div>
                            <p>Autheur : <span class="font-semibold">{{ $post->user->name }}</span></p>
                        </div>

                        <div>
                            <p>Date de publication : <span
                                    class="font-semibold">{{ $post->created_at->format('d/m/Y') }}</span>
                            </p>
                        </div>

                        <div class="mt-2">
                            @foreach ($post->tags as $tag)
                                <span class="inline-flex px-1 py-0.5 rounded-lg text-xs font-bold text-white"
                                    style="background: {{ $tag->color }};">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>

                    @if ($post->user_id == Auth::user()->id)
                        <div class="flex mt-4 space-x-2 justify-end">
                            <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 dark:text-blue-400">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 dark:text-blue-400">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 dark:text-red-400">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    @endif

                </div>
            </div>
        @endforeach
    </div>
</div>
