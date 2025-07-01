@extends('layouts.public')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white shadow-md p-6 rounded-xl">
    <h2 class="text-2xl font-bold mb-4">Tulis Testimoni untuk: {{ $plan->name }}</h2>

    <form action="{{ route('testimoni.store', $plan->id) }}" method="POST">
        @csrf
        <label class="block mb-2 font-semibold">Rating:</label>
        <select name="rating" required class="w-full mb-4 px-4 py-2 border border-gray-300 rounded-xl">
            <option value="">Pilih Rating</option>
            @for($i = 5; $i >= 1; $i--)
                <option value="{{ $i }}">{{ str_repeat('⭐', $i) }}</option>
            @endfor
        </select>

        <label class="block mb-2 font-semibold">Ulasan:</label>
        <textarea name="message" rows="4" class="w-full mb-4 px-4 py-2 border border-gray-300 rounded-xl" placeholder="Tulis ulasan Anda..."></textarea>

        <button type="submit" class="w-full py-2 bg-[#131010] text-[#F0BB78] font-bold rounded-xl hover:bg-[#543A14]">
            Kirim Testimoni
        </button>
    </form>
</div>
@endsection
