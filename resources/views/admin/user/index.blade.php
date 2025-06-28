<table class="table-auto w-full border">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Nomor HP</th>
            <th>Paket</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone_number }}</td>
            <td>{{ optional($user->activeSubscription->subscriptionPlan)->name ?? '-' }}</td>
            <td>Rp{{ number_format(optional($user->activeSubscription)->total_price ?? 0) }}</td>
            <td>
                @if ($user->is_active)
                    <span class="text-green-600 font-semibold">Aktif</span>
                @else
                    <span class="text-red-600 font-semibold">Nonaktif</span>
                @endif
            </td>
            <td>
                <form action="{{ route('admin.user.toggle', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="px-4 py-2 bg-indigo-600 text-white rounded">
                        {{ $user->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
