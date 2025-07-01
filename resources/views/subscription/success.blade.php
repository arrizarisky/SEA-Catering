@extends('layouts.public')

@section('content')
<section class="h-full w-full bg-[#F0BB78] px-4 md:px-20 flex flex-col items-center py-32">
    <div class="bg-[#FFF0DC] px-10 py-12 rounded-3xl shadow-xl text-center max-w-xl w-full">
        <svg class="mx-auto mb-6 w-16 h-16 text-green-500" fill="none" stroke="currentColor" stroke-width="1.5"
             viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M4.5 12.75l6 6 9-13.5"/>
        </svg>
        <h2 class="text-3xl font-bold text-[#131010] mb-4">Langganan Berhasil!</h2>
        <p class="text-[#543A14] mb-6">Terima kasih telah mendaftar langganan makanan sehat di SEA Catering.</p>

        <a href="{{ route('subscription.dashboard') }}"
           class="inline-block px-6 py-3 bg-[#131010] text-[#F0BB78] rounded-xl font-bold hover:bg-[#543A14] transition">
            Lihat Dashboard
        </a>
    </div>
</section>
@endsection
