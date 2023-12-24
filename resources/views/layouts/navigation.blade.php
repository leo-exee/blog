<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('index') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                {{-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div> --}}
            </div>

            <!-- Settings Dropdown -->
            @if (Auth::check())
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-nav-link
                        class="inline-flex items-center px-3 py-1 text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150"
                        :href="route('posts.create')" :active="request()->routeIs('posts.create')">
                        {{ __('Créer un article') }}
                        <i class="fas fa-plus ml-1"></i>
                    </x-nav-link>
                    <x-nav-link
                        class="inline-flex items-center px-3 py-1 text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150"
                        :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                        {{ __('Tableau de bord') }}
                        <i class="fa-solid fa-table-cells-large ml-1"></i>
                    </x-nav-link>
                    @if (Auth::user()->role == 'admin')
                        <x-nav-link
                            class="inline-flex items-center px-3 py-1 text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150"
                            :href="route('categories.index')" :active="request()->routeIs('categories.index')">
                            {{ __('Catégories') }}
                            <i class="fa-solid fa-list ml-1"></i>
                        </x-nav-link>
                        <x-nav-link
                            class="inline-flex items-center px-3 py-1 text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150"
                            :href="route('tags.index')" :active="request()->routeIs('tags.index')">
                            {{ __('Tags') }}
                            <i class="fa-solid fa-tag ml-1"></i>
                        </x-nav-link>
                    @endif
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }} <i class="fa-solid fa-circle-user"></i></div>

                                <div class="ms-1">
                                    @include('components/application-logo')
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Me déconnecter') }} <i class="fas fa-sign-out-alt"></i>
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-nav-link :href="route('register')">
                        {{ __('S\'inscrire') }}
                    </x-nav-link>
                    <x-nav-link class="ml-2" :href="route('login')">
                        {{ __('Se connecter ') }}
                    </x-nav-link>
                </div>
            @endif
            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">

        <!-- Responsive Settings Options -->
        @if (Auth::check())
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profil') }}
                    </x-responsive-nav-link>

                    <x-dropdown-link :href="route('posts.index')">
                        {{ __('Mes articles') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Se déconnecter') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endif
    </div>
</nav>
