<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __($post->id ? 'Edition de l\'article' : 'Création d\'un nouvel article') }}
    </h2>
</x-slot>

<form method="POST" action="{{ $url }}" enctype="multipart/form-data"
    class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 flex w-full">
    @csrf
    @method($post->id ? 'PUT' : 'POST')

    <div class="mr-4 sm:px-6 lg:px-8 py-4 w-2/5 bg-white dark:bg-gray-800 shadow rounded-lg h-min sticky top-24">
        <div>
            <x-input-label for="title">Titre*</x-input-label>
            <x-text-input type="text" id="title" name="title" class="w-full" required
                value="{{ @old('title', $post->title) }}" />
            @error('title')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>


        <div>
            <x-input-label for="category_id">Categorie*</x-input-label>
            <select id="category_id" name="category_id"
                class="w-full p-2 border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                required>
                <option {{ @old('category_id', $post->category_id) ? '' : 'selected' }} disabled>Sélectionner une
                    catégorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ @old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-4">
            <x-input-label for="tags">Tags</x-input-label>
            <select id="tags" name="tags[]" class="js-select2 overflow-hidden w-full" multiple
                style="height:calc(36px * {{ !$tags->isEmpty() }})">
                @foreach ($tags as $tag)
                    <option data-badge="" value="{{ $tag->id }}"
                        {{ $post->tags->contains($tag) ? 'selected' : '' }} style="color: {{ $tag->color }}">
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            @error('tags')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <x-input-label for="image">{{ isset($post->id) ? "Remplacer l'image" : 'Image' }}</x-input-label>
            <input type="file" id="image" name="image"
                class="w-full p-2 border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" />
            @error('image')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <x-primary-button type="submit">Enregistrer</x-primary-button>
    </div>
    <div class="w-3/5 mr-6">
        @error('content')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
        <textarea class="w-full rounded-lg bg-gray-100 dark:bg-gray-900" id="content" name="content" rows="50" required>{{ @old('content', $post->content) ?? ' ' }}</textarea>
    </div>
</form>
