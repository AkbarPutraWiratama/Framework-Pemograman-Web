<x-app-layout>
    <h2 class="text-xl font-bold mb-6 text-center">
        {{ isset($post) ? 'Edit Post' : 'Buat Post Baru' }}
    </h2>

    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <form action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}" method="POST">
            @csrf
            @if(isset($post))
                @method('PUT')
            @endif

            {{-- Input Judul --}}
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Judul</label>
                <input type="text" id="title" name="title"
                       value="{{ old('title', $post->title ?? '') }}"
                       placeholder="Masukkan judul post"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
            </div>

            {{-- Input Isi --}}
            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-semibold mb-2">Isi</label>
                <textarea id="content" name="content" rows="5"
                          placeholder="Tulis isi post di sini..."
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">{{ old('content', $post->content ?? '') }}</textarea>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-center space-x-3 mt-6">
                <button type="submit"
                        class="px-5 py-2 bg-green-600 text-white rounded-full shadow hover:bg-green-700 transition duration-200">
                    Simpan
                </button>
                <a href="{{ route('posts.index') }}"
                   class="px-5 py-2 bg-gray-500 text-white rounded-full shadow hover:bg-gray-700 transition duration-200">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
