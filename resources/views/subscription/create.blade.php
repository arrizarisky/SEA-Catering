@extends('layouts.public')
@section('content')
<section class="h-full w-full bg-[#F0BB78] px-4 md:px-20 flex flex-col items-center py-32">
    <div class="px-6 md:px-20 py-10 bg-[#FFF0DC] text-[#131010] rounded-3xl font-playFair">
        <h2 class="text-3xl md:text-4xl font-bold mb-6 text-center">Form Langganan Makanan Sehat</h2>
        <p class="text-center max-w-2xl mx-auto mb-10 text-[#543A14]">Isi form berikut untuk mulai berlangganan makanan sehat dari SEA Catering. Pilih paket, jadwal pengiriman, dan sesuaikan dengan kebutuhan kamu.</p>

        <form action="#" method="POST" class="max-w-3xl mx-auto bg-white shadow-lg p-8 rounded-xl space-y-6">
            @csrf
            {{-- Nama --}}
            <div>
                <label class="block font-semibold mb-2">Nama Lengkap</label>
                <input type="text" name="full_name" placeholder="Nama Anda" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#B13BFF] focus:outline-none">
            </div>

            {{-- No HP --}}
            <div>
                <label class="block font-semibold mb-2">Nomor HP</label>
                <input type="tel" name="phone_number" placeholder="08xxxxxxxx" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#B13BFF] focus:outline-none">
            </div>

            {{-- Alat Pengiriman --}}
            <div>
                <label class="block font-semibold mb-2">Alamat Pengiriman</label>
                <textarea name="address" rows="3" placeholder="Alamat lengkap pengiriman" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#B13BFF] focus:outline-none"></textarea>
            </div>

            {{-- Pilih Paket --}}
            <div>
                <label class="block font-semibold mb-2">Pilih Paket Langganan</label>
                <select name="plan_id" class="w-full px-4 py-2 border border-gray-300 rounded-xl">
                    <option value="">-- Pilih Paket --</option>
                    <option value="Diet Plan">Diet Plan - Rp 30.000</option>
                    <option value="Protein Plan">Protein Plan - Rp 40.000</option>
                    <option value="Royal Plan">Royal Plan - Rp 60.000</option>
                </select>
            </div>

            {{-- Jenis Makan --}}
            <div>
                <label class="block font-semibold mb-2">Jenis Makan yang Diinginkan</label>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach(['Sarapan', 'Makan Siang', 'Makan Malam'] as $makan)
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="meal_types[]" value="{{ $makan }}" class="form-checkbox h-5 w-5 text-[#B13BFF]">
                        <span>{{ $makan }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- Hari Pengiriman --}}
            <div>
                <label class="block font-semibold mb-2">Hari Pengiriman</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="delivery_days[]" value="{{ $hari }}" class="form-checkbox h-5 w-5 text-[#B13BFF]">
                        <span>{{ $hari }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- Alergi --}}
            <div>
                <label class="block font-semibold mb-2">Alergi (Opsional)</label>
                <input type="text" name="allergies" placeholder="Misal: Udang, Kacang" class="w-full px-4 py-2 border border-gray-300 rounded-xl">
            </div>

            {{-- Payment Method --}}
             <div>
                <label class="block font-semibold mb-2">Metode Pembayaran</label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <label class="inline-flex items-center space-x-2">
                        <input type="radio" name="payment_method" value="transfer" class="form-radio h-5 w-5 text-[#B13BFF]">
                        <span>Transfer Bank</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="radio" name="payment_method" value="ewallet" class="form-radio h-5 w-5 text-[#B13BFF]">
                        <span>E-Wallet (OVO, Gopay, DANA)</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="radio" name="payment_method" value="cod" class="form-radio h-5 w-5 text-[#B13BFF]">
                        <span>Bayar di Tempat (COD)</span>
                    </label>
                </div>
            </div>

            {{-- Submit --}}
            @auth
            <button type="button" onclick="document.getElementById('loginModal').classList.remove('hidden')" class="px-6 py-3 bg-[#131010] text-[#F0BB78] font-bold rounded-xl hover:bg-[#543A14] transition duration-300">
                Mulai Langganan
            </button>
            <div id="loginModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 items-center justify-center hidden">
                <div class="bg-white p-8 rounded-xl max-w-md w-full text-center shadow-xl">
                    <h2 class="text-2xl font-bold mb-4 text-[#131010]">Login Diperlukan</h2>
                    <p class="text-[#543A14] mb-6">Silakan login atau daftar terlebih dahulu untuk melanjutkan langganan.</p>
                    <div class="flex justify-center gap-4">
                        <a href="{{ route('login') }}" class="bg-[#131010] text-[#F0BB78] px-4 py-2 rounded-xl hover:bg-[#543A14]">Login</a>
                        <a href="{{ route('register') }}" class="bg-[#B13BFF] text-white px-4 py-2 rounded-xl hover:bg-[#8F29CC]">Daftar</a>
                    </div>
                    <button onclick="document.getElementById('loginModal').classList.add('hidden')" class="mt-6 text-sm text-gray-500 underline hover:text-gray-700">Tutup</button>
                </div>
            </div>
            @else
            <button type="submit" class="px-6 py-3 bg-[#131010] text-[#F0BB78] font-bold rounded-xl hover:bg-[#543A14] transition duration-300">
                Mulai Langganan
            </button>
            @endauth
        </form>
        <!-- Modal: Harus Login -->

    </div>
</section>

<style>
.hide-scrollbar::-webkit-scrollbar { display: none; }
.hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
@keyframes fade-in-up {
    0% { opacity: 0; transform: translateY(40px);}
    100% { opacity: 1; transform: translateY(0);}
}
.animate-fade-in-up { animation: fade-in-up 0.8s cubic-bezier(.4,0,.2,1) both; }
</style>
<script>
function scrollSubs(dir) {
    const el = document.querySelector('.hide-scrollbar');
    const card = el.querySelector('div');
    const scrollAmount = card.offsetWidth + 32; // 32 = space-x-8
    el.scrollBy({ left: dir * scrollAmount, behavior: 'smooth' });
}
</script>
@endsection