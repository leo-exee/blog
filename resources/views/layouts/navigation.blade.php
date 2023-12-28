<nav x-data="{ open: false }" class="fixed py-4 z-10 flex justify-center w-full">
    <!-- Primary Navigation Menu -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm px-4 sm:px-6 lg:px-8 w-full max-w-7xl">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('index') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>
            </div>

            <div class="flex space-x-8">

                <x-nav-link
                    class="inline-flex items-center px-3 py-1 text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150"
                    :href="route('index')" :active="request()->routeIs('index')">
                    <i class="fa-solid fa-home mr-1"></i>
                    {{ __('Accueil') }}
                </x-nav-link>
                @if (Auth::check())
                    @if (Auth::user()->role == 'admin')
                        <x-nav-link
                            class="inline-flex items-center px-3 py-1 text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150"
                            :href="route('categories.index')" :active="request()->routeIs('categories.index')">
                            <i class="fa-solid fa-list mr-1"></i>
                            {{ __('Catégories') }}
                        </x-nav-link>
                        <x-nav-link
                            class="inline-flex items-center px-3 py-1 text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150"
                            :href="route('tags.index')" :active="request()->routeIs('tags.index')">
                            <i class="fa-solid fa-tag mr-1"></i>
                            {{ __('Tags') }}
                        </x-nav-link>
                        <x-nav-link
                            class="inline-flex items-center px-3 py-1 text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150"
                            :href="route('users.index')" :active="request()->routeIs('users.index')">
                            <i class="fa-solid fa-users mr-1"></i>
                            {{ __('Utilisateurs') }}
                        </x-nav-link>
                    @endif
                    <x-nav-link
                        class="inline-flex items-center px-3 py-1 text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150"
                        :href="route('posts.create')" :active="request()->routeIs('posts.create')">
                        <i class="fas fa-plus mr-1"></i>
                        {{ __('Créer un article') }}
                    </x-nav-link>
                    <x-nav-link
                        class="inline-flex items-center px-3 py-1 text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150"
                        :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                        <i class="fa-solid fa-gears mr-1"></i>
                        {{ __('Tableau de bord') }}
                    </x-nav-link>
                @else
                    <x-nav-link :href="route('register')">
                        <i class="mr-1.5 fa-solid fa-user-plus"></i>
                        {{ __('S\'inscrire') }}
                    </x-nav-link>
                    <x-nav-link class="ml-2" :href="route('login')">
                        <i class="mr-1.5 fa-solid fa-sign-in"></i>
                        {{ __('Se connecter ') }}
                    </x-nav-link>
                @endif
            </div>
        </div>
    </div>
</nav>
