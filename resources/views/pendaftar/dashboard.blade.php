<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pendaftar - PPDB Pondok Pesantren</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-gradient-to-r from-blue-900 to-emerald-700 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <span class="text-2xl mr-2">🕌</span>
                    <div>
                        <h1 class="text-lg font-bold">PPDB Pondok Pesantren</h1>
                        <p class="text-xs text-white/70">Portal Pendaftar</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-right mr-4">
                        <p class="font-semibold text-sm">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-white/70">Pendaftar</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg text-sm font-semibold transition">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p class="text-gray-600">Kelola pendaftaran Anda dan pantau status pendaftaran santri baru.</p>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700 font-semibold">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700 font-semibold">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if(!$pendaftaran)
            <!-- Belum Mendaftar -->
            <div class="bg-yellow-50 border-l-4 border-yellow-500 p-6 rounded-lg mb-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-4 flex-1">
                        <h3 class="text-lg font-bold text-yellow-800 mb-2">Anda Belum Melakukan Pendaftaran</h3>
                        <p class="text-yellow-700 mb-4">
                            Silakan lengkapi formulir pendaftaran santri baru untuk melanjutkan proses penerimaan di Pondok Pesantren kami.
                        </p>
                        <a href="{{ route('pendaftar.pendaftaran.create') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg transition shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Isi Formulir Pendaftaran
                        </a>
                    </div>
                </div>
            </div>

            <!-- Info Persyaratan -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Persyaratan Pendaftaran</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-start">
                        <span class="text-green-600 mr-3">✓</span>
                        <span class="text-gray-700">Usia maksimal 17 tahun</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-green-600 mr-3">✓</span>
                        <span class="text-gray-700">Beragama Islam</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-green-600 mr-3">✓</span>
                        <span class="text-gray-700">Lulus SD/MI atau SMP/MTs</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-green-600 mr-3">✓</span>
                        <span class="text-gray-700">Sehat jasmani dan rohani</span>
                    </div>
                </div>
            </div>
        @else
            <!-- Sudah Mendaftar - Tampilkan Data -->

        <!-- Status Pendaftaran -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- Status Card -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Status Pendaftaran</h3>
                    <div class="w-12 h-12 {{ $pendaftaran->status == 'pending' ? 'bg-yellow-100' : ($pendaftaran->status == 'diterima' ? 'bg-green-100' : 'bg-red-100') }} rounded-full flex items-center justify-center">
                        @if($pendaftaran->status == 'pending')
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @elseif($pendaftaran->status == 'diterima')
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @else
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @endif
                    </div>
                </div>
                <div class="text-center">
                    <span class="inline-block px-6 py-3 {{ $pendaftaran->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : ($pendaftaran->status == 'diterima' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }} rounded-full font-bold text-lg">
                        {{ ucfirst($pendaftaran->status) }}
                    </span>
                    <p class="text-sm text-gray-600 mt-3">
                        @if($pendaftaran->status == 'pending')
                            Data Anda sedang dalam proses verifikasi oleh admin
                        @elseif($pendaftaran->status == 'diterima')
                            Selamat! Anda diterima sebagai santri baru
                        @else
                            Pendaftaran Anda tidak dapat diproses
                        @endif
                    </p>
                </div>
            </div>

            <!-- Nomor Pendaftaran -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Nomor Pendaftaran</h3>
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                        </svg>
                    </div>
                </div>
                <div class="text-center">
                    <p class="text-3xl font-bold text-blue-600">{{ $pendaftaran->nomor_pendaftaran }}</p>
                    <p class="text-sm text-gray-600 mt-2">Simpan nomor ini untuk referensi</p>
                </div>
            </div>

            <!-- Tanggal Daftar -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Tanggal Daftar</h3>
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
                <div class="text-center">
                    <p class="text-2xl font-bold text-gray-900">{{ $pendaftaran->created_at->format('d F Y') }}</p>
                    <p class="text-sm text-gray-600 mt-2">Pukul {{ $pendaftaran->created_at->format('H:i') }} WIB</p>
                </div>
            </div>
        </div>

        <!-- Form Pendaftaran & Timeline -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Form Pendaftaran -->
            <div class="lg:col-span-2 bg-white rounded-lg shadow-md">
                <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-900">Data Pendaftaran</h3>
                    @if($pendaftaran->status == 'pending')
                        <a href="{{ route('pendaftar.pendaftaran.edit') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition">
                            Edit Data
                        </a>
                    @endif
                </div>
                <div class="p-6">
                    <div class="space-y-6">
                        <!-- Data Pribadi -->
                        <div>
                            <h4 class="font-bold text-gray-900 mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Data Pribadi
                            </h4>
                            <div class="grid grid-cols-2 gap-4 bg-gray-50 p-4 rounded-lg">
                                <div>
                                    <p class="text-sm text-gray-600">Nama Lengkap</p>
                                    <p class="font-semibold text-gray-900">{{ $pendaftaran->nama_lengkap }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Email</p>
                                    <p class="font-semibold text-gray-900">{{ Auth::user()->email }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Jenis Kelamin</p>
                                    <p class="font-semibold text-gray-900">{{ ucfirst($pendaftaran->jenis_kelamin) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Tempat, Tanggal Lahir</p>
                                    <p class="font-semibold text-gray-900">{{ $pendaftaran->tempat_lahir }}, {{ $pendaftaran->tanggal_lahir->format('d M Y') }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">No. Telepon</p>
                                    <p class="font-semibold text-gray-900">{{ $pendaftaran->no_telepon }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Asal Sekolah</p>
                                    <p class="font-semibold text-gray-900">{{ $pendaftaran->asal_sekolah }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Data Orang Tua -->
                        <div>
                            <h4 class="font-bold text-gray-900 mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                Data Orang Tua / Wali
                            </h4>
                            <div class="grid grid-cols-2 gap-4 bg-gray-50 p-4 rounded-lg">
                                <div>
                                    <p class="text-sm text-gray-600">Nama Ayah</p>
                                    <p class="font-semibold text-gray-900">{{ $pendaftaran->nama_ayah }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Nama Ibu</p>
                                    <p class="font-semibold text-gray-900">{{ $pendaftaran->nama_ibu }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Pekerjaan Ayah</p>
                                    <p class="font-semibold text-gray-900">{{ $pendaftaran->pekerjaan_ayah }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">No. Telepon Ortu</p>
                                    <p class="font-semibold text-gray-900">{{ $pendaftaran->no_telepon_ortu }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div>
                            <h4 class="font-bold text-gray-900 mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Alamat
                            </h4>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-gray-900">{{ $pendaftaran->alamat_lengkap }}, RT/RW {{ $pendaftaran->rt_rw }}, {{ $pendaftaran->kelurahan }}, {{ $pendaftaran->kecamatan }}, {{ $pendaftaran->kota }}, {{ $pendaftaran->provinsi }} {{ $pendaftaran->kode_pos }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Timeline & Info -->
            <div class="space-y-6">
                <!-- Timeline Proses -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Timeline Proses</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="font-semibold text-gray-900">Pendaftaran</p>
                                <p class="text-sm text-gray-600">Selesai - {{ $pendaftaran->created_at->format('d M Y') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 {{ $pendaftaran->status == 'pending' ? 'bg-yellow-500 animate-pulse' : ($pendaftaran->status == 'diterima' ? 'bg-green-500' : 'bg-red-500') }} rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        @if($pendaftaran->status == 'pending')
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                        @else
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        @endif
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="font-semibold text-gray-900">Verifikasi</p>
                                <p class="text-sm text-gray-600">
                                    @if($pendaftaran->status == 'pending')
                                        Sedang Proses
                                    @elseif($pendaftaran->status == 'diterima')
                                        Diterima
                                    @else
                                        Ditolak
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start {{ $pendaftaran->status == 'pending' ? 'opacity-50' : '' }}">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 {{ $pendaftaran->status == 'diterima' ? 'bg-green-500' : 'bg-gray-300' }} rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="font-semibold text-gray-900">Tes Wawancara</p>
                                <p class="text-sm text-gray-600">Menunggu</p>
                            </div>
                        </div>

                        <div class="flex items-start opacity-50">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                                        <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="font-semibold text-gray-900">Pengumuman</p>
                                <p class="text-sm text-gray-600">Menunggu</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info Penting -->
                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
                    <div class="flex items-start">
                        <svg class="h-5 w-5 text-blue-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        <div class="ml-3">
                            <p class="text-sm font-semibold text-blue-800 mb-1">Info Penting</p>
                            <p class="text-sm text-blue-700">Pastikan nomor telepon yang tercantum aktif. Admin akan menghubungi Anda untuk proses selanjutnya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </main>
</body>
</html>
