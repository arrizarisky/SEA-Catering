<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelola Kategori') }}
        </h2>
    </x-slot>
    
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Kelola Kategori</h2>

        <a href="{{ route('admin.categories.create') }}" class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block">
            + Tambah Kategori
        </a>

        @if(session('success'))
            <div class="text-green-600 mb-4">{{ session('success') }}</div>
        @endif

        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 text-left">Nama Kategori</th>
                    <th class="p-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr class="border-t">
                        <td class="p-2">{{ $category->name }}</td>
                        <td class="p-2">
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="2" class="p-2 text-center">Belum ada kategori.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>