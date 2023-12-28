<div
    class="text-gray-800 dark:text-gray-200 py-4 px-6 w-full bg-white dark:bg-gray-800 shadow rounded-lg h-min sticky top-6">
    <div>
        <p class="text-gray-500 dark:text-gray-400">Nom : <span class="font-semibold">{{ $user->name }}</span></p>
        <p class="text-gray-500 dark:text-gray-400">Email : <span class="font-semibold">{{ $user->email }}</span></p>
        <p class="text-gray-500 dark:text-gray-400">Date de création : <span
                class="font-semibold">{{ $user->created_at->format('d/m/Y') }}</span></p>
        <p class="text-gray-500 dark:text-gray-400">Date de mise à jour : <span
                class="font-semibold">{{ $user->updated_at->format('d/m/Y') }}</span></p>
        <p class="text-gray-500 dark:text-gray-400">Role : <span class="font-semibold">{{ $user->role }}</span></p>
        <p class="text-gray-500 dark:text-gray-400">Nombre d'articles publiés : <span
                class="font-semibold">{{ $user->posts->count() }}</span></p>
    </div>
    <form id="delete-tag-form" action="{{ route('users.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <x-danger-button class="mt-4">
            Supprimer
        </x-danger-button>
    </form>
</div>
