<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-[#FFF0DC] via-[#F0BB78] to-[#543A14] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto my-10 p-8 rounded-3xl shadow-2xl bg-gradient-to-tr from-[#FFF0DC]/90 via-[#F0BB78]/80 to-[#543A14]/80 border border-[#F0BB78] backdrop-blur-md relative overflow-hidden scifi-glow">
                <div class="absolute inset-0 pointer-events-none z-0">
                    <div class="absolute -top-10 -left-10 w-40 h-40 bg-[#F0BB78]/30 rounded-full blur-2xl animate-pulse"></div>
                    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-[#543A14]/30 rounded-full blur-2xl animate-pulse"></div>
                </div>
                @if (session('success'))
                    <div id="success-alert" role="alert" class="flex items-center gap-3 justify-center mb-6 px-6 py-4 rounded-xl bg-gradient-to-r from-[#F0BB78] to-[#543A14] text-[#131010] shadow-lg border border-[#F0BB78] animate-fade-in z-10 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 shrink-0 stroke-current text-[#543A14] animate-bounce" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-semibold tracking-wide">{{ session('success') }}</span>
                    </div>
                @endif
                <h2 class="text-3xl font-extrabold mb-8 text-center text-transparent bg-clip-text bg-gradient-to-r from-[#543A14] to-[#F0BB78] tracking-widest drop-shadow-lg animate-glow">Langganan Aktif</h2>

                @if($subscription)
                <div class="space-y-3 text-[#131010] z-10 relative">
                    <p><span class="font-bold text-[#543A14]">Paket:</span> <span class="scifi-chip">{{ $subscription->subscriptionPlan->name }}</span></p>
                    <p><span class="font-bold text-[#543A14]">Jenis Makan:</span> <span class="scifi-chip">{{ implode(', ', json_decode($subscription->meal_types, true)) }}</span></p>
                    <p><span class="font-bold text-[#543A14]">Hari Pengiriman:</span> <span class="scifi-chip">{{ implode(', ', json_decode($subscription->delivery_days, true)) }}</span></p>
                    <p><span class="font-bold text-[#543A14]">Harga Total:</span> <span class="scifi-chip">Rp {{ number_format($subscription->total_price, 0, ',', '.') }}</span></p>
                    @if($subscription->is_cancelled)
                        <p class="text-[#F87171] font-bold animate-pulse">Status: Dibatalkan</p>
                    @elseif($subscription->is_paused)
                        <p class="text-[#FBBF24] font-bold animate-pulse">Status: Sedang Pause ({{ $subscription->pause_start }} - {{ $subscription->pause_end }})</p>
                    @else
                        <p class="text-[#22C55E] font-bold animate-pulse">Status: Aktif</p>
                    @endif
                </div>

                <div class="mt-8 flex flex-col md:flex-row gap-4 z-10 relative">
                    <!-- Pause Langganan -->
                    <form action="{{ route('subscription.pause') }}" method="POST" class="flex gap-2 items-center bg-[#FFF0DC]/60 rounded-xl px-4 py-3 shadow-inner border border-[#F0BB78]/40 hover:shadow-[#F0BB78]/40 transition-all duration-300">
                        @csrf
                        <input type="date" name="pause_start" required class="border border-[#F0BB78]/40 bg-[#F0BB78]/30 text-[#543A14] p-2 rounded focus:ring-2 focus:ring-[#F0BB78] transition" />
                        <input type="date" name="pause_end" required class="border border-[#F0BB78]/40 bg-[#F0BB78]/30 text-[#543A14] p-2 rounded focus:ring-2 focus:ring-[#F0BB78] transition" />
                        <button type="submit" class="px-4 py-2 bg-gradient-to-r from-[#FBBF24] to-[#F0BB78] text-[#543A14] font-bold rounded shadow hover:scale-105 transition-all duration-200 animate-glow-btn">Pause</button>
                    </form>

                    <!-- Batalkan Langganan -->
                    <form action="{{ route('subscription.cancel') }}" method="POST" class="bg-[#FFF0DC]/60 rounded-xl px-4 py-3 shadow-inner border border-[#F87171]/40 hover:shadow-[#F87171]/40 transition-all duration-300">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-gradient-to-r from-[#F87171] to-[#FBBF24] text-white font-bold rounded shadow hover:scale-105 transition-all duration-200 animate-glow-btn">Batalkan Langganan</button>
                    </form>
                </div>
                @else
                <p class="text-center text-[#543A14] mt-8">Kamu belum memiliki langganan aktif.</p>
                @endif
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
