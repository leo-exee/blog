<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Votre tableau de bord') }}
        </h2>
    </x-slot>

    <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-4 w-1/3">
            <div class="space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')

                        <form class="mt-4" method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-danger-button :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Me déconnecter') }} <i class="fas fa-sign-out-alt ml-1"></i>
                            </x-danger-button>
                        </form>
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>

        @include('posts/list')
    </div>
</x-app-layout>
