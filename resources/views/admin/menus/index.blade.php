<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu Management') }}
        </h2>
    </x-slot>

    <div class="p-6">
    <h2 class="text-xl font-bold mb-4">Manajemen Menu Makanan</h2>

    <a href="{{ route('admin.menus.create') }}" class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block">
        + Tambah Menu
    </a>

    @if(session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <table class="w-full table-auto border">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2">Gambar</th>
                <th class="p-2">Nama</th>
                <th class="p-2">Deskripsi</th>
                <th class="p-2">Kategori</th>
                <th class="p-2">Harga</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($menus as $menu)
            <tr class="border-t">
                <td class="p-2">
                    @if($menu->image)
                        <img src="{{ asset('storage/' . $menu->image) }}" class="w-16 h-16 object-cover">
                    @else
                        <span class="text-gray-500">-</span>
                    @endif
                </td>
                <td class="p-2">{{ $menu->name }}</td>
                <td class="p-2">{{ Str::limit($menu->description, 40) }}</td>
                <td class="p-2">{{ $menu->category->name }}</td>
                <td class="p-2">Rp{{ number_format($menu->price, 0, ',', '.') }}</td>
                <td class="p-2">
                    <a href="{{ route('admin.menus.edit', $menu->id) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline ml-2">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="p-4 text-center">Belum ada menu.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>