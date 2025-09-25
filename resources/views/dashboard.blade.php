<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <h1 class="text-xl font-bold">Halo, {{ Auth::user()->name }}</h1>
                <p class="mt-2">Role: <strong>{{ Auth::user()->role }}</strong></p>
                <p class="mt-4 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </p>

                <div class="mt-6 flex justify-center">
                    <a href="{{ route('posts.index') }}" 
                       class="px-6 py-2 bg-gray-500 text-white font-semibold rounded-full shadow-md hover:bg-gray-700 transition">
                        Masuk ke Forum
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
