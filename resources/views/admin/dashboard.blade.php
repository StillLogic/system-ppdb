<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.head')
</head>
<body class="bg-gray-100">
    <!-- Sidebar -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-blue-900 to-emerald-800 text-white flex-shrink-0">
            <div class="p-6">
                <div class="text-center mb-8">
                    <div class="text-4xl mb-2">🕌</div>
                    <h1 class="text-xl font-bold">PPDB Pesantren</h1>
                    <p class="text-xs text-white/70">Admin Panel</p>
                </div>

                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 bg-white/20 rounded-lg font-semibold">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.pendaftar.index') }}" class="flex items-center px-4 py-3 hover:bg-white/10 rounded-lg transition">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        Data Pendaftar
                    </a>
                    <a href="{{ route('admin.akun') }}" class="flex items-center px-4 py-3 hover:bg-white/10 rounded-lg transition">
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

        
        <main class="flex-1 overflow-y-auto">
            
            <header class="bg-white shadow-sm">
                <div class="px-8 py-6">
                    <h2 class="text-2xl font-bold text-gray-900">Dashboard Admin</h2>
                    <p class="text-gray-600">Selamat datang kembali, {{ Auth::user()->name }}!</p>
                </div>
            </header>

            
            <div class="p-8">
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Total Pendaftar -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Total Pendaftar</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $totalPendaftar }}</p>
                                <p class="text-xs text-gray-500 mt-1">Total keseluruhan</p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Menunggu Verifikasi -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Menunggu Verifikasi</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $pending }}</p>
                                <p class="text-xs text-yellow-600 mt-1">Perlu ditinjau</p>
                            </div>
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Diterima -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Diterima</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $diterima }}</p>
                                <p class="text-xs text-green-600 mt-1">{{ $totalPendaftar > 0 ? round(($diterima / $totalPendaftar) * 100) : 0 }}% dari total</p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Ditolak -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Ditolak</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $ditolak }}</p>
                                <p class="text-xs text-red-600 mt-1">{{ $totalPendaftar > 0 ? round(($ditolak / $totalPendaftar) * 100) : 0 }}% dari total</p>
                            </div>
                            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities & Quick Actions -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Recent Pendaftar -->
                    <div class="lg:col-span-2 bg-white rounded-lg shadow-md">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-bold text-gray-900">Pendaftar Terbaru</h3>
                        </div>
                        <div class="p-6">
                            @if($recentPendaftar->count() > 0)
                                <div class="space-y-4">
                                    @foreach($recentPendaftar as $pendaftar)
                                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 bg-{{ $pendaftar->status == 'pending' ? 'yellow' : ($pendaftar->status == 'diterima' ? 'green' : 'red') }}-600 rounded-full flex items-center justify-center text-white font-bold mr-3">
                                                    {{ substr($pendaftar->nama_lengkap, 0, 1) }}
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-gray-900">{{ $pendaftar->nama_lengkap }}</p>
                                                    <p class="text-sm text-gray-600">{{ $pendaftar->user->email }}</p>
                                                    <p class="text-xs text-gray-500 mt-1">{{ $pendaftar->nomor_pendaftaran }}</p>
                                                </div>
                                            </div>
                                            <span class="px-3 py-1 bg-{{ $pendaftar->status == 'pending' ? 'yellow' : ($pendaftar->status == 'diterima' ? 'green' : 'red') }}-100 text-{{ $pendaftar->status == 'pending' ? 'yellow' : ($pendaftar->status == 'diterima' ? 'green' : 'red') }}-800 text-xs font-semibold rounded-full">
                                                {{ ucfirst($pendaftar->status) }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-8">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                    </svg>
                                    <p class="mt-2 text-sm text-gray-500">Belum ada pendaftar</p>
                                </div>
                            @endif

                            @if($totalPendaftar > 5)
                                <div class="mt-4 text-center">
                                    <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">
                                        Lihat Semua ({{ $totalPendaftar }}) →
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white rounded-lg shadow-md">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-bold text-gray-900">Quick Actions</h3>
                        </div>
                        <div class="p-6">
                            <div class="space-y-3">
                                <a href="{{ route('admin.pendaftar.create') }}" class="w-full flex items-center px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                    </svg>
                                    Tambah Pendaftar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
