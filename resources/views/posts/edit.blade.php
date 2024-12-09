<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ __('Edit Post') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl lg:px-8 sm:px-6">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @livewire('post-form', ['post' => $post])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
