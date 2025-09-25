<x-app-layout>
    <h2 class="text-xl font-bold mb-4 text-center">
        {{ isset($post) ? 'Edit Post' : 'Buat Post Baru' }}
    </h2>

    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow">
        <form action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}" method="POST">
            @csrf
            @if(isset($post))
                @method('PUT')
            @endif

            <div class="mb-3">
                <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}"
                       placeholder="Judul"
                       class="w-full border rounded px-3 py-2 focus:ring focus:ring-gray-300">
            </div>

            <div class="mb-3">
                <textarea name="content" placeholder="Isi"
                          class="w-full border rounded px-3 py-2 focus:ring focus:ring-gray-300">{{ old('content', $post->content ?? '') }}</textarea>
            </div>

            <div class="flex space-x-2">
                <button type="submit" 
                        class="px-4 py-2 bg-green-600 text-white rounded-full shadow-md hover:bg-green-700 transition">
                    Simpan
                </button>

                <a href="{{ route('posts.index') }}" 
                   class="px-4 py-2 bg-gray-500 text-white rounded-full shadow-md hover:bg-gray-700 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
