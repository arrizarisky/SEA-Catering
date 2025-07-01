<x-app-layout>
        <x-slot name="header">
            <h1 class="text-xl font-semibold text-gray-800 leading-tight">
                {{ __('Edit Kategori') }}
            </h1>
        </x-slot>
        
    <div class="max-w-xl mx-auto mt-12 p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-4 text-[#543A14]">Edit Kategori</h2>
    
        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nama Kategori</label>
                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#543A14]">
            </div>
    
            <div class="flex justify-end">
                <a href="{{ route('admin.categories.index') }}" class="mr-4 text-gray-600 hover:underline">Batal</a>
                <button type="submit"
                        class="px-6 py-2 bg-[#543A14] text-white rounded hover:bg-[#3c2810] transition">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
