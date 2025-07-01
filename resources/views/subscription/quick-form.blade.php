@extends('layouts.public')
@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#F0BB78] via-[#FFF0DC] to-[#F0BB78] py-12 px-4 font-playFair">
    <form action="{{ route('subscriptions.quick-buy') }}" method="POST" class="bg-white/90 shadow-2xl rounded-3xl p-8 w-full max-w-lg border border-[#F0BB78] relative">
        <h2 class="text-2xl md:text-3xl font-extrabold text-center mb-6 text-transparent bg-clip-text bg-gradient-to-r from-[#543A14] to-[#8F29CC] drop-shadow-lg tracking-wider">
            Pesan Cepat Langganan
        </h2>
        @csrf
        <input type="hidden" name="plan_id" value="{{ $plan->id }}">

        <div class="mb-4">
            <label class="block font-semibold text-[#543A14] mb-1" for="full_name">Nama Lengkap</label>
            <input type="text" name="full_name" id="full_name" value="{{ $defaults['full_name'] }}" class="w-full border border-[#F0BB78] px-3 py-2 rounded-xl focus:ring-2 focus:ring-[#8F29CC] focus:outline-none" required>
        </div>
        <div class="mb-4">
            <label class="block font-semibold text-[#543A14] mb-1" for="phone_number">Nomor HP</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ $defaults['phone_number'] }}" class="w-full border border-[#F0BB78] px-3 py-2 rounded-xl focus:ring-2 focus:ring-[#8F29CC] focus:outline-none" required>
        </div>

        <div class="mb-4">
            <div class="font-semibold text-[#543A14] mb-1">Jenis Makan</div>
            <div class="flex flex-wrap gap-3">
                @foreach(['Sarapan','Makan Siang','Makan Malam'] as $meal)
                <label class="flex items-center gap-2 bg-[#FFF0DC] px-3 py-1 rounded-lg border border-[#F0BB78] cursor-pointer">
                    <input type="checkbox" name="meal_types[]" value="{{ $meal }}" {{ in_array($meal, $defaults['meal_types']) ? 'checked' : '' }} class="accent-[#8F29CC]">
                    <span>{{ $meal }}</span>
                </label>
                @endforeach
            </div>
        </div>

        <div class="mb-4">
            <div class="font-semibold text-[#543A14] mb-1">Hari Pengiriman</div>
            <div class="flex flex-wrap gap-2">
                @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $day)
                <label class="flex items-center gap-2 bg-[#FFF0DC] px-3 py-1 rounded-lg border border-[#F0BB78] cursor-pointer">
                    <input type="checkbox" name="delivery_days[]" value="{{ $day }}" {{ in_array($day, $defaults['delivery_days']) ? 'checked' : '' }} class="accent-[#8F29CC]">
                    <span>{{ $day }}</span>
                </label>
                @endforeach
            </div>
        </div>

        <div class="mb-6">
            <label class="block font-semibold text-[#543A14] mb-1" for="payment_method">Metode Pembayaran</label>
            <select name="payment_method" id="payment_method" class="w-full border border-[#F0BB78] px-3 py-2 rounded-xl focus:ring-2 focus:ring-[#8F29CC] focus:outline-none">
                <option value="transfer" {{ $defaults['payment_method'] == 'transfer' ? 'selected' : '' }}>Transfer</option>
                <option value="ewallet" {{ $defaults['payment_method'] == 'ewallet' ? 'selected' : '' }}>E-wallet</option>
                <option value="cash" {{ $defaults['payment_method'] == 'cash' ? 'selected' : '' }}>Cash</option>
            </select>
        </div>

        <button type="submit" class="w-full bg-gradient-to-r from-[#543A14] to-[#8F29CC] hover:from-[#8F29CC] hover:to-[#543A14] text-white px-6 py-3 rounded-xl font-bold text-lg shadow-lg transition-all duration-200 hover:scale-105 border-2 border-[#F0BB78]">
            Lanjut Bayar
        </button>
    </form>
</div>
@endsection

<style>
.font-playFair {
    font-family: 'Playfair Display', serif;
}
</style>