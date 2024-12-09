<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ $post->title }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl lg:px-8 sm:px-6">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="mb-4 text-3xl font-bold">{{ $post->title }}</h1>
                    <p class="mb-4 text-gray-600">By {{ $post->user->name }} on {{ $post->published_at }}</p>
                    <div class="mb-6 prose max-w-none">{!! nl2br(e($post->content)) !!}</div>
                    <div class="mt-8">@livewire('comment-section', ['post' => $post])</div>
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach($post->tags as $tag)
                        <span class="bg-blue-100 text-blue-800 rounded px-2.5 py-0.5 text-xs font-semibold">{{
                            $tag->name }}</span>
                        @endforeach
                    </div>
                    @can('update', $post)
                    <a href="{{ route('posts.edit', $post) }}"
                        class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Edit Post</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
