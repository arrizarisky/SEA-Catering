@extends('layouts.public')

@section('content')
<section class="w-full min-h-screen px-6 md:px-20 mt-28 bg-[#FFF0DC] text-[#131010] font-playFair mb-32 ">
    <h2 class="text-2xl md:text-3xl font-bold mt-6 mb-6 text-center">Testimoni Pengguna</h2>
    <div class="max-h-[70vh] overflow-y-auto whitespace-wrap bg-[#FFF0DC] py-20 px-4 sm:px-6 lg:px-20 font-poppins">
        @foreach ($testimonis as $testimoni)
         <div class="mt-12 grid gap-8 sm:grid-cols-1  md:grid-cols-2 lg:grid-cols-3 lg-p-20">
            <!-- Testimonial 1 -->
            <div class="bg-white shadow-xl rounded-3xl p-8 text-[#131010]">
                <div class="flex items-center gap-4 mb-4">
                    <img class="w-14 h-14 rounded-full object-cover" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Customer 1">
                    <div>
                     <h3 class="font-semibold text-lg">{{ $testimoni->user->name }}</h3>
                    <p class="text-sm text-[#543A14]">{{ $testimoni->subscriptionPlan->name }}</p>
                    </div>
                </div>
                <p class="text-sm text-[#543A14] truncate w-full">
                    “{{ $testimoni->message }}”
                <div class="mt-4 text-yellow-500">
                    {!! str_repeat('★', $testimoni->rating) !!}
                    {!! str_repeat('☆', 5 - $testimoni->rating) !!}
                </div>
            </div>
            <!-- Testimonial 1 -->
            <div class="bg-white shadow-xl rounded-3xl p-8 text-[#131010]">
                <div class="flex items-center gap-4 mb-4">
                    <img class="w-14 h-14 rounded-full object-cover" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Customer 1">
                    <div>
                     <h3 class="font-semibold text-lg">Suprapno</h3>
                    <p class="text-sm text-[#543A14]">Royal Plan</p>
                    </div>
                </div>
                <p class="text-sm text-[#543A14] truncate w-full">
                    “Wareg wetengku”
                <div class="mt-4 text-yellow-500">
                    ⭐⭐⭐⭐⭐
                </div>
            </div>
        </div>
        @endforeach
    </div>    
</section>
