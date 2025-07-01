<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 ">
        <form method="GET" class="mb-6 flex gap-4">
            <input type="date" name="start_date" value="{{ request('start_date', $start->toDateString()) }}" class="rounded-lg border px-4 py-2">
            <input type="date" name="end_date" value="{{ request('end_date', $end->toDateString()) }}" class="rounded-lg border px-4 py-2">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg">Filter</button>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-[#F0BB78] p-6 rounded-xl shadow-md">
                <p class="text-sm text-gray-500">Langganan Baru</p>
                <h2 class="text-3xl font-bold">{{ $langgananBaru }}</h2>
            </div>
            <div class="bg-[#F0BB78] p-6 rounded-xl shadow-md">
                <p class="text-sm text-gray-500">MRR (Pendapatan Bulanan)</p>
                <h2 class="text-3xl font-bold">Rp {{ number_format($mrr, 0, ',', '.') }}</h2>
            </div>
            <div class="bg-[#F0BB78] p-6 rounded-xl shadow-md">
                <p class="text-sm text-gray-500">Langganan Aktif</p>
                <h2 class="text-3xl font-bold">{{ $aktif }}</h2>
            </div>
        </div>

        <div class="mt-10 text-white">
            <canvas id="growthChart" height="100"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const ctx = document.getElementById('growthChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($growth->pluck('date')) !!},
            datasets: [{
                label: 'Pertumbuhan Langganan',
                data: {!! json_encode($growth->pluck('total')) !!},
                backgroundColor: 'rgb(240, 187, 120)',
                borderColor: 'rgb(240, 187, 120)',
                pointBackgroundColor: 'rgba(147, 51, 234, 1)',
                borderWidth: 2,
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
    </script>
</x-app-layout>
