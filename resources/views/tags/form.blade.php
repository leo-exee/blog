<div class="py-4 px-6 w-full bg-white dark:bg-gray-800 shadow rounded-lg h-min sticky top-6">
    <form method="POST" action="{{ $url }}" enctype="multipart/form-data">
        @csrf
        @method(isset($tag) ? 'PUT' : 'POST')
        <div>
            <x-input-label for="title">Nom du tag</x-input-label>
            <x-text-input type="text" id="name" name="name" class="w-full" required
                value="{{ @old('title', $tag->name) }}" />
        </div>

        <div>
            <x-input-label for="title">Couleur du tag</x-input-label>
            <x-text-input type="color" id="color" name="color" class="w-full" required
                value="{{ @old('title', $tag->color) }}" />
        </div>


        <x-primary-button class="mt-4" type="submit">
            {{ isset($tag) ? 'Modifier' : 'Ajouter' }}
        </x-primary-button>
    </form>

    @if (isset($tag))
        <form id="delete-tag-form" action="{{ route('categories.destroy', $tag->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-danger-button class="mt-4">
                Supprimer
            </x-danger-button>
        </form>
    @endif

</div>
