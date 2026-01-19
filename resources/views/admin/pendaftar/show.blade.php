<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.head')
</head>
<body class="bg-gray-100">
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
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 hover:bg-white/10 rounded-lg transition">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.pendaftar.index') }}" class="flex items-center px-4 py-3 bg-white/20 rounded-lg font-semibold">
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

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="px-8 py-6 flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Detail Pendaftar</h2>
                        <p class="text-gray-600">{{ $pendaftaran->nomor_pendaftaran }}</p>
                    </div>
                    <a href="{{ route('admin.pendaftar.index') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold rounded-lg transition">
                        ← Kembali
                    </a>
                </div>
            </header>

            <!-- Content -->
            <div class="p-8">
                @include('components.toast')

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Main Info -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Data Pribadi -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Data Pribadi
                            </h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-600">Nama Lengkap</p>
                                    <p class="font-semibold text-gray-900">{{ $pendaftaran->nama_lengkap }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Jenis Kelamin</p>
                                    <p class="font-semibold text-gray-900">{{ ucfirst($pendaftaran->jenis_kelamin) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Tempat, Tanggal Lahir</p>
                                    <p class="font-semibold text-gray-900">{{ $pendaftaran->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->format('d M Y') }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">No. Telepon</p>
                                    <p class="font-semibold text-gray-900">{{ $pendaftaran->no_telepon }}</p>
                                </div>
                                <div class="col-span-2">
                                    <p class="text-sm text-gray-600">Asal Sekolah</p>
                                    <p class="font-semibold text-gray-900">{{ $pendaftaran->asal_sekolah }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Data Orang Tua -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                Data Orang Tua
                            </h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-600">Nama Ayah</p>
                                    <p class="font-semibold text-gray-900">{{ $pendaftaran->nama_ayah }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Pekerjaan Ayah</p>
                                    <p class="font-semibold text-gray-900">{{ $pendaftaran->pekerjaan_ayah }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Nama Ibu</p>
                                    <p class="font-semibold text-gray-900">{{ $pendaftaran->nama_ibu }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Pekerjaan Ibu</p>
                                    <p class="font-semibold text-gray-900">{{ $pendaftaran->pekerjaan_ibu ?? '-' }}</p>
                                </div>
                                <div class="col-span-2">
                                    <p class="text-sm text-gray-600">No. Telepon Orang Tua</p>
                                    <p class="font-semibold text-gray-900">{{ $pendaftaran->no_telepon_ortu }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Alamat
                            </h3>
                            <div class="space-y-2">
                                <p class="text-gray-900">{{ $pendaftaran->alamat_lengkap }}</p>
                                <p class="text-gray-700">RT/RW: {{ $pendaftaran->rt_rw }}</p>
                                <p class="text-gray-700">Kelurahan {{ $pendaftaran->kelurahan }}, Kecamatan {{ $pendaftaran->kecamatan }}</p>
                                <p class="text-gray-700">{{ $pendaftaran->kota }}, {{ $pendaftaran->provinsi }} {{ $pendaftaran->kode_pos }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Status & Actions -->
                    <div class="space-y-6">
                        <!-- Status Card -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Status Pendaftaran</h3>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm text-gray-600 mb-2">Status Saat Ini</p>
                                    <span class="px-4 py-2 inline-flex text-sm leading-5 font-semibold rounded-full 
                                        {{ $pendaftaran->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                        {{ $pendaftaran->status == 'diterima' ? 'bg-green-100 text-green-800' : '' }}
                                        {{ $pendaftaran->status == 'ditolak' ? 'bg-red-100 text-red-800' : '' }}">
                                        {{ ucfirst($pendaftaran->status) }}
                                    </span>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-600">Tanggal Daftar</p>
                                    <p class="font-semibold text-gray-900">{{ $pendaftaran->created_at->format('d M Y, H:i') }}</p>
                                </div>

                                @if($pendaftaran->catatan_admin)
                                    <div>
                                        <p class="text-sm text-gray-600 mb-2">Catatan Admin</p>
                                        <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $pendaftaran->catatan_admin }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Update Status Form -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Ubah Status</h3>
                            <form method="POST" action="{{ route('admin.pendaftar.update-status', $pendaftaran->id) }}">
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-4">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                                    <select name="status" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        <option value="pending" {{ $pendaftaran->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="diterima" {{ $pendaftaran->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                        <option value="ditolak" {{ $pendaftaran->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Catatan (opsional)</label>
                                    <textarea name="catatan_admin" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Tambahkan catatan...">{{ $pendaftaran->catatan_admin }}</textarea>
                                </div>

                                <button type="submit" class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition">
                                    Simpan Perubahan
                                </button>
                            </form>
                        </div>

                        <!-- Delete -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-lg font-bold text-red-600 mb-2">Hapus Data</h3>
                            <p class="text-sm text-gray-600 mb-4">Tindakan ini tidak dapat dibatalkan</p>
                            <form method="POST" action="{{ route('admin.pendaftar.destroy', $pendaftaran->id) }}" id="deleteForm">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="showConfirmModal('Yakin ingin menghapus data pendaftaran ini? Tindakan ini tidak dapat dibatalkan.', document.getElementById(\'deleteForm\'))" class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition">
                                    Hapus Data
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    @include('components.confirm-modal')
</body>
</html>
