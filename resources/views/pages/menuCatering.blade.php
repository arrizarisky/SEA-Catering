@extends('layouts.public')

@section('content')
<section class="w-full h-full px-6 md:px-20 mt-28 bg-[#FFF0DC] text-[#131010] font-playFair">
    <!-- Search + Filter -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-10">
        <div class="flex w-full md:w-2/3">
            <input type="text" placeholder="Cari paket atau menu..." class="w-full px-4 py-2 border border-gray-300 rounded-l-xl focus:outline-none focus:ring-2 focus:ring-[#131010]">
            <button class="px-4 bg-[#131010] text-white rounded-r-xl">Cari</button>
        </div>
        <select class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-xl">
            <option value="">Filter berdasarkan kategori</option>
            <option value="paket">Paket</option>
            <option value="daging">Daging</option>
            <option value="sayuran">Sayuran</option>
            <option value="kacang">Kacang</option>
        </select>
    </div>

    <!-- Paket Plan Section -->
    <h2 class="text-2xl md:text-3xl font-bold mb-6">Best Seller</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ([
            ['name' => 'Diet Plan', 'price' => 'Rp 30.000', 'desc' => 'Cocok untuk pemula yang ingin mencoba hidup sehat.',
            'benefit' => [
                ['text' =>'🥗 Salad / tumis sayur'],
                ['text' =>'🍗 Dada ayam / telur rebus'],
                ['text' =>'🍠 Karbo kompleks mini (ubi / oats)'],
                ['text' =>'Disusun oleh ahli gizi sesuai standar diet harian'],
                ['text' =>'Bebas MSG, gula, dan minyak berlebih']
            ] ,'img' => 'diet-plan.jpg'],
            ['name' => 'Protein Plan', 'price' => 'Rp 40.000', 'desc' => 'Khusus untuk kamu yang rutin nge-gym.',
            'benefit' => [
                ['text'=> '2 kali makan tinggi protein (siang & malam)'],
                ['text'=>'Tambahan telur rebus atau dada ayam per porsi'],
                ['text'=>'Menu tinggi protein dan rendah karbo'],
                ['text'=>'Cocok untuk olahraga, gym, atau muscle gain'],
                ['text'=>'Free konsultasi awal dengan ahli gizi']
            ], 'img' => 'protein-plan.jpg'],
            ['name' => 'Royal Plan', 'price' => 'Rp 60.000', 'desc' => 'Tanpa produk hewani sama sekali.',
            'benefit' =>[
                ['text'=>'3kali makan lengkap per hari (sarapan, makan siang, makan malam)'],
                ['text'=>'Snack sehat harian'],
                ['text'=>'Minuman infused water & jus sehat'],
                ['text'=>'Menu disesuaikan dengan kebutuhan (diet, alergi, preferensi)'],
                ['text'=>'Konsultasi gizi pribadi mingguan'],
                ['text'=>'Akses ke grup support gaya hidup sehat'],
                ['text'=>'Prioritas pengiriman tercepat']
            ], 'img' => 'royal-plan.jpg']
        ] as $index => $paket)
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <img src="{{ asset('images/' . $paket['img']) }}" alt="{{ $paket['name'] }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-bold">{{ $paket['name'] }}</h3>
                <p class="text-sm text-gray-600">{{ $paket['price'] }}</p>
                <p class="mt-2 text-sm">{{ $paket['desc'] }}</p>
                <button onclick="toggleModal({{ $index }})" class="mt-4 px-4 py-2 bg-[#131010] text-white rounded-xl hover:bg-[#8F29CC]">Lihat Detail</button>
            </div>
        </div>
        <!-- Modal -->
        <div id="modal-{{ $index }}" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 px-4 py-8 overflow-y-auto">
            <div class="bg-white rounded-xl shadow-xl max-w-5xl w-full overflow-hidden flex flex-col md:flex-row relative">
                <!-- Tombol close -->
                <button onclick="toggleModal({{ $index }})" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 z-10">
                    ✕
                </button>

                <!-- Gambar -->
                <div class="md:w-1/2 w-full flex items-center justify-center">
                    <img src="{{ asset('images/' . $paket['img']) }}" alt="{{ $paket['name'] }}" class="h-full w-full object-cover">
                </div>

                <!-- Detail -->
                <div class="md:w-1/2 w-full p-6 flex flex-col justify-between">
                    <div>
                        <h2 class="text-2xl font-bold mb-2">{{ $paket['name'] }}</h2>
                        <p class="text-gray-600 text-sm mb-4">Kategori: Makanan Sehat</p>
                        <div class="flex items-center space-x-1 mb-2">
                            @for ($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 text-yellow-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09L5.51 11.27.633 6.91l6.63-.96L10 0l2.737 5.95 6.63.96-4.878 4.36 1.388 6.82z"/>
                                </svg>
                            @endfor
                        </div>
                        <p class="text-xl font-semibold text-[#B13BFF] mb-4">{{ $paket['price'] }}</p>
                         <ul class="space-y-2 my-5">
                            @foreach ($paket['benefit'] as $benefit )
                            <li class="flex items-center">
                                <i class="fi fi-sr-check-circle text-[#131010]"></i>
                                <span class="text-base font-normal leading-tight dark:text-[#543A14] ms-3">{{ $benefit['text'] }}</span>
                            </li>
                            @endforeach
                            </ul>
                    </div>

                    <!-- Tombol Action -->
                    <div>
                        <button class="w-full  bg-[#543A14] hover:bg-[#131010] text-white py-3 rounded-xl text-lg font-semibold" onclick="document.getElementById('loginModal-{{ $index }}').classList.remove('hidden')">  
                            Beli Sekarang
                        </button>
                        <div id="loginModal-{{ $index }}" class="fixed flex inset-0 z-50 bg-black bg-opacity-50 items-center justify-center hidden">
                            <div class="bg-white p-8 rounded-xl max-w-md w-full text-center shadow-xl">
                                <h2 class="text-2xl font-bold mb-4 text-[#131010]">Login Diperlukan</h2>
                                <p class="text-[#543A14] mb-6">Silakan login atau daftar terlebih dahulu untuk melanjutkan langganan.</p>
                                <div class="flex justify-center gap-4">
                                    <a href="{{ route('login') }}" class="bg-[#131010] text-[#F0BB78] px-4 py-2 rounded-xl hover:bg-[#543A14]">Login</a>
                                    <a href="{{ route('register') }}" class="bg-[#B13BFF] text-white px-4 py-2 rounded-xl hover:bg-[#8F29CC]">Daftar</a>
                                </div>
                                <button onclick="document.getElementById('loginModal-{{ $index }}').classList.add('hidden')" class="mt-6 text-sm text-gray-500 underline hover:text-gray-700">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>

    <!-- Kategori Menu Tambahan -->
    <div class="relative w-full mx-auto mt-10">
        <h2 class="text-2xl md:text-3xl font-bold mb-6">Semua Paket</h2>
        <div class="flex overflow-x-auto space-x-6 pb-4 hide-scrollbar">
            @foreach([
                ['name' => 'Healthy Plan', 'price' => 'Rp 250.000', 'desc' => 'Cocok untuk pemula yang ingin mencoba hidup sehat.', 'img' => 'healthy.jpg'],
                ['name' => 'Fitness Pro', 'price' => 'Rp 400.000', 'desc' => 'Khusus untuk kamu yang rutin nge-gym.', 'img' => 'fitness.jpg'],
                ['name' => 'Vegan Delight', 'price' => 'Rp 300.000', 'desc' => 'Tanpa produk hewani sama sekali.', 'img' => 'vegan.jpg'],
                ['name' => 'Seafood Lover', 'price' => 'Rp 350.000', 'desc' => 'Menu laut segar dan sehat.', 'img' => 'seafood.jpg'],
                ['name' => 'Low Carb', 'price' => 'Rp 320.000', 'desc' => 'Rendah karbo, tinggi protein.', 'img' => 'lowcarb.jpg'],
            ] as $paket)
            <div class="flex-shrink-0 w-72 bg-white rounded-xl shadow-lg p-6">
                <img src="{{ asset('images/' . $paket['img']) }}" alt="{{ $paket['name'] }}" class="w-40 h-40 object-cover rounded-lg mb-4 mx-auto">
                <h3 class="text-lg font-bold mb-2 text-center">{{ $paket['name'] }}</h3>
                <p class="text-[#131010] font-semibold mb-2 text-center">{{ $paket['price'] }}</p>
                <p class="text-sm text-gray-600 mb-4 text-center">{{ $paket['desc'] }}</p>
                <button class="block mx-auto px-4 py-2 bg-[#131010] text-white rounded-xl hover:bg-[#8F29CC]">Pesan Sekarang</button>
            </div>
            @endforeach
        </div>
    </div>

<!-- Optional: Hide scrollbar style -->
{{-- @push('before-style')
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
@endpush --}}

    <!-- CTA Langganan -->
    <section class="bg-[#543A14] text-[#FFF0DC] py-16 px-6 mb-10 md:px-20 text-center font-playFair rounded-2xl">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Langganan Makanan Sehat Sekarang!</h2>
        <p class="max-w-2xl mx-auto mb-6 text-lg">Nikmati berbagai pilihan paket sehat mulai dari sarapan hingga makan malam. Kami antar ke depan pintu rumahmu setiap hari!</p>
        <a href="{{ route('subscriptions.create') }}" onclick="toggleLanggananModal()" class="px-8 py-3 bg-[#F0BB78] text-[#131010] font-bold rounded-xl hover:bg-[#FFD586] transition">
            Daftar Sekarang
        </a>
    </section>

</section>

<!-- Modal Script -->
<script>
    function toggleModal(id) {
        const modal = document.getElementById('modal-' + id);
        modal.classList.toggle('hidden');
        modal.classList.toggle('flex');
    }

</script>
@endsection
