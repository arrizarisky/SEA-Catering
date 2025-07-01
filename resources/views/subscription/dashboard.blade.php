<x-app-layout>
    <section class="bg-[#FFF0DC] dark:bg-[#131010] min-h-screen">
        <div class="p-8 md:p-12 lg:px-16 lg:py-40">
            <div class="mx-auto max-w-lg text-center">
                <h2 class="text-2xl font-bold text-gray-900 md:text-3xl dark:text-white">
                    Nikmati Masakan sehat dan fresh kami yang lainnya yuuk!!
                </h2>

                <p class="hidden text-gray-500 sm:mt-4 sm:block dark:text-gray-400 w-full">
                    Rasakan pengalaman baru menikmati makanan sehat yang lezat dan bergizi.
                    Kini hadir dalam paket eksklusif untuk kamu yang peduli kesehatan.
                    Dengan harga hemat, kamu bisa hidup sehat tanpa khawatir biaya.
                    SEA Catering, solusi sehat dan praktis untuk keseharianmu!
                                </p>
                </div>

                <div class="mx-auto mt-8 max-w-xl">
                <form action="#" class="sm:flex sm:gap-4">
                    <div class="sm:flex-1">
                    <label for="Search" class="sr-only">Search</label>

                    <input
                        type="search"
                        placeholder="Cari Paket makananmu"
                        class="w-full rounded-md border-gray-200 bg-white p-3 shadow-xs transition focus:border-white focus:ring-3 focus:ring-yellow-400 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                    />
                    </div>

                    <button
                    type="submit"
                    class="group mt-4 flex w-full items-center justify-center gap-2 rounded-md bg-[#F0BB78] px-5 py-3 text-white transition focus:ring-3 focus:ring-yellow-400 focus:outline-hidden sm:mt-0 sm:w-auto"
                    >
                    <span class="text-sm font-medium"> Explore </span>

                    <svg
                        class="size-5 shadow-sm rtl:rotate-180"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M17 8l4 4m0 0l-4 4m4-4H3"
                        />
                    </svg>
                    </button>
                </form>
            </div>
        </div>
    </section>
    
<script>
    setTimeout(function () {
           let alert = document.getElementById('success-alert');
           if (alert) {
               alert.remove(); // atau gunakan alert.classList.add('hidden');
           }
       }, 3000); 
</script>

</x-app-layout>
