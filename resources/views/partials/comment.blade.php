<div class="comment mb-4" id="comment-{{ $comment->id }}">
    <div class="flex items-start gap-3">
        <img
    src="{{ $comment->avatar
        ? asset('storage/' . $comment->avatar)
        : 'https://ui-avatars.com/api/?name=' . urlencode($comment->name) }}"
    class="w-10 h-10 rounded-full object-cover border border-zinc-700">

        <div class="flex-1">
            <div class="bg-zinc-800 p-3 rounded-lg">
                <strong>{{ $comment->name }}</strong>
                <p class="text-sm text-white">{{ $comment->message }}</p>
            </div>

            <div class="flex items-center gap-3 text-sm mt-1">
                <button class="like-btn text-blue-600 hover:text-blue-400 transition-colors" data-id="{{ $comment->id }}">
                    👍 <span class="like-count">{{ $comment->reactions->where('reaction', 'like')->count() }}</span>
                </button>

                <button class="reply-btn text-gray-600 hover:text-gray-400 transition-colors" data-id="{{ $comment->id }}">
                    Balas
                </button>
            </div>

            {{-- FORM BALAS --}}
            <form class="reply-form hidden mt-3 ml-6 space-y-2" data-parent="{{ $comment->id }}">
                @csrf
                <input type="hidden" name="parent_id" value="{{ $comment->id }}">

                <input type="text" name="name" placeholder="Nama"
                       class="border p-2 w-full rounded text-black" required>

                <textarea name="message" placeholder="Balasan..."
                          class="border p-2 w-full rounded text-black" required></textarea>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded transition-colors">
                    Kirim
                </button>
            </form>

            {{-- BALASAN --}}
            <div class="ml-6 mt-3 space-y-3">
                @foreach ($comment->replies as $reply)
                    @include('partials.comment', ['comment' => $reply])
                @endforeach
            </div>
        </div>
    </div>
</div>