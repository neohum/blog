<div>
    <h3 class="mb-4 text-2xl font-bold">Comments</h3>

    @foreach($post->comments as $comment)
    <div class="p-4 mb-4 bg-gray-100 rounded-lg">
        <p class="text-gray-800">{{ $comment->content }}</p>
        <p class="mt-2 text-sm text-gray-600">
            By {{ $comment->user->name }} on {{ $comment->created_at }} @if($comment->user_id ===
            auth()->id()) |
            <button wire:click="deleteComment({{ $comment->id }})" class="text-red-500 hover:underline">
                Delete
            </button>
            @endif
        </p>
    </div>
    @endforeach @auth
    <form wire:submit.prevent="addComment" class="mt-6">
        <div class="mb-4">
            <label for="newComment" class="block mb-2 font-bold text-gray-700">Add a comment</label>
            <textarea wire:model="newComment" id="newComment" rows="3"
                class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" required></textarea>
            @error('newComment') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
            Post Comment
        </button>
    </form>
    @else
    <p class="mt-6 text-gray-600">
        Please <a href="{{ route('login') }}" class="text-blue-500 hover:underline">log in</a> to leave
        a comment.
    </p>
    @endauth
</div>
