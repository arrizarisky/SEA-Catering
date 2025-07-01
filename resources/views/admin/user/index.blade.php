<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">Nomor HP</th>
                            <th class="px-6 py-3">Paket</th>
                            <th class="px-6 py-3">Harga</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="row-checkbox" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ optional($user->activeSubscription)->phone_number ?? '-' }}
                            </td>
                            <td class="px-6 py-4">
                                {{  optional(optional($user->activeSubscription)->subscriptionPlan)->name ?? '-' }}
                            </td>
                            <td class="px-6 py-4">
                                Rp{{ number_format(optional($user->activeSubscription)->total_price ?? 0) }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($user->is_active)
                                    <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded">Aktif</span>
                                @else
                                    <span class="px-2 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded">Nonaktif</span>
                                @endif
                            </td>
                            <td class="flex items-center px-6 py-4 space-x-2">
                                <form action="{{ route('admin.user.toggle', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                                        {{ $user->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <div class="w-full h-full flex justify-end items-center space-x-2 p-4">
                            @if ($user->activeSubscription && $user->activeSubscription->is_paused)
                                <form action="{{ route('admin.subscription.activate', $user->activeSubscription->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="px-3 py-1 bg-green-600 text-white text-sm rounded hover:bg-green-700">Aktifkan Ulang</button>
                                </form>
                            @endif
                        </div>

                    </tbody>
                </table>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const checkAll = document.getElementById('checkbox-all-search');
                        const checkboxes = document.querySelectorAll('#row-checkbox');

                        checkAll.addEventListener('change', function () {
                            checkboxes.forEach(cb => cb.checked = checkAll.checked);
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</x-app-layout>