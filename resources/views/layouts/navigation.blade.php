<nav x-data="{ open: false, sidebarOpen: window.innerWidth >= 1024 }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
   <button @click="sidebarOpen = !sidebarOpen"
    class="lg:hidden p-2 text-[#F0BB78] bg-[#543A14] rounded-md fixed top-4 left-4 z-50">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
    </button>
    <aside 
    :class="sidebarOpen ? 'translate-x-0 flex' : '-translate-x-full hidden'"
    class="fixed top-0 left-0 h-screen w-64 bg-[#131010] border-r border-[#F0BB78] transform transition-transform duration-300 ease-in-out z-40 flex-col">
        <!-- Logo -->
        <div class="flex items-center justify-center h-20 border-b border-[#F0BB78]">
            @auth
                <a href="{{ route(Auth::user()->role == 'admin' ? 'Beranda' : 'Beranda') }}">
                    <x-application-logo class="block h-12 w-12 fill-current text-[#F0BB78]" />
                </a>
            @endauth
        </div>
        <!-- Navigation Links -->
        <nav class="flex-1 px-4 py-6 space-y-2">
            @auth
                @if(Auth::user()->role == 'admin')
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="sidebar-link">
                        <span class="inline-flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#F0BB78]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0H7m6 0v6m0 0h6m-6 0H7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            Dashboard Admin
                        </span>
                    </x-nav-link>
                    <x-nav-link :href="route('admin.user.index')" :active="request()->routeIs('admin.user.index')" class="sidebar-link">
                        <span class="inline-flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#F0BB78]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            Manage Account
                        </span>
                    </x-nav-link>
                    <x-nav-link :href="route('admin.menus.index')" :active="request()->routeIs('menus.index')" class="sidebar-link">
                        <span class="inline-flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#F0BB78]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                                <path d="M8 15c0-2 8-2 8 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M9 10h.01M12 10h.01M15 10h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            Add Menu Makanan
                        </span>
                    </x-nav-link>
                    <x-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('categories.index')"  class="sidebar-link">
                        <span class="inline-flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#F0BB78]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <rect x="4" y="4" width="16" height="16" rx="4" stroke="currentColor" stroke-width="2"/>
                                <path d="M8 8h8v8H8z" stroke="currentColor" stroke-width="2"/>
                            </svg>
                            Add Category Makanan
                        </span>
                    </x-nav-link>
                @elseif(Auth::user()->role == 'pelanggan')
                    <x-nav-link :href="route('subscription.dashboard')" :active="request()->routeIs('subscription.dashboard')" class="sidebar-link">
                        <span class="inline-flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#F0BB78]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0H7m6 0v6m0 0h6m-6 0H7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            Dashboard Pelanggan
                        </span>
                    </x-nav-link>
                    <x-nav-link :href="route('subscription.account')" :active="request()->routeIs('subscription.account')" class="sidebar-link">
                        <span class="inline-flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#F0BB78]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            Manage Account
                        </span>
                    </x-nav-link>

                @endif
            @endauth
        </nav>
        <!-- User Dropdown -->
        <div class="px-4 py-4 border-t border-[#F0BB78]">
            <div class="flex items-center gap-3">
                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-[#F0BB78] flex items-center justify-center text-[#543A14] font-bold text-lg">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <div class="font-semibold text-[#F0BB78]">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-[#FFF0DC]">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="mt-4">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="w-full flex items-center justify-between px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-[#F0BB78] bg-[#543A14] hover:bg-[#131010] focus:outline-none transition">
                            <span>Menu</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <div class="absolute left-full top-0 ml-2 w-48 bg-[#FFF0DC] border border-gray-200 rounded-md shadow-lg -z-50">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </aside>
<style>
    .dropdown-menu-right-side {
    left: 100% !important;  /* buka ke kanan dari trigger */
    top: 0 !important;
}
.sidebar-link {
    @apply flex items-center gap-2 px-4 py-2 rounded-lg text-[#F0BB78] hover:bg-[#F0BB78]/20 hover:text-[#543A14] transition font-medium;
}
body { padding-left: 16rem; } /* shift main content right */
@media (max-width: 1024px) {
    aside { width: 100vw; position: relative; }
    body { padding-left: 0; }
}
</style>
</nav>
