@extends('layouts.public')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-[#F0BB78] via-[#FFF0DC] to-[#F0BB78] py-20 px-4 md:px-20 flex items-center justify-center font-playFair">
    <div class="max-w-3xl w-full mx-auto bg-white/90 shadow-2xl rounded-[2.5rem] p-10 border border-[#F0BB78] relative overflow-hidden">
        <!-- Ornamen klasik -->
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-[#F0BB78]/30 rounded-full blur-2xl z-0"></div>
        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-[#543A14]/20 rounded-full blur-2xl z-0"></div>
        <div class="absolute inset-0 pointer-events-none z-0">
            <svg class="absolute left-0 top-0 w-32 h-32 opacity-20" viewBox="0 0 100 100" fill="none">
                <ellipse cx="50" cy="50" rx="48" ry="48" stroke="#543A14" stroke-width="2" />
            </svg>
            <svg class="absolute right-0 bottom-0 w-32 h-32 opacity-10" viewBox="0 0 100 100" fill="none">
                <ellipse cx="50" cy="50" rx="48" ry="48" stroke="#F0BB78" stroke-width="2" />
            </svg>
        </div>
        <!-- End ornamen -->

        <h2 class="text-3xl md:text-4xl font-extrabold text-center mb-6 text-transparent bg-clip-text bg-gradient-to-r from-[#543A14] to-[#8F29CC] drop-shadow-lg tracking-wider z-10 relative">
            Konfirmasi Pembayaran
        </h2>
        <p class="text-center text-[#543A14] mb-8 italic z-10 relative">
            Silakan periksa detail langganan Anda sebelum melanjutkan pembayaran.
        </p>

        <div class="bg-[#FFF0DC]/90 rounded-2xl p-8 mb-8 space-y-4 border border-[#F0BB78] shadow-inner z-10 relative">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-2">
                <p><span class="font-semibold text-[#543A14]">Nama Lengkap:</span> {{ $data['full_name'] }}</p>
                <p><span class="font-semibold text-[#543A14]">Nomor HP:</span> {{ $data['phone_number'] }}</p>
                <p><span class="font-semibold text-[#543A14]">Alamat:</span> {{ $data['address'] ?? '-' }}</p>
                <p><span class="font-semibold text-[#543A14]">Paket:</span> {{ $plan->name }} - Rp {{ number_format($plan->price, 0, ',', '.') }}</p>
                <p><span class="font-semibold text-[#543A14]">Jenis Makan:</span> {{ implode(', ', $data['meal_types']) }}</p>
                <p><span class="font-semibold text-[#543A14]">Hari Pengiriman:</span> {{ implode(', ', $data['delivery_days']) }}</p>
                <p><span class="font-semibold text-[#543A14]">Alergi:</span> {{ $data['allergies'] ?? '-' }}</p>
                <p><span class="font-semibold text-[#543A14]">Catatan:</span> {{ $data['notes'] ?? '-' }}</p>
                <p><span class="font-semibold text-[#543A14]">Metode Pembayaran:</span> {{ ucfirst($data['payment_method']) }}</p>
            </div>
            <hr class="my-4 border-[#F0BB78]">
            <p class="text-2xl font-extrabold text-[#8F29CC] text-center">Total Harga: <span class="text-[#543A14]">Rp {{ number_format($data['total_price'], 0, ',', '.') }}</span></p>
        </div>

        <form action="{{ route('subscriptions.confirm') }}" method="POST" class="text-center z-10 relative">
            @csrf
            <button type="submit" class="bg-gradient-to-r from-[#543A14] to-[#8F29CC] hover:from-[#8F29CC] hover:to-[#543A14] text-white px-8 py-3 rounded-2xl font-bold text-lg shadow-lg transition-all duration-200 hover:scale-105 border-2 border-[#F0BB78]">
                Konfirmasi & Bayar Sekarang
            </button>
        </form>
    </div>
</section>
@endsection

<style>
.font-playFair {
    font-family: 'Playfair Display', serif;
}
</style>