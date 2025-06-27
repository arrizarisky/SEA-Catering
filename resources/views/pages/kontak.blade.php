{{-- filepath: c:\laragon\www\SEA-Catering\resources\views\pages\kontak.blade.php --}}
@extends('layouts.public')
@section('content')
    <section id="kontak" class="min-h-screen w-full flex items-center justify-center bg-gradient-to-b from-[#FFF0DC] to-[#FFD586] py-20 px-4 md:px-20 mt-32 ">
        <div class="bg-white/90 rounded-3xl shadow-2xl p-8 md:p-12 w-full max-w-2xl animate-fade-in-up">
            <h2 class="text-3xl md:text-4xl font-bold text-[#543A14] mb-6 text-center animate-bounce">Hubungi Kami</h2>
            <p class="text-center text-gray-600 mb-8">Ada pertanyaan, kritik, atau saran? Silakan isi form di bawah ini, kami akan segera merespon!</p>
            <form id="kontakForm" class="space-y-6">
                <div>
                    <label class="block text-[#543A14] font-semibold mb-2" for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" required class="w-full px-4 py-2 border border-[#FFD586] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B13BFF] transition" placeholder="Nama Anda">
                </div>
                <div>
                    <label class="block text-[#543A14] font-semibold mb-2" for="email">Email</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-[#FFD586] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B13BFF] transition" placeholder="email@domain.com">
                </div>
                <div>
                    <label class="block text-[#543A14] font-semibold mb-2" for="pesan">Pesan</label>
                    <textarea id="pesan" name="pesan" rows="4" required class="w-full px-4 py-2 border border-[#FFD586] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#B13BFF] transition" placeholder="Tulis pesan Anda..."></textarea>
                </div>
                <button type="submit" class="w-full py-3 bg-[#131010] text-white font-bold rounded-xl hover:bg-[#543A14] transition transform hover:scale-105 active:scale-95 shadow-lg animate-pulse">Kirim Pesan</button>
            </form>
            <div id="kontakSuccess" class="hidden mt-6 text-center text-green-600 font-semibold animate-fade-in">
                Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.
            </div>
            <div class="mt-10 flex flex-col md:flex-row items-center justify-center gap-6">
                <a href="https://wa.me/6281234567890" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-green-500 text-white rounded-xl hover:bg-green-600 transition shadow-md animate-fade-in-up delay-100">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.52 3.48A12 12 0 0 0 3.48 20.52l-1.32 4.8a1 1 0 0 0 1.22 1.22l4.8-1.32A12 12 0 1 0 20.52 3.48ZM12 22a10 10 0 1 1 10-10 10 10 0 0 1-10 10Zm5.2-7.6c-.28-.14-1.65-.82-1.9-.92s-.44-.14-.62.14-.72.92-.88 1.1-.32.21-.6.07a8.13 8.13 0 0 1-2.4-1.48 9 9 0 0 1-1.66-2c-.18-.31 0-.47.13-.61.13-.13.28-.34.42-.51a.54.54 0 0 0 .08-.54c-.07-.14-.62-1.5-.85-2.06s-.45-.45-.62-.46h-.53a1 1 0 0 0-.73.34 3 3 0 0 0-.94 2.23c0 1.31.94 2.58 1.07 2.76s1.85 2.94 4.5 4c.63.27 1.12.43 1.5.55a3.6 3.6 0 0 0 1.65.1 2.8 2.8 0 0 0 1.84-1.3 2.3 2.3 0 0 0 .16-1.3c-.07-.13-.25-.2-.53-.34Z"/></svg>
                    WhatsApp
                </a>
                <a href="mailto:info@seacatering.com" class="flex items-center gap-2 px-4 py-2 bg-blue-500 text-white rounded-xl hover:bg-blue-600 transition shadow-md animate-fade-in-up delay-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 2v.01L12 13 4 6.01V6Zm0 12H4V8.24l7.29 6.41a1 1 0 0 0 1.42 0L20 8.24Z"/></svg>
                    Email
                </a>
                <a href="https://goo.gl/maps/xyz" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-[#FFD586] text-[#543A14] rounded-xl hover:bg-[#FFB800] transition shadow-md animate-fade-in-up delay-300">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7Zm0 9.5A2.5 2.5 0 1 1 14.5 9 2.5 2.5 0 0 1 12 11.5Z"/></svg>
                    Lokasi
                </a>
            </div>
        </div>
    </section>

    {{-- Animasi Tailwind Custom --}}
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
    </style>

    {{-- Interaktif: Tampilkan pesan sukses tanpa reload --}}
    <script>
    document.getElementById('kontakForm').onsubmit = function(e) {
        e.preventDefault();
        document.getElementById('kontakForm').classList.add('hidden');
        document.getElementById('kontakSuccess').classList.remove('hidden');
        setTimeout(() => {
            document.getElementById('kontakForm').reset();
            document.getElementById('kontakForm').classList.remove('hidden');
            document.getElementById('kontakSuccess').classList.add('hidden');
        }, 3500);
    };
</script>
@endsection
