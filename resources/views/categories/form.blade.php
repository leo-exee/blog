<div class="py-4 px-6 w-full bg-white dark:bg-gray-800 shadow rounded-lg h-min sticky top-6">
    <form method="POST" action="{{ $url }}" enctype="multipart/form-data">
        @csrf
        @method(isset($category) ? 'PUT' : 'POST')
        <div>
            <x-input-label for="title">Nom de la categorie</x-input-label>
            <x-text-input type="text" id="name" name="name" class="w-full" required
                value="{{ @old('title', $category->name) }}" />
        </div>

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