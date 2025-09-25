<x-app-layout>
    <h2 class="text-xl font-bold mb-4 text-center">Forum Diskusi</h2>

    <div class="text-center mb-4">
        <a href="{{ route('posts.create') }}" 
           class="px-4 py-2 bg-gray-500 text-white rounded-full">
            Buat Post
        </a>
    </div>

    <div class="max-w-md mx-auto space-y-4">
        @foreach ($posts as $post)
            <div class="p-4 border rounded bg-white">
                <h3 class="font-bold">{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>
                <small>By: {{ $post->user->name }}</small>

                <div class="mt-2 space-x-2">
                    @can('update', $post)
                        <a href="{{ route('posts.edit', $post) }}" 
                           class="px-3 py-1 bg-gray-500 text-white rounded-full">
                            Edit
                        </a>
                    @endcan

                    @can('delete', $post)
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" 
                                    class="px-3 py-1 bg-red-600 text-white rounded-full">
                                Delete
                            </button>
                        </form>
                    @endcan
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
