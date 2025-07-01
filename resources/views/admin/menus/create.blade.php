<x-app-layout>
  
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tambah Menu Baru') }}
            </h2>
        </x-slot>
   
    <div class="max-w-xl mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-4">Tambah Menu Baru</h2>
        <form action="{{ route('admin.menus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block font-medium">Nama Menu</label>
                <input type="text" name="name" id="name" class="w-full border px-3 py-2 rounded" required>
            </div>
    
            <div class="mb-4">
                <label for="description" class="block font-medium">Deskripsi</label>
                <textarea name="description" id="description" class="w-full border px-3 py-2 rounded" required></textarea>
            </div>
    
            <div class="mb-4">
                <label for="price" class="block font-medium">Harga</label>
                <input type="number" name="price" id="price" class="w-full border px-3 py-2 rounded" required>
            </div>
    
            <div class="mb-4">
                <label for="category_id" class="block font-medium">Kategori</label>
                <select name="category_id" id="category_id" class="w-full border px-3 py-2 rounded" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-4">
                <label for="image" class="block font-medium">Gambar (opsional)</label>
                <input type="file" name="image" id="image" class="w-full border px-3 py-2 rounded">
            </div>
    
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Simpan</button>
        </form>
    </div>
</x-app-layout>
