<div>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label for="title" class="block mb-2 font-bold text-gray-700">Title</label>
            <input wire:model="title" type="text" id="title"
                class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" required />
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block mb-2 font-bold text-gray-700">Content</label>
            <textarea wire:model="content" id="content" rows="6"
                class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" required></textarea>
            @error('content') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-bold text-gray-700">Tags</label>
            <div class="flex flex-wrap gap-2">
                @foreach($allTags as $tag)
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model="selectedTags" value="{{ $tag->id }}"
                        class="w-5 h-5 text-blue-600 form-checkbox" />
                    <span class="ml-2 text-gray-700">{{ $tag->name }}</span>
                </label>
                @endforeach
            </div>
        </div>

        <div>
            <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                {{ $post ? 'Update Post' : 'Create Post' }}
            </button>
        </div>
    </form>
</div>
