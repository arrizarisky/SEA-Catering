@extends('layouts.public')

@section('content')
<section class="w-full h-full px-6 md:px-20 mt-28 bg-[#FFF0DC] text-[#131010] font-playFair">
    <!-- Search + Filter -->
    <form id="searchForm" method="GET" action="{{ route('menuCatering') }}" class="flex flex-col md:flex-row items-center justify-between gap-4 mb-10">
        <div class="flex w-full md:w-2/3">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari paket atau menu..." class="w-full px-4 py-2 border border-gray-300 rounded-l-xl focus:outline-none focus:ring-2 focus:ring-[#131010]">
            <button type="submit" class="px-4 bg-[#131010] text-white rounded-r-xl">Cari</button>
        </div>
        <select name="category" class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-xl" onchange="this.form.submit()">
            <option value="">Filter berdasarkan kategori</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->name }}">{{ ucfirst($cat->name) }}</option>
            @endforeach
        </select>
    </form>

    <!-- Paket Plan Section -->
    <h2 class="text-2xl md:text-3xl font-bold mb-6">Best Seller</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ([
            ['id' => 1,'name' => 'Diet Plan', 'price' => 'Rp 30.000', 'desc' => 'Cocok untuk pemula yang ingin mencoba hidup sehat.',
            'benefit' => [
                ['text' =>'🥗 Salad / tumis sayur'],
                ['text' =>'🍗 Dada ayam / telur rebus'],
                ['text' =>'🍠 Karbo kompleks mini (ubi / oats)'],
                ['text' =>'Disusun oleh ahli gizi sesuai standar diet harian'],
                ['text' =>'Bebas MSG, gula, dan minyak berlebih']
            ] ,'img' => 'diet-plan.jpg'],
            ['id' => 2,'name' => 'Protein Plan', 'price' => 'Rp 40.000', 'desc' => 'Khusus untuk kamu yang rutin nge-gym.',
            'benefit' => [
                ['text'=> '2 kali makan tinggi protein (siang & malam)'],
                ['text'=>'Tambahan telur rebus atau dada ayam per porsi'],
                ['text'=>'Menu tinggi protein dan rendah karbo'],
                ['text'=>'Cocok untuk olahraga, gym, atau muscle gain'],
                ['text'=>'Free konsultasi awal dengan ahli gizi']
            ], 'img' => 'protein-plan.jpg'],
            ['id' => 3,'name' => 'Royal Plan', 'price' => 'Rp 60.000', 'desc' => 'Tanpa produk hewani sama sekali.',
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
                <button onclick="toggleModal({{ $index }})" class="mt-4 px-4 py-2 bg-[#131010] text-white rounded-xl hover:bg-[#F0BB78]">Lihat Detail</button>
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
                        <p class="text-xl font-semibold text-[#F0BB78] mb-4">{{ $paket['price'] }}</p>
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
                        @guest                                           
                        <button class="w-full  bg-[#543A14] hover:bg-[#131010] text-white py-3 rounded-xl text-lg font-semibold" onclick="document.getElementById('loginModal-{{ $index }}').classList.remove('hidden')">  
                            Beli Sekarang
                        </button>
                        <div id="loginModal-{{ $index }}" class="fixed flex inset-0 z-50 bg-black bg-opacity-50 items-center justify-center hidden">
                            <div class="bg-white p-8 rounded-xl max-w-md w-full text-center shadow-xl">
                                <h2 class="text-2xl font-bold mb-4 text-[#131010]">Login Diperlukan</h2>
                                <p class="text-[#543A14] mb-6">Silakan login atau daftar terlebih dahulu untuk melanjutkan langganan.</p>
                                <div class="flex justify-center gap-4">
                                    <a href="{{ route('login') }}" class="bg-[#131010] text-[#F0BB78] px-4 py-2 rounded-xl hover:bg-[#543A14]">Login</a>
                                    <a href="{{ route('register') }}" class="bg-[#F0BB78] text-white px-4 py-2 rounded-xl hover:bg-[#F0BB78]">Daftar</a>
                                </div>
                                <button onclick="document.getElementById('loginModal-{{ $index }}').classList.add('hidden')" class="mt-6 text-sm text-gray-500 underline hover:text-gray-700">Tutup</button>
                            </div>
                        </div>
                        @else
                            <a href="{{ route('subscriptions.quick-form', ['plan' => $paket['id']]) }}" class="w-full block bg-[#543A14] hover:bg-[#131010] text-white py-3 rounded-xl text-lg font-semibold text-center mb-2">
                                Beli Sekarang
                            </a>
                            @if(auth()->user()->subscriptions()->where('subscription_plan_id', $paket['id'])->exists())
                                <a href="{{ route('testimoni.create', $paket['id']) }}" class="w-40 block bg-[#543A14] hover:bg-[#131010] text-white py-3 rounded-xl text-lg font-semibold text-center">Tulis Testimoni</a>
                            @endif
                        @endguest
                        
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
            @forelse ($menus as $menu )
                <div class="flex-shrink-0 w-72 bg-white rounded-xl shadow-lg p-3">           
                        @if($menu->image)
                            <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="w-full h-48 object-cover rounded-lg mb-4 mx-auto">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">Tidak ada gambar</div>
                        @endif
                    <h3 class="text-lg font-bold mb-2 text-center">{{ $menu->name }}</h3>
                    <p class="text-[#131010] font-semibold mb-2 text-center">{{ $menu->category->name }}</p>
                    <p class="text-sm text-gray-600 mb-4 text-center">{{ Str::limit($menu->description, 80) }}</p>
                    <p class="text-sm text-gray-600 mb-4 text-center">Rp{{ number_format($menu->price, 0, ',', '.') }}</p>
                    <button class="block mx-auto px-4 py-2 bg-[#131010] text-white rounded-xl hover:bg-[#F0BB78]">Pesan Sekarang</button>
                </div>
            @empty
            <p class="col-span-full text-center text-gray-600">Menu belum tersedia.</p>
            @endforelse($menus as $menu)
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

    document.getElementById('searchForm').addEventListener('submit', function () {
        this.querySelector('input[name="search"]').value = ''; // Delay sedikit agar form tetap sempat terkirim
    });
</script>
@endsection
