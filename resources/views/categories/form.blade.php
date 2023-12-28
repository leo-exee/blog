<div class="py-4 px-6 w-full bg-white dark:bg-gray-800 shadow rounded-lg h-min sticky top-6">
    <form method="POST" action="{{ $url }}" enctype="multipart/form-data">
        @csrf
        @method(isset($category) ? 'PUT' : 'POST')
        <div>
            <x-input-label for="title">Nom de la categorie</x-input-label>
            <x-text-input type="text" id="name" name="name" class="w-full" required
                value="{{ @old('title', $category->name) }}" />
        </div>

        @if (isset($category))
            <div class="mt-2">
                <p class="text-gray-500 dark:text-gray-400">Date de création : <span
                        class="font-semibold">{{ $category->created_at->format('d/m/Y') }}</span></p>
                <p class="text-gray-500 dark:text-gray-400">Date de mise à jour : <span class="font-semibold">
                        {{ $category->updated_at->format('d/m/Y') }}</span></p>
                <p class="text-gray-500 dark:text-gray-400">Nombre d'articles liés : {{ $category->posts->count() }}</p>
            </div>
        @endif

        <x-primary-button class="mt-4" type="submit">
            {{ isset($category) ? 'Modifier' : 'Ajouter' }}
        </x-primary-button>
    </form>

    @if (isset($category))
        <form id="delete-category-form" action="{{ route('categories.destroy', $category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-danger-button class="mt-4">
                Supprimer
            </x-danger-button>
        </form>
    @endif

</div>
