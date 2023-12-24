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
    <div class="grid grid-cols-3 gap-4">
        @foreach ($posts as $post)
            <div
                class="p-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-2xl font-bold">{{ $post->title }}</h2>
                <p class="text-gray-500 dark:text-gray-400">Categorie : <span
                        class="font-semibold">{{ $post->category->name }}</span></p>
                <p class="text-gray-500 dark:text-gray-400">{{ $post->created_at->format('d/m/Y') }}</p>
                <div>
                    @foreach ($post->tags as $tag)
                        <span class="px-1 py-0.5 rounded-lg text-xs font-bold"
                            style="background: {{ $tag->color }};">{{ $tag->name }}</span>
                    @endforeach
                </div>
                <div class="flex flex-col">
                    <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 dark:text-blue-400">Voir
                        l'article</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 dark:text-blue-400">Modifier
                        l'article</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 dark:text-red-400">Supprimer l'article</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
