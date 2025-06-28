<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto my-10 p-6 bg-white rounded-xl shadow">
                @if (session('success'))
                    <div id="success-alert" role="alert" class="alert alert-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>  {{ session('success') }} </span>
                    </div>
                @endif
                <h2 class="text-2xl font-bold mb-6 text-center">Langganan Aktif</h2>

                @if($subscription)
                <div class="space-y-2">
                    <p><strong>Paket:</strong> {{ $subscription->subscriptionPlan->name }}</p>
                    <p><strong>Jenis Makan:</strong> {{ implode(', ', json_decode($subscription->meal_types, true)) }}</p>
                    <p><strong>Hari Pengiriman:</strong> {{ implode(', ', json_decode($subscription->delivery_days, true)) }}</p>
                    <p><strong>Harga Total:</strong> Rp {{ number_format($subscription->total_price, 0, ',', '.') }}</p>                 
                        @if($subscription->is_cancelled)
                            <p class="text-red-500 font-semibold">Status: Dibatalkan</p>
                        @elseif($subscription->is_paused)
                            <p class="text-yellow-600 font-semibold">Status: Sedang Pause ({{ $subscription->pause_start }} - {{ $subscription->pause_end }})</p>
                        @else
                            <p class="text-green-600 font-semibold">Status: Aktif</p>
                        @endif
                </div>

                <div class="mt-6 flex gap-4">
                    <!-- Pause Langganan -->
                    <form action="{{ route('subscription.pause') }}" method="POST" class="flex gap-2 items-center">
                        @csrf
                        <input type="date" name="pause_start" required class="border p-2 rounded" />
                        <input type="date" name="pause_end" required class="border p-2 rounded" />
                        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded">Pause</button>
                    </form>

                    <!-- Batalkan Langganan -->
                    <form action="{{ route('subscription.cancel') }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">Batalkan</button>
                    </form>
                </div>
                @else
                <p class="text-center text-gray-500">Kamu belum memiliki langganan aktif.</p>
                @endif
            </div>
            </div>

        </div>
    </div>
<script>
    setTimeout(function () {
           let alert = document.getElementById('success-alert');
           if (alert) {
               alert.remove(); // atau gunakan alert.classList.add('hidden');
           }
       }, 3000); 
</script>

</x-app-layout>
