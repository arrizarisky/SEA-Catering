<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Menu') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold text-[#543A14] mb-6">Edit Menu Makanan</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Nama Menu --}}
            <div class="mb-4">
                <label for="name" class="block font-medium text-gray-700">Nama Menu</label>
                <input type="text" name="name" id="name" value="{{ old('name', $menu->name) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-[#543A14]">
            </div>

            {{-- Deskripsi --}}
            <div class="mb-4">
                <label for="description" class="block font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="4" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-[#543A14]">{{ old('description', $menu->description) }}</textarea>
            </div>

            {{-- Harga --}}
            <div class="mb-4">
                <label for="price" class="block font-medium text-gray-700">Harga</label>
                <input type="number" name="price" id="price" value="{{ old('price', $menu->price) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-[#543A14]">
            </div>

            {{-- Kategori --}}
            <div class="mb-4">
                <label for="category_id" class="block font-medium text-gray-700">Kategori</label>
                <select name="category_id" id="category_id" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-[#543A14]">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $menu->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Gambar --}}
            <div class="mb-4">
                <label class="block font-medium text-gray-700">Gambar Saat Ini</label>
                @if ($menu->image)
                    <img src="{{ asset('storage/' . $menu->image) }}" alt="Gambar Menu" class="w-32 h-32 object-cover mb-2">
                @else
                    <p class="text-gray-500 italic">Tidak ada gambar</p>
                @endif

                <label for="image" class="block font-medium text-gray-700 mt-2">Upload Gambar Baru (opsional)</label>
                <input type="file" name="image" id="image"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md file:bg-[#543A14] file:text-white">
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end">
                <a href="{{ route('admin.menus.index') }}" class="text-gray-600 hover:underline mr-4">Batal</a>
                <button type="submit"
                    class="bg-[#543A14] text-white px-6 py-2 rounded hover:bg-[#3c2810] transition">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</x-app-layout>