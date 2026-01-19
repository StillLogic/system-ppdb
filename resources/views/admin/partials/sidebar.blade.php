<aside class="w-64 bg-gradient-to-b from-blue-900 to-emerald-800 text-white flex-shrink-0">
    <div class="p-6">
        <div class="text-center mb-8">
            <div class="text-4xl mb-2">🕌</div>
            <h1 class="text-xl font-bold">PPDB Pesantren</h1>
            <p class="text-xs text-white/70">Admin Panel</p>
        </div>

        <nav class="space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }} rounded-lg transition">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Dashboard
            </a>
            <a href="{{ route('admin.pendaftar.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.pendaftar.*') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }} rounded-lg transition">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                Data Pendaftar
            </a>
            <a href="{{ route('admin.akun') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.akun') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }} rounded-lg transition">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Manajemen Akun
            </a>
        </nav>
    </div>

    <div class="absolute bottom-0 w-64 p-6 border-t border-white/20">
        <div class="flex items-center mb-3">
            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center mr-3">
                <span class="text-lg font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
            </div>
            <div>
                <p class="font-semibold text-sm">{{ Auth::user()->name }}</p>
                <p class="text-xs text-white/70">Administrator</p>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg text-sm font-semibold transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>
