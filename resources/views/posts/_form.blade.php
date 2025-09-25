@csrf
<div class="mb-3">
    <input type="text" name="title" 
           value="{{ old('title', $post->title ?? '') }}"
           placeholder="Judul Post" 
           class="w-full border rounded px-3 py-2">
</div>

<div class="mb-3">
    <textarea name="content" 
              placeholder="Isi diskusi..." 
              class="w-full border rounded px-3 py-2 h-40">{{ old('content', $post->content ?? '') }}</textarea>
</div>

<button type="submit" 
        class="px-4 py-2 bg-green-600 text-white rounded-full">
    Simpan
</button>

<a href="{{ route('posts.index') }}" 
   class="px-4 py-2 bg-gray-500 text-white rounded-full">
    Batal
</a>
