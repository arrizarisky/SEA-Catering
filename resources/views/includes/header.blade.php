        {{-- Navbar --}}
<header class="fixed top-0 w-full text-sm mb-6 not-has-[nav]:hidden z-[99999]">
            @if (Route::has('login'))
            <nav class="flex flex-wrap items-center pt-10 z-99 relative mx-auto max-w-screen-xl md-order-1 justify-between gap-4 font-playFair border-b border-[#543A14]/10 pb-2">
                    <div class="hidden lg:flex home space-x-6 text-xl">
                        <a href="" class="text-[#131010] font-bold hover:text-white hover:border-b-[2px] border-[#B13BFF] transition">Beranda</a>
                        <a href="{{ route('menuCatering') }}" class="text-[#131010] font-bold hover:text-white hover:border-b-[2px] border-[#B13BFF] transition">Menu</a>
                        <a href="{{ route('Testimoni') }}" class="text-[#131010] font-bold hover:text-white hover:border-b-[2px] border-[#B13BFF] transition">Testimoni</a>
                    </div>    
                    <div class="flex space-x-2">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 512.000000 512.000000"preserveAspectRatio="xMidYMid meet">

                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                            fill="#131010" stroke="none">
                            <path d="M2335 5057 c-46 -26 -80 -73 -96 -131 -9 -33 -7 -54 9 -116 11 -41
                            19 -77 17 -78 -2 -2 -52 -12 -111 -23 -387 -67 -755 -241 -1060 -502 -401
                            -343 -670 -826 -749 -1349 -23 -152 -21 -182 17 -223 41 -45 90 -55 142 -30
                            49 24 62 53 81 181 33 223 85 394 184 599 288 597 846 1001 1511 1096 134 19
                            448 17 575 -5 669 -112 1203 -513 1490 -1119 84 -178 139 -361 170 -571 18
                            -123 36 -158 91 -176 53 -18 97 -5 135 37 31 36 32 38 26 114 -21 271 -141
                            630 -297 892 -327 550 -886 941 -1500 1051 -52 10 -104 19 -116 22 l-21 4 19
                            72 c20 78 17 120 -12 178 -21 40 -42 61 -87 84 -26 13 -65 16 -205 16 -161 0
                            -176 -2 -213 -23z m260 -259 c-10 -45 -12 -48 -45 -48 -21 0 -29 6 -34 24 -3
                            13 -9 31 -12 40 -5 13 2 16 46 16 l52 0 -7 -32z"/>
                            <path d="M3088 4145 c-53 -30 -73 -107 -43 -165 12 -23 45 -43 148 -93 322
                            -156 532 -385 657 -717 30 -77 43 -99 71 -118 69 -47 170 -5 185 76 14 73 -73
                            281 -193 461 -139 209 -346 390 -581 508 -126 63 -194 76 -244 48z"/>
                            <path d="M104 2446 c-45 -20 -74 -62 -74 -108 0 -83 52 -128 147 -128 l60 0
                            14 -42 c35 -106 135 -216 243 -267 95 -45 146 -51 424 -51 l257 0 309 -375
                            309 -375 371 -353 c204 -194 386 -367 405 -383 l34 -30 -66 -47 c-53 -38 -69
                            -56 -78 -86 -15 -51 -5 -87 36 -128 27 -27 40 -33 78 -33 42 0 68 17 518 331
                            261 183 484 338 495 346 20 13 31 5 197 -151 96 -90 184 -169 195 -175 63 -33
                            149 4 172 74 21 64 4 90 -183 268 -324 308 -300 289 -362 285 -63 -4 -65 -1
                            -65 99 0 72 30 164 81 248 18 30 109 139 202 243 100 112 170 198 174 215 l6
                            27 219 0 c162 0 237 4 288 16 150 34 288 155 336 298 l16 46 74 0 c86 0 126
                            16 149 60 35 69 8 147 -61 176 -49 21 -4873 20 -4920 0z m4486 -244 c0 -16
                            -56 -61 -100 -81 -45 -20 -55 -21 -1940 -21 -1885 0 -1895 1 -1940 21 -44 20
                            -100 65 -100 81 0 4 918 8 2040 8 1122 0 2040 -4 2040 -8z m-2695 -533 c116
                            -99 233 -192 260 -208 73 -42 234 -99 360 -129 247 -57 477 -18 662 114 25 17
                            113 99 196 181 150 146 207 187 296 213 l33 9 -18 -22 c-11 -12 -58 -65 -106
                            -118 -161 -180 -230 -294 -269 -447 -31 -123 -20 -293 26 -382 l15 -28 -267
                            -186 -266 -185 -27 19 c-14 10 -207 191 -427 402 -389 371 -408 391 -619 648
                            -119 146 -224 273 -232 283 -14 16 -10 17 79 17 l94 -1 210 -180z m1245 78
                            c-58 -56 -128 -115 -157 -130 -61 -32 -189 -67 -249 -67 -96 0 -329 62 -434
                            115 -34 18 -154 113 -229 181 -2 2 261 4 585 4 l589 0 -105 -103z"/>
                            </g>
                        </svg>
                        <h1 class="text-xl sm:text-3xl font-bold text-[#131010]">SEACatering</h1>
                    </div>

                    <button id="navbar-sea-btn" type="button"
                        class="flex lg:hidden items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg"
                        >
                        <i class="fi fi-sr-menu-food text-2xl text-[#543A14]"></i>
                    </button>

                    <div class="hidden lg:flex  space-x-2 text-xl w-full md:items-center md:w-auto">
                        
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
                            href="#"
                            class="block w-full rounded-xl px-4 py-2 hover:bg-[#FFD586] hover:text-[#543A14] transition"
                            >
                            Beranda
                            </a>
                        </li>
                        <li>
                            <a
                            href="#"
                            class="block w-full rounded-xl px-4 py-2 hover:bg-[#FFD586] hover:text-[#543A14] transition"
                            >
                            Menu
                            </a>
                        </li>
                        <li>
                            <a
                            href="#"
                            class="block w-full rounded-xl px-4 py-2 hover:bg-[#FFD586] hover:text-[#543A14] transition"
                            >
                            Testimoni
                            </a>
                        </li>
                        <li>
                            <a
                            href="#"
                            class="block w-full rounded-xl px-4 py-2 hover:bg-[#FFD586] hover:text-[#543A14] transition"
                            >
                            Langganan
                            </a>
                        </li>
                        <li>
                            <a
                            href="#"
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
        {{-- Navbar End --}}