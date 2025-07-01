<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            
        @endif
    </head>
    <body class="flex items-center lg:justify-center flex-col bg-[#FFF0DC]">
{{-- Navbar --}}
        <header id="navbar" class="fixed top-0 w-full text-sm mb-6 not-has-[nav]:hidden z-[99999]">
            @if (Route::has('login'))
            <nav class="flex flex-wrap items-center pt-10 z-99 relative mx-auto max-w-screen-xl md-order-1 justify-between gap-4 font-playFair border-b border-[#543A14]/10 pb-2">
                    <div class="hidden lg:flex home space-x-6 text-xl">
                        <a href="" class="text-[#131010] font-bold hover:text-white hover:border-b-[2px] border-[#B13BFF] transition">Beranda</a>
                        <a href="{{ route('menuCatering') }}" class="text-[#131010] font-bold hover:text-white hover:border-b-[2px] border-[#B13BFF] transition">Menu</a>
                        <a href="{{ route('testimoni.index') }}" class="text-[#131010] font-bold hover:text-white hover:border-b-[2px] border-[#B13BFF] transition">Testimoni</a>
                    </div>    
                    <div class="flex space-x-2">
                        <svg width="40px" height="40px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#543A14" d="M128 352.576V352a288 288 0 0 1 491.072-204.224 192 192 0 0 1 274.24 204.48 64 64 0 0 1 57.216 74.24C921.6 600.512 850.048 710.656 736 756.992V800a96 96 0 0 1-96 96H384a96 96 0 0 1-96-96v-43.008c-114.048-46.336-185.6-156.48-214.528-330.496A64 64 0 0 1 128 352.64zm64-.576h64a160 160 0 0 1 320 0h64a224 224 0 0 0-448 0zm128 0h192a96 96 0 0 0-192 0zm439.424 0h68.544A128.256 128.256 0 0 0 704 192c-15.36 0-29.952 2.688-43.52 7.616 11.328 18.176 20.672 37.76 27.84 58.304A64.128 64.128 0 0 1 759.424 352zM672 768H352v32a32 32 0 0 0 32 32h256a32 32 0 0 0 32-32v-32zm-342.528-64h365.056c101.504-32.64 165.76-124.928 192.896-288H136.576c27.136 163.072 91.392 255.36 192.896 288z"/></svg>
                        <h1 class="text-xl sm:text-3xl font-bold text-[#131010]">SEACatering</h1>
                    </div>

                    <button id="navbar-sea-btn" type="button"
                        class="flex lg:hidden items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg"
                        >
                        <i class="fi fi-sr-menu-food text-2xl text-[#543A14]"></i>
                    </button>

                    <div class="hidden lg:flex space-x-2 text-xl w-full md:items-center md:w-auto">
                        
                        <a href="{{ route('subscriptions.create') }}" class="text-[#131010] font-bold hover:text-white hover:border-b-[2px] border-[#B13BFF] transition">Langganan</a>
                        <a href="{{ route('kontak') }}" class="text-[#131010] font-bold hover:text-white hover:border-b-[2px] border-[#B13BFF] transition">Kontak</a>
                        
                    
                        @auth
                            @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('admin.dashboard') }}" class="relative px-4 py-2 bg-[#131010] text-[#F0BB78] font-playFair font-bold hover:bg-[#543A14] focus:ring-4 focus:ring-[#FFF0DC] focus:outline-none rounded-xl transition duration-300"
                                    >Dashboard Admin</a>
                                @elseif(auth()->user()->role === 'pelanggan')
                                    <a href="{{ route('subscription.dashboard') }}" class="relative px-4 py-2 bg-[#131010] text-[#F0BB78] font-playFair font-bold hover:bg-[#543A14] focus:ring-4 focus:ring-[#FFF0DC] focus:outline-none rounded-xl transition duration-300">Dashboard Pelanggan</a>
                                @endif
                            @else
                                <a
                                    href="{{ route('login') }}"
                                    class="z-50 relative px-4 py-2 bg-[#131010] text-[#F0BB78] font-playFair font-bold hover:bg-[#543A14] focus:ring-4 focus:ring-[#FFF0DC] focus:outline-none rounded-xl transition duration-300"
                                >
                                    Login
                                </a>
                        @endauth
                    </div>
                </nav>
                <div class="w-full px-4 sm:px-6 lg:px-10" id="navbar-sea">
                    <nav class="lg:flex lg:items-center lg:justify-end">
                        <ul
                        class="flex lg:hidden flex-col lg:flex-row lg:items-center gap-2 lg:gap-6 bg-[#131010] lg:bg-transparent border border-[#FFD586] lg:border-none rounded-2xl p-6 lg:p-0 font-playFair font-bold text-2xl lg:text-base text-[#FFF0DC]"
                        >
                        <li>
                            <a
                            href="{{ route('Beranda') }}"
                            class="block w-full rounded-xl px-4 py-2 hover:bg-[#FFD586] hover:text-[#543A14] transition"
                            >
                            Beranda
                            </a>
                        </li>
                        <li>
                            <a
                            href="{{ route('menuCatering') }}"
                            class="block w-full rounded-xl px-4 py-2 hover:bg-[#FFD586] hover:text-[#543A14] transition"
                            >
                            Menu
                            </a>
                        </li>
                        <li>
                            <a
                            href="{{ route('testimoni.index') }}"
                            class="block w-full rounded-xl px-4 py-2 hover:bg-[#FFD586] hover:text-[#543A14] transition"
                            >
                            Testimoni
                            </a>
                        </li>
                        <li>
                            <a
                            href="{{ route('subscriptions.create') }}"
                            class="block w-full rounded-xl px-4 py-2 hover:bg-[#FFD586] hover:text-[#543A14] transition"
                            >
                            Langganan
                            </a>
                        </li>
                        <li>
                            <a
                            href="{{ route('kontak') }}"
                            class="block w-full rounded-xl px-4 py-2 hover:bg-[#FFD586] hover:text-[#543A14] transition"
                            >
                            Kontak
                            </a>
                        </li>
                        </ul>
                    </nav>
                </div>

            @endif
        </header>
{{-- End --}}

{{-- Hero Section --}}
        <section id="welcome-page" class="w-full h-full flex flex-col text-center py-20 px-4 md:px-20 font-playFair bg-[#FFD586]">
            <div class="grid lg:grid-cols-2">
                <img
                    alt=""
                    src="{{ asset('images/hero-asli.svg') }}"
                    class="relative z-0 flex lg:block w-full h-[80vh] object-contain drop-shadow-2xl lg:self-end lg:rounded-ss-[30px] md:rounded-ss-[60px] mt-10 pointer-events-none"
                />
                <div class="p-4 sm:p-8 md:p-12 lg:px-12 lg:py-24">
                    <div class="mx-auto w-full max-w-xl text-center">
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#131010] tracking-tight mb-4">
                            Welcome to Sea Catering
                        </h1>
                        <h3 class="text-3xl sm:text-2xl md:text-3xl font-extrabold text-[#543A14] tracking-tight mb-4">
                            Makanan Sehat, Kapan Saja, Di Mana Saja
                        </h3>
                        <p class="w-full max-w-4xl mx-auto text-base sm:text-lg mb-6 text-center font-poppins text-[#543A14] transition-transform duration-300 transform hover:translate-x-0 sm:hover:translate-x-10">
                            Nikmati gaya hidup sehat tanpa ribet! SEA Catering hadir untuk Anda yang peduli kesehatan namun tetap ingin praktis dalam menikmati makanan bergizi. Dengan layanan pengiriman ke seluruh Indonesia, kami siap menghadirkan menu sehat langsung ke depan pintu Anda — dari sarapan hingga makan malam!
                        </p>
    
                        <div class="mt-4 md:mt-8 z-10">
                            <a
                                href="#paket-makanan"
                                class="inline-block px-6 py-3 md:px-20 bg-[#131010] text-[#F0BB78] font-playFair font-bold sm:text-2xl hover:bg-[#543A14] focus:ring-4 focus:ring-[#FFF0DC] focus:outline-none rounded-xl transition duration-300 z-50 relative"
                            >
                                Explore Our Food
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </section>
{{-- End --}}

{{-- Tentang Kami --}}
        <section id="tentang-kami" class="py-20 px-6 md:px-20">
            <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-4 md:items-center md:gap-8">
                    
                    <div class="md:col-span-2">
                        <div class="max-w-lg md:max-w-none">
                            <h2 class="text-2xl font-playFair font-semibold text-gray-900 sm:text-3xl">
                                Tentang Kami
                            </h2>
                            
                            <p class="mt-4 text-gray-700 font-poppins">
                                Di SEA Catering, kami percaya bahwa gaya hidup sehat tidak harus repot.
                                Kami hadir untuk menjembatani antara kesibukan harian dan kebutuhan nutrisi seimbang.
                                
                                SEA Catering adalah layanan makanan sehat yang dirancang untuk Anda yang aktif, peduli kesehatan, dan ingin tetap menikmati hidangan lezat tanpa rasa bersalah. Mulai dari sarapan bergizi, lunch box rendah kalori, hingga makan malam kaya protein — semua kami siapkan dengan bahan segar dan resep dari ahli gizi.
                            </p>
                        </div>
                        <div class="mt-8">
                            <h3 class="text-xl font-semibold mb-4 text-gray-800 font-playFair">Kenapa SEA Catering?</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-[#FFF0DC] p-6 rounded-lg shadow border border-gray-200 font-poppins">
                                
                                <!-- Item 1 -->
                                <div class="flex items-start space-x-3">
                                    <span class="text-[#F0BB78] text-2xl"><i class="fi fi-rr-box"></i></span>
                                    <div>
                                        <h4 class="text-md font-semibold text-gray-800">Paket Harian & Langganan</h4>
                                        <p class="text-sm text-gray-600">Pilih paket harian atau mingguan sesuai kebutuhan Anda.</p>
                                    </div>
                                </div>
                                
                                <!-- Item 2 -->
                                <div class="flex items-start space-x-3">
                                    <span class="text-[#F0BB78] text-2xl"><i class="fi fi-rr-salad"></i></span>
                                    <div>
                                        <h4 class="text-md font-semibold text-gray-800">Variasi Menu Sehat</h4>
                                        <p class="text-sm text-gray-600">Menu disesuaikan dengan kebutuhan nutrisi pribadi Anda.</p>
                                    </div>
                                </div>
                                
                                <!-- Item 3 -->
                                <div class="flex items-start space-x-3">
                                    <span class="text-[#F0BB78] text-2xl"><i class="fi fi-rr-clock-five"></i></span>
                                    <div>
                                        <h4 class="text-md font-semibold text-gray-800">Cepat & Tetap Fresh</h4>
                                        <p class="text-sm text-gray-600">Dikemas dengan cepat dan dikirim dalam kondisi optimal.</p>
                                    </div>
                                </div>
                                
                                <!-- Item 4 -->
                                <div class="flex items-start space-x-3">
                                    <span class="text-[#F0BB78] text-2xl"><i class="fi fi-rr-globe"></i></span>
                                    <div>
                                        <h4 class="text-md font-semibold text-gray-800">Pengiriman Luas</h4>
                                        <p class="text-sm text-gray-600">Tersedia di berbagai kota besar di Indonesia.</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <img
                        src="{{ asset('images/about-img.jpg') }}"
                        class="rounded w-full h-full object-cover"
                        alt=""
                        />
                    </div>
                </div>
            </div>
        </section>
{{-- End --}}

{{-- Layanan Kami --}}
        <section id="layanan-kami" class="py-20 px-6 md:px-20 bg-[#131010] text-white font-poppins">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-3 font-playFair tracking-wide">Layanan Kami</h2>
                <p class="text-gray-400 max-w-xl mx-auto font-poppins">Kami hadir untuk memberikan solusi sehat dan praktis melalui berbagai layanan unggulan yang dirancang untuk kebutuhan hidup modern.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <!-- Service 1 -->
                <div class="group p-6 bg-gradient-to-br from-[#161616] to-[#1f1f1f] border border-gray-800 rounded-xl transition hover:shadow-cyan-500/30 hover:scale-105 duration-300">
                    <div class="text-[#F0BB78] text-[50px]">
                        <i class="fi fi-sr-invite-alt"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Langganan Fleksibel</h3>
                    <p class="text-gray-400 text-sm">Atur langganan makanan mingguan atau bulanan sesuai dengan jadwal dan kebutuhan Anda.</p>
                </div>

                <!-- Service 2 -->
                <div class="group p-6 bg-gradient-to-br from-[#161616] to-[#1f1f1f] border border-gray-800 rounded-xl transition hover:shadow-cyan-500/30 hover:scale-105 duration-300">
                    <div class="text-[#F0BB78] text-[50px]">
                        <i class="fi fi-sr-broccoli"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Pilihan Menu Sehat</h3>
                    <p class="text-gray-400 text-sm">Tersedia berbagai pilihan menu: diet, tinggi protein, dan royal, lengkap dengan informasi gizi.</p>
                </div>

                <!-- Service 3 -->
                <div class="group p-6 bg-gradient-to-br from-[#161616] to-[#1f1f1f] border border-gray-800 rounded-xl transition hover:shadow-cyan-500/30 hover:scale-105 duration-300">
                    <div class="text-[#F0BB78] text-[50px]">
                        <i class="fi fi-sr-shipping-fast"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Pengiriman Seluruh Indonesia</h3>
                    <p class="text-gray-400 text-sm">Kami mengantar makanan langsung ke lokasi Anda, tepat waktu dan dalam kondisi terbaik.</p>
                </div>
            </div>
        </section>
{{-- End --}}

    {{-- Our Plan  --}}
        <section id="paket-makanan" class="px-10 py-20 md:px-20 font-poppins">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-3 font-playFair text-[#131010] tracking-wide">Paket Plan</h2>
                <p class="max-w-xl mx-auto font-poppins text-[#543A14] ">Mulai dari diet ringan hingga nutrisi intensif, SEA Catering menyediakan paket harian sehat yang fleksibel, lezat, dan dikirim langsung ke pintumu. Tinggal pilih waktu makan: pagi, siang, atau malam — sehat jadi lebih mudah!</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-8">
                <div class="group p-6 rounded">
                    <a href="#" class="group relative block overflow-hidden">
                        <button
                            class="absolute end-4 top-4 z-10 rounded-full bg-white p-1.5 text-gray-900 transition hover:text-gray-900/75"
                        >
                            <span class="sr-only">Wishlist</span>

                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-4"
                            >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                            />
                            </svg>
                        </button>

                        <img
                            src="{{ asset('images/diet-plan.jpg') }}"
                            alt=""
                            class="h-64 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-72"
                        />

                        <div class="relative border border-[#543A14] bg-[#543A14] p-6">
                            <p class="text-[#F0BB78]">
                            Rp.30.000.00
                            <span class="text-red-500 line-through">Rp.40.000.00</span>
                            </p>

                            <h3 class="mt-1.5 text-xl font-medium text-[#F0BB78]">Diet Plan</h3>

                            <ul class="space-y-2 my-5">
                                <li class="flex items-center">
                                    <i class="fi fi-sr-check-circle text-[#F0BB78]"></i>
                                    <span class="text-base font-normal leading-tight dark:text-[#FFF0DC] ms-3">Salad menggunakan sayur premium</span>
                                </li>
                                <li class="flex items-center">
                                    <i class="fi fi-sr-check-circle text-[#F0BB78]"></i>
                                    <span class="text-base font-normal leading-tight dark:text-[#FFF0DC] ms-3">Dada ayam & Telur omega</span>
                                </li>
                                <li class="flex items-center">
                                    <i class="fi fi-sr-check-circle text-[#F0BB78]"></i>
                                    <span class="text-base font-normal leading-tight dark:text-[#FFF0DC] ms-3">Oats Meal</span>
                                </li>
                                 <li class="flex items-center line-through text-gray-500">
                                    <i class="fi fi-sr-check-circle text-gray-500"></i>
                                    <span class="text-base font-normal leading-tight text-gray-500 ms-3">Salad</span>
                                </li>
                                <li class="flex items-center line-through text-gray-500">
                                    <i class="fi fi-sr-check-circle text-gray-500"></i>
                                    <span class="text-base font-normal leading-tight text-gray-500 ms-3">Infused Water </span>
                                </li>
                            </ul>

                            <form class="mt-4 flex gap-4">
                                <button
                                    class="block w-full rounded-sm bg-gray-100 px-4 py-3 text-sm font-medium text-gray-900 transition hover:scale-105"
                                >
                                    Add to Cart
                                </button>

                                <button
                                    type="button"
                                    class="block w-full rounded-sm bg-gray-900 px-4 py-3 text-sm font-medium text-white transition hover:scale-105"
                                >
                                    Beli Plan
                                </button>
                            </form>
                        </div>
                    </a>
                </div>
                <div class="group p-6 rounded">
                    <a href="#" class="group relative block overflow-hidden">
                        <button
                            class="absolute end-4 top-4 z-10 rounded-full bg-white p-1.5 text-gray-900 transition hover:text-gray-900/75"
                        >
                            <span class="sr-only">Wishlist</span>

                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-4"
                            >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                            />
                            </svg>
                        </button>

                        <img
                            src="{{ asset('images/royal-plan.jpg') }}"
                            alt=""
                            class="h-64 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-72"
                        />

                        <div class="relative border border-[#543A14] bg-[#543A14] p-6">
                            <p class="text-[#F0BB78]">
                            Rp.60.000.00
                            <span class="text-red-500 line-through">Rp.80.000.00</span>
                            </p>

                            <h3 class="mt-1.5 text-lg font-medium text-[#F0BB78]">Royal Plan</h3>

                             <ul class="space-y-2 my-5">
                                <li class="flex items-center">
                                    <i class="fi fi-sr-check-circle text-[#F0BB78]"></i>
                                    <span class="text-base font-normal leading-tight dark:text-[#FFF0DC] ms-3">Nasi Merah & Quinoa</span>
                                </li>
                                <li class="flex items-center">
                                    <i class="fi fi-sr-check-circle text-[#F0BB78]"></i>
                                    <span class="text-base font-normal leading-tight dark:text-[#FFF0DC] ms-3">Dada ayam, Ikan Salmon, Wagyu A5</span>
                                </li>
                                <li class="flex items-center">
                                    <i class="fi fi-sr-check-circle text-[#F0BB78]"></i>
                                    <span class="text-base font-normal leading-tight dark:text-[#FFF0DC] ms-3">Salad</span>
                                </li>
                                <li class="flex items-center">
                                    <i class="fi fi-sr-check-circle text-[#F0BB78]"></i>
                                    <span class="text-base font-normal leading-tight dark:text-[#FFF0DC] ms-3">Oats dan Kentang</span>
                                </li>
                                <li class="flex items-center">
                                    <i class="fi fi-sr-check-circle text-[#F0BB78]"></i>
                                    <span class="text-base font-normal leading-tight dark:text-[#FFF0DC] ms-3">Infused Water </span>
                                </li>
                            </ul>

                            <form class="mt-4 flex gap-4">
                                <button
                                    class="block w-full rounded-sm bg-gray-100 px-4 py-3 text-sm font-medium text-gray-900 transition hover:scale-105"
                                >
                                    Add to Cart
                                </button>

                                <button
                                    type="button"
                                    class="block w-full rounded-sm bg-gray-900 px-4 py-3 text-sm font-medium text-white transition hover:scale-105"
                                >
                                    Beli Plan
                                </button>
                            </form>
                        </div>
                    </a>
                </div>
                <div class="group p-6 rounded">
                    <a href="#" class="group relative block overflow-hidden">
                        <button
                            class="absolute end-4 top-4 z-10 rounded-full bg-white p-1.5 text-gray-900 transition hover:text-gray-900/75"
                        >
                            <span class="sr-only">Wishlist</span>

                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-4"
                            >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                            />
                            </svg>
                        </button>

                        <img
                            src="{{ asset('images/protein-plan.jpg') }}"
                            alt=""
                            class="h-64 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-72"
                        />

                        <div class="relative border border-[#543A14] bg-[#543A14] p-6">
                            <p class="text-[#F0BB78]">
                            Rp.40.000.00
                            <span class="text-red-500 line-through">Rp.50.000.00</span>
                            </p>

                            <h3 class="mt-1.5 text-xl font-medium text-[#F0BB78]">Protein Plan</h3>

                             <ul class="space-y-2 my-5">
                                <li class="flex items-center">
                                    <i class="fi fi-sr-check-circle text-[#F0BB78]"></i>
                                    <span class="text-base font-normal leading-tight dark:text-[#FFF0DC] ms-3">Dada Ayam panggang, Telur Omega, Ikan Kerapu</span>
                                </li>
                                <li class="flex items-center">
                                    <i class="fi fi-sr-check-circle text-[#F0BB78]"></i>
                                    <span class="text-base font-normal leading-tight dark:text-[#FFF0DC] ms-3">Sayuran Hijau dan Brokoli</span>
                                </li>
                                <li class="flex items-center">
                                    <i class="fi fi-sr-check-circle text-[#F0BB78]"></i>
                                    <span class="text-base font-normal leading-tight dark:text-[#FFF0DC] ms-3">Nasi Jepang dan kentangl</span>
                                </li>
                                <li class="flex items-center">
                                    <i class="fi fi-sr-check-circle text-[#F0BB78]"></i>
                                    <span class="text-base font-normal leading-tight dark:text-[#FFF0DC] ms-3">Olive Oil</span>
                                </li>
                            </ul>

                            <form class="mt-4 flex gap-4">
                                <button
                                    class="block w-full rounded-sm bg-gray-100 px-4 py-3 text-sm font-medium text-gray-900 transition hover:scale-105"
                                >
                                    Add to Cart
                                </button>

                                <button
                                    type="button"
                                    class="block w-full rounded-sm bg-gray-900 px-4 py-3 text-sm font-medium text-white transition hover:scale-105"
                                >
                                    Beli Plan
                                </button>
                            </form>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        {{-- Testimoni --}}
        <section id="testimoni" class="bg-[#FFF0DC] py-20 px-4 sm:px-6 lg:px-20 font-poppins">
            <div class="max-w-7xl mx-auto text-center">
                <h2 class="text-3xl sm:text-4xl font-bold text-[#131010] font-playFair">Apa Kata Pelanggan Kami?</h2>
                <p class="mt-4 text-[#543A14] text-base sm:text-lg">
                Testimoni dari pelanggan setia yang telah merasakan manfaat SEA Catering
                </p>
            </div>

            <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Testimonial 1 -->
                <div class="bg-white shadow-xl rounded-3xl p-8 text-[#131010]">
                <div class="flex items-center gap-4 mb-4">
                    <img class="w-14 h-14 rounded-full object-cover" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Customer 1">
                    <div>
                    <h3 class="font-semibold text-lg">Ayu Lestari</h3>
                    <p class="text-sm text-[#543A14]">Karyawan Swasta</p>
                    </div>
                </div>
                <p class="text-sm text-[#543A14]">
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
                <p class="text-sm text-[#543A14]">
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
                <p class="text-sm text-[#543A14]">
                    “Royal Plan bikin hidup saya jauh lebih praktis. Sekali pesan, langsung dapat makanan sehat setiap hari. Rasanya mewah tapi tetap sehat.”
                </p>
                <div class="mt-4 text-yellow-500">
                    ★★★★★
                </div>
                </div>
            </div>
        </section>
        {{-- end --}}

        {{-- Footer --}}
        <footer id="contact" class="w-full bg-[#0f0f1a] text-white font-poppins">
            <div class="max-w-screen-xl mx-auto px-6 py-16 grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="flex items-center justify-center">
                    <svg width="100px" height="100px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#F0BB78" d="M128 352.576V352a288 288 0 0 1 491.072-204.224 192 192 0 0 1 274.24 204.48 64 64 0 0 1 57.216 74.24C921.6 600.512 850.048 710.656 736 756.992V800a96 96 0 0 1-96 96H384a96 96 0 0 1-96-96v-43.008c-114.048-46.336-185.6-156.48-214.528-330.496A64 64 0 0 1 128 352.64zm64-.576h64a160 160 0 0 1 320 0h64a224 224 0 0 0-448 0zm128 0h192a96 96 0 0 0-192 0zm439.424 0h68.544A128.256 128.256 0 0 0 704 192c-15.36 0-29.952 2.688-43.52 7.616 11.328 18.176 20.672 37.76 27.84 58.304A64.128 64.128 0 0 1 759.424 352zM672 768H352v32a32 32 0 0 0 32 32h256a32 32 0 0 0 32-32v-32zm-342.528-64h365.056c101.504-32.64 165.76-124.928 192.896-288H136.576c27.136 163.072 91.392 255.36 192.896 288z"/></svg>
                </div>
                <div>
                <h2 class="text-2xl font-semibold font-playFair tracking-wider text-[#FFD586]">SeaCatering</h2>
                <p class="mt-4 text-sm text-gray-400 leading-relaxed">
                    SEA Catering hadir memberikan solusi makanan sehat untuk Anda, dengan pengiriman cepat, terjadwal, dan penuh nutrisi. Hidup sehat kini makin mudah!
                </p>
                </div>

                <!-- Contact -->
                <div>
                <h3 class="text-xl font-semibold mb-4 text-[#FFD586]">Kontak Kami</h3>
                <ul class="space-y-2 text-sm text-gray-300">
                    <li><strong>Manager:</strong> Brian</li>
                    <li><strong>Telepon:</strong> <a href="tel:08123456789" class="hover:text-[#FFD586]">08123456789</a></li>
                    <li><strong>Email:</strong> <a href="mailto:info@seacatering.id" class="hover:text-[#FFD586]">info@seacatering.id</a></li>
                </ul>
                </div>

                <!-- Navigation -->
                <div>
                <h3 class="text-xl font-semibold mb-4 text-[#FFD586]">Navigasi</h3>
                <ul class="space-y-2 text-sm text-gray-300">
                    <li><a href="#" class="hover:text-[#FFD586]">Beranda</a></li>
                    <li><a href="#" class="hover:text-[#FFD586]">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-[#FFD586]">Paket Makanan</a></li>
                    <li><a href="#" class="hover:text-[#FFD586]">Langganan</a></li>
                    <li><a href="#" class="hover:text-[#FFD586]">Kontak</a></li>
                </ul>
                </div>
            </div>

            <!-- Footer bottom -->
            <div class="border-t border-gray-700 mt-12">
                <div class="max-w-screen-xl mx-auto px-6 py-6 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
                <p>&copy; 2025 SEA Catering. All rights reserved.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="hover:text-[#FFD586]">Privacy Policy</a>
                    <a href="#" class="hover:text-[#FFD586]">Terms</a>
                    <a href="#" class="hover:text-[#FFD586]">Cookies</a>
                </div>
                </div>
            </div>
        </footer>
        {{-- end --}}
        <script>
                const menu = document.querySelector('#navbar-sea');
                const btn = document.querySelector('#navbar-sea-btn');

                btn.addEventListener('click', () => {
                    menu.classList.toggle('hidden');
                    console.log(menu)
                })
        </script>
    </body>
</html>