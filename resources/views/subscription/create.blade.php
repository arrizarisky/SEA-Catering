@extends('layouts.public')
@section('content')
<section class="min-h-screen w-full flex items-center justify-center bg-gradient-to-b from-[#FFF0DC] to-[#FFD586] py-20 px-4 md:px-20 mt-32">
    <div class="bg-white/90 rounded-3xl shadow-2xl p-8 md:p-12 w-full max-w-2xl animate-fade-in-up">
        <h2 class="text-3xl md:text-4xl font-bold text-[#543A14] mb-6 text-center animate-bounce">Form Langganan Makanan Sehat</h2>
        <p class="text-center text-gray-600 mb-8">Isi form berikut untuk mulai berlangganan makanan sehat dari SEA Catering. Pilih paket, jadwal pengiriman, dan sesuaikan dengan kebutuhan kamu.</p>
        @if (session('success'))
            <div id="success-alert" role="alert" class="alert alert-success flex items-center gap-2 justify-center mb-6 bg-green-100 text-green-700 rounded-lg p-4 animate-fade-in">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        <form action="{{ route('subscriptions.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-[#543A14] font-semibold mb-2">Nama Lengkap</label>
                <input type="text" name="full_name" placeholder="Nama Anda" class="w-full px-4 py-2 border border-[#FFD586] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B13BFF] transition">
            </div>
            <div>
                <label class="block text-[#543A14] font-semibold mb-2">Nomor HP</label>
                <input type="tel" name="phone_number" placeholder="08xxxxxxxx" class="w-full px-4 py-2 border border-[#FFD586] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B13BFF] transition">
            </div>
            <div>
                <label class="block text-[#543A14] font-semibold mb-2">Alamat Pengiriman</label>
                <textarea name="address" rows="3" placeholder="Alamat lengkap pengiriman" class="w-full px-4 py-2 border border-[#FFD586] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B13BFF] transition"></textarea>
            </div>
            <div>
                <label class="block text-[#543A14] font-semibold mb-2">Pilih Paket Langganan</label>
                <select name="plan_id" class="w-full px-4 py-2 border border-[#FFD586] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B13BFF] transition">
                    @foreach($plans as $plan)
                        <option value="{{ $plan->id }}">{{ $plan->name }} - Rp {{ number_format($plan->price,0,',','.') }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="total_price" id="total_price">
            </div>
            <div>
                <label class="block text-[#543A14] font-semibold mb-2">Jenis Makan yang Diinginkan</label>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach(['Sarapan', 'Makan Siang', 'Makan Malam'] as $makan)
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="meal_types[]" value="{{ $makan }}" class="form-checkbox h-5 w-5 text-[#B13BFF]">
                        <span>{{ $makan }}</span>
                    </label>
                    @endforeach
                </div>
            </div>
            <div>
                <label class="block text-[#543A14] font-semibold mb-2">Hari Pengiriman</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="delivery_days[]" value="{{ $hari }}" class="form-checkbox h-5 w-5 text-[#B13BFF]">
                        <span>{{ $hari }}</span>
                    </label>
                    @endforeach
                </div>
            </div>
            <div>
                <label class="block text-[#543A14] font-semibold mb-2">Alergi (Opsional)</label>
                <input type="text" name="allergies" placeholder="Misal: Udang, Kacang" class="w-full px-4 py-2 border border-[#FFD586] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B13BFF] transition">
            </div>
            <div>
                <label class="block text-[#543A14] font-semibold mb-2">Metode Pembayaran</label>
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
            @guest
                <button type="button" onclick="document.getElementById('loginModal').classList.remove('hidden')" class="w-full py-3 bg-[#131010] text-white font-bold rounded-xl hover:bg-[#543A14] transition transform hover:scale-105 active:scale-95 shadow-lg animate-pulse">
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
                <button type="submit" class="w-full py-3 bg-[#131010] text-white font-bold rounded-xl hover:bg-[#543A14] transition transform hover:scale-105 active:scale-95 shadow-lg animate-pulse">
                    Mulai Langganan
                </button>
                <div class="mt-4 text-right font-bold text-xl text-[#131010]">
                    Total: <span id="pricePreview">Rp 0</span>
                </div>
            @endguest
        </form>
    </div>
</section>

<style>
@keyframes fade-in-up {
    0% { opacity: 0; transform: translateY(40px);}
    100% { opacity: 1; transform: translateY(0);}
}
@keyframes fade-in {
    0% { opacity: 0;}
    100% { opacity: 1;}
}
.animate-fade-in-up { animation: fade-in-up 0.8s cubic-bezier(.4,0,.2,1) both; }
.animate-fade-in { animation: fade-in 0.8s cubic-bezier(.4,0,.2,1) both; }
.animate-bounce { animation: bounce 1s infinite alternate; }
@keyframes bounce {
    0% { transform: translateY(0);}
    100% { transform: translateY(-10px);}
}
</style>
<script>
    function updatePrice() {
        const plan_id = document.querySelector('select[name="plan_id"]').value;
        const meal_types = Array.from(document.querySelectorAll('input[name="meal_types[]"]:checked')).map(el => el.value);
        const delivery_days = Array.from(document.querySelectorAll('input[name="delivery_days[]"]:checked')).map(el => el.value);

        if (!plan_id || meal_types.length === 0 || delivery_days.length === 0) return;

        fetch("{{ route('subscriptions.calculate') }}", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                plan_id,
                meal_types,
                delivery_days
            })
        })
        .then(res => res.json())
        .then(data => {
            document.getElementById('total_price').value = data.raw_total;
            document.getElementById('pricePreview').innerText = `Rp ${data.total_price}`;
        })
        .catch(err => console.error('Error:', err));
    }

    document.querySelector('select[name="plan_id"]').addEventListener('change', updatePrice);
    document.querySelectorAll('input[name="meal_types[]"]').forEach(el => el.addEventListener('change', updatePrice));
    document.querySelectorAll('input[name="delivery_days[]"]').forEach(el => el.addEventListener('change', updatePrice));
</script>
@endsection