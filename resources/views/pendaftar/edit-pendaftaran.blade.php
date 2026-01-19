<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.head')
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
                        <p class="text-xs text-white/70">Edit Data Pendaftaran</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('pendaftar.dashboard') }}" class="px-4 py-2 bg-white/20 hover:bg-white/30 rounded-lg text-sm font-semibold transition">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-md p-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Edit Data Pendaftaran</h2>
                <p class="text-sm text-gray-600 mt-1">Nomor Pendaftaran: <span class="font-semibold text-blue-900">{{ $pendaftaran->nomor_pendaftaran }}</span></p>
            </div>
            
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700 font-semibold mb-2">Terdapat kesalahan:</p>
                            <ul class="list-disc list-inside text-sm text-red-700">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            @include('components.toast')

            <form method="POST" action="{{ route('pendaftar.pendaftaran.update') }}" class="space-y-8">
                @csrf
                @method('PUT')

                <!-- Data Pribadi -->
                <div class="border-b pb-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Data Pribadi Santri
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="nama_lengkap" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" required value="{{ old('nama_lengkap', $pendaftaran->nama_lengkap) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label for="jenis_kelamin" class="block text-sm font-semibold text-gray-700 mb-2">
                                Jenis Kelamin <span class="text-red-500">*</span>
                            </label>
                            <select name="jenis_kelamin" id="jenis_kelamin" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="laki-laki" {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="perempuan" {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div>
                            <label for="tempat_lahir" class="block text-sm font-semibold text-gray-700 mb-2">
                                Tempat Lahir <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" required value="{{ old('tempat_lahir', $pendaftaran->tempat_lahir) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label for="tanggal_lahir" class="block text-sm font-semibold text-gray-700 mb-2">
                                Tanggal Lahir <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" required value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label for="no_telepon" class="block text-sm font-semibold text-gray-700 mb-2">
                                No. Telepon <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" name="no_telepon" id="no_telepon" required value="{{ old('no_telepon', $pendaftaran->no_telepon) }}"
                                placeholder="081234567890"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label for="asal_sekolah" class="block text-sm font-semibold text-gray-700 mb-2">
                                Asal Sekolah <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="asal_sekolah" id="asal_sekolah" required value="{{ old('asal_sekolah', $pendaftaran->asal_sekolah) }}"
                                placeholder="SMP Negeri 1 Jakarta"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- Data Orang Tua -->
                <div class="border-b pb-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Data Orang Tua / Wali
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nama_ayah" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Ayah <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama_ayah" id="nama_ayah" required value="{{ old('nama_ayah', $pendaftaran->nama_ayah) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label for="nama_ibu" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Ibu <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama_ibu" id="nama_ibu" required value="{{ old('nama_ibu', $pendaftaran->nama_ibu) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label for="pekerjaan_ayah" class="block text-sm font-semibold text-gray-700 mb-2">
                                Pekerjaan Ayah <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" required value="{{ old('pekerjaan_ayah', $pendaftaran->pekerjaan_ayah) }}"
                                placeholder="Wiraswasta"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label for="pekerjaan_ibu" class="block text-sm font-semibold text-gray-700 mb-2">
                                Pekerjaan Ibu
                            </label>
                            <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" value="{{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu) }}"
                                placeholder="Ibu Rumah Tangga"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label for="no_telepon_ortu" class="block text-sm font-semibold text-gray-700 mb-2">
                                No. Telepon Orang Tua <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" name="no_telepon_ortu" id="no_telepon_ortu" required value="{{ old('no_telepon_ortu', $pendaftaran->no_telepon_ortu) }}"
                                placeholder="081298765432"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="pb-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Alamat Lengkap
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="alamat_lengkap" class="block text-sm font-semibold text-gray-700 mb-2">
                                Alamat Lengkap <span class="text-red-500">*</span>
                            </label>
                            <textarea name="alamat_lengkap" id="alamat_lengkap" required rows="3"
                                placeholder="Jl. Contoh No. 123"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('alamat_lengkap', $pendaftaran->alamat_lengkap) }}</textarea>
                        </div>

                        <div>
                            <label for="rt_rw" class="block text-sm font-semibold text-gray-700 mb-2">
                                RT/RW <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="rt_rw" id="rt_rw" required value="{{ old('rt_rw', $pendaftaran->rt_rw) }}"
                                placeholder="0502"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label for="kelurahan" class="block text-sm font-semibold text-gray-700 mb-2">
                                Kelurahan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="kelurahan" id="kelurahan" required value="{{ old('kelurahan', $pendaftaran->kelurahan) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label for="kecamatan" class="block text-sm font-semibold text-gray-700 mb-2">
                                Kecamatan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="kecamatan" id="kecamatan" required value="{{ old('kecamatan', $pendaftaran->kecamatan) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label for="kota" class="block text-sm font-semibold text-gray-700 mb-2">
                                Kota/Kabupaten <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="kota" id="kota" required value="{{ old('kota', $pendaftaran->kota) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label for="provinsi" class="block text-sm font-semibold text-gray-700 mb-2">
                                Provinsi <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="provinsi" id="provinsi" required value="{{ old('provinsi', $pendaftaran->provinsi) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label for="kode_pos" class="block text-sm font-semibold text-gray-700 mb-2">
                                Kode Pos <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="kode_pos" id="kode_pos" required value="{{ old('kode_pos', $pendaftaran->kode_pos) }}"
                                placeholder="10310"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4 pt-6 border-t">
                    <a href="{{ route('pendaftar.dashboard') }}" class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold rounded-lg transition">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-900 to-emerald-700 hover:from-blue-800 hover:to-emerald-600 text-white font-semibold rounded-lg transition shadow-lg">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
