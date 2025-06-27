@extends('layouts.public')

@section('content')
<section class="w-full min-h-screen px-6 md:px-20 mt-28 bg-[#FFF0DC] text-[#131010] font-playFair mb-32 ">
    <h2 class="text-2xl md:text-3xl font-bold mt-6 mb-6 text-center">Testimoni Pengguna</h2>
    <div class="max-h-[70vh] overflow-y-auto whitespace-wrap bg-[#FFF0DC] py-20 px-4 sm:px-6 lg:px-20 font-poppins">
        @foreach ([
            ['name' => 'Andi', 'msg' => 'Makanannya enak dan sehat!', 'rating' => 5],
            ['name' => 'Rina', 'msg' => 'Beneran bantu diet aku!', 'rating' => 4],
            ['name' => 'Budi', 'msg' => 'Pengiriman cepat, rasa mantap.', 'rating' => 5]
        ] as $t)
         <div class="mt-12 grid gap-8 sm:grid-cols-1  md:grid-cols-2 lg:grid-cols-3 lg-p-20">
            <!-- Testimonial 1 -->
            <div class="bg-white shadow-xl rounded-3xl p-8 text-[#131010]">
                <div class="flex items-center gap-4 mb-4">
                    <img class="w-14 h-14 rounded-full object-cover" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Customer 1">
                    <div>
                    <h3 class="font-semibold text-lg">Ayu Lestari</h3>
                    <p class="text-sm text-[#543A14]">Karyawan Swasta</p>
                    </div>
                </div>
                <p class="text-sm text-[#543A14] truncate w-full">
                    “Diet Plan dari SEA Catering benar-benar ngebantu aku jaga pola makan sehat meski kerjaan padat. Makanannya fresh, variatif, dan tetap enak!”
                </p>
                <div class="mt-4 text-yellow-500">
                    ★★★★★
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white shadow-xl rounded-3xl p-8 text-[#131010]">
                <div class="flex items-center gap-4 mb-4">
                    <img class="w-14 h-14 rounded-full object-cover" src="https://randomuser.me/api/portraits/men/32.jpg" alt="Customer 2">
                    <div>
                    <h3 class="font-semibold text-lg">Rizky Ananda</h3>
                    <p class="text-sm text-[#543A14]">Atlet Gym</p>
                    </div>
                </div>
                <p class="text-sm text-[#543A14] truncate w-full">
                    “Paket Protein Plan dari SEA luar biasa! Komposisi gizinya jelas, pas buat recovery latihan. Dada ayam dan dagingnya juicy banget.”
                </p>
                <div class="mt-4 text-yellow-500">
                    ★★★★★
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white shadow-xl rounded-3xl p-8 text-[#131010]">
                <div class="flex items-center gap-4 mb-4">
                    <img class="w-14 h-14 rounded-full object-cover" src="https://randomuser.me/api/portraits/men/75.jpg" alt="Customer 3">
                    <div>
                    <h3 class="font-semibold text-lg">Bapak Hendra</h3>
                    <p class="text-sm text-[#543A14]">Langganan Royal Plan</p>
                    </div>
                </div>
                <p class="text-sm text-[#543A14] truncate w-full">
                    “Royal Plan bikin hidup saya jauh lebih praktis. Sekali pesan, langsung dapat makanan sehat setiap hari. Rasanya mewah tapi tetap sehat.”
                </p>
                <div class="mt-4 text-yellow-500">
                    ★★★★★
                </div>
            </div>
        </div>
        @endforeach
    </div>    
</section>
