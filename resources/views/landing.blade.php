<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB Pondok Pesantren - Tahun Ajaran 2025/2026</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .islamic-pattern {
            background-color: #f8fafc;
            background-image: 
                repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(30, 64, 175, 0.03) 35px, rgba(30, 64, 175, 0.03) 70px),
                repeating-linear-gradient(-45deg, transparent, transparent 35px, rgba(5, 150, 105, 0.03) 35px, rgba(5, 150, 105, 0.03) 70px);
        }
        
        .gradient-overlay {
            background: linear-gradient(135deg, rgba(30, 64, 175, 0.95) 0%, rgba(5, 150, 105, 0.95) 100%);
        }
        
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="islamic-pattern">
    <!-- Navbar -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-bold text-blue-900">🕌 PPDB Pesantren</h1>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#beranda" class="text-gray-700 hover:text-blue-900 px-3 py-2 rounded-md text-sm font-medium">Beranda</a>
                        <a href="#tentang" class="text-gray-700 hover:text-blue-900 px-3 py-2 rounded-md text-sm font-medium">Tentang</a>
                        <a href="#program" class="text-gray-700 hover:text-blue-900 px-3 py-2 rounded-md text-sm font-medium">Program</a>
                        <a href="#alur" class="text-gray-700 hover:text-blue-900 px-3 py-2 rounded-md text-sm font-medium">Alur Pendaftaran</a>
                        <a href="/login" class="bg-blue-900 text-white hover:bg-blue-800 px-4 py-2 rounded-md text-sm font-medium">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="relative py-20 lg:py-32 overflow-hidden">
        <div class="absolute inset-0 gradient-overlay"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-block mb-4">
                <span class="bg-yellow-500 text-blue-900 px-4 py-2 rounded-full text-sm font-semibold">Tahun Ajaran 2025/2026</span>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                Pendaftaran Santri Baru
            </h1>
            <p class="text-xl md:text-2xl text-white/90 mb-8 max-w-3xl mx-auto">
                Bergabunglah bersama kami untuk menuntut ilmu agama dan mengembangkan akhlakul karimah
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/login" class="bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-bold px-8 py-4 rounded-lg text-lg shadow-lg hover:shadow-xl transition duration-300">
                    Daftar Sekarang
                </a>
                <a href="/login" class="bg-white hover:bg-gray-100 text-blue-900 font-bold px-8 py-4 rounded-lg text-lg shadow-lg hover:shadow-xl transition duration-300">
                    Cek Status Pendaftaran
                </a>
            </div>
            
            <!-- Info Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-16">
                <div class="bg-white rounded-lg p-6 shadow-xl">
                    <div class="text-3xl mb-2">📅</div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Pendaftaran Dibuka</h3>
                    <p class="text-gray-600">1 Januari - 31 Maret 2026</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-xl">
                    <div class="text-3xl mb-2">👥</div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Kuota Tersedia</h3>
                    <p class="text-gray-600">200 Santri Putra & Putri</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-xl">
                    <div class="text-3xl mb-2">✅</div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Proses Mudah</h3>
                    <p class="text-gray-600">Daftar Online & Gratis</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Section -->
    <section id="tentang" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Tentang Pondok Pesantren</h2>
                <div class="w-24 h-1 bg-yellow-500 mx-auto"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="aspect-video bg-gradient-to-br from-blue-900 to-emerald-700 rounded-lg shadow-2xl flex items-center justify-center text-white text-6xl">
                        🕌
                    </div>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Mencetak Generasi Qur'ani & Berakhlak Mulia</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Pondok Pesantren kami berkomitmen untuk mendidik santri-santri yang tidak hanya menguasai ilmu agama, 
                        tetapi juga memiliki karakter yang kuat dan siap menghadapi tantangan zaman.
                    </p>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Dengan metode pembelajaran yang komprehensif, kami menggabungkan kajian kitab kuning klasik, 
                        tahfidz Al-Qur'an, dan pengembangan soft skills untuk membentuk santri yang paripurna.
                    </p>
                    
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <div class="text-emerald-600 mr-3 text-xl">✓</div>
                            <div>
                                <span class="font-semibold text-gray-900">Pengajar Berkompeten</span>
                                <p class="text-gray-600 text-sm">Ustadz dan ustadzah lulusan universitas ternama</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="text-emerald-600 mr-3 text-xl">✓</div>
                            <div>
                                <span class="font-semibold text-gray-900">Fasilitas Lengkap</span>
                                <p class="text-gray-600 text-sm">Asrama, masjid, perpustakaan, dan ruang belajar nyaman</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="text-emerald-600 mr-3 text-xl">✓</div>
                            <div>
                                <span class="font-semibold text-gray-900">Lingkungan Kondusif</span>
                                <p class="text-gray-600 text-sm">Atmosfer islami yang mendukung pembelajaran optimal</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Unggulan -->
    <section id="program" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Program Unggulan</h2>
                <div class="w-24 h-1 bg-yellow-500 mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Kurikulum terpadu yang menggabungkan pendidikan agama dan pengembangan karakter
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Program 1 -->
                <div class="bg-white rounded-lg p-6 shadow-lg hover-lift">
                    <div class="text-4xl mb-4">📖</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Tahfidz Al-Qur'an</h3>
                    <p class="text-gray-600">
                        Program menghafal Al-Qur'an dengan metode muroja'ah dan talaqqi langsung kepada para musyrif
                    </p>
                </div>

                <!-- Program 2 -->
                <div class="bg-white rounded-lg p-6 shadow-lg hover-lift">
                    <div class="text-4xl mb-4">📚</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Kitab Kuning</h3>
                    <p class="text-gray-600">
                        Kajian kitab-kitab klasik dalam berbagai disiplin ilmu: fiqih, aqidah, nahwu, shorof, dan lainnya
                    </p>
                </div>

                <!-- Program 3 -->
                <div class="bg-white rounded-lg p-6 shadow-lg hover-lift">
                    <div class="text-4xl mb-4">🗣️</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Bahasa Arab & Inggris</h3>
                    <p class="text-gray-600">
                        Pembelajaran bahasa Arab dan Inggris aktif untuk komunikasi sehari-hari di lingkungan pesantren
                    </p>
                </div>

                <!-- Program 4 -->
                <div class="bg-white rounded-lg p-6 shadow-lg hover-lift">
                    <div class="text-4xl mb-4">🎯</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Pengembangan Diri</h3>
                    <p class="text-gray-600">
                        Pelatihan kepemimpinan, public speaking, dan keterampilan hidup untuk masa depan santri
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Alur Pendaftaran -->
    <section id="alur" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Alur Pendaftaran</h2>
                <div class="w-24 h-1 bg-yellow-500 mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Ikuti langkah-langkah berikut untuk mendaftar sebagai santri baru
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="text-center">
                    <div class="bg-blue-900 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                        1
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Daftar Akun</h3>
                    <p class="text-gray-600 text-sm">
                        Buat akun dengan mengisi data diri dan alamat email aktif
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="text-center">
                    <div class="bg-emerald-600 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                        2
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Isi Formulir</h3>
                    <p class="text-gray-600 text-sm">
                        Lengkapi formulir pendaftaran dengan data calon santri
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="text-center">
                    <div class="bg-yellow-500 text-blue-900 w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                        3
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Verifikasi Admin</h3>
                    <p class="text-gray-600 text-sm">
                        Tim admin akan memverifikasi dan menghubungi Anda
                    </p>
                </div>

                <!-- Step 4 -->
                <div class="text-center">
                    <div class="bg-blue-900 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                        4
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Pengumuman</h3>
                    <p class="text-gray-600 text-sm">
                        Cek status dan pengumuman hasil seleksi melalui akun Anda
                    </p>
                </div>
            </div>

            <!-- Syarat Pendaftaran -->
            <div class="mt-16 bg-gradient-to-br from-blue-50 to-emerald-50 rounded-xl p-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Syarat Pendaftaran</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-3xl mx-auto">
                    <div class="flex items-start">
                        <span class="text-emerald-600 mr-3">✓</span>
                        <span class="text-gray-700">Usia maksimal 17 tahun</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-emerald-600 mr-3">✓</span>
                        <span class="text-gray-700">Beragama Islam</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-emerald-600 mr-3">✓</span>
                        <span class="text-gray-700">Lulus SD/MI atau SMP/MTs</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-emerald-600 mr-3">✓</span>
                        <span class="text-gray-700">Sehat jasmani dan rohani</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-emerald-600 mr-3">✓</span>
                        <span class="text-gray-700">Fotokopi Akta Kelahiran</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-emerald-600 mr-3">✓</span>
                        <span class="text-gray-700">Fotokopi Kartu Keluarga</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="py-20">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Timeline Pendaftaran</h2>
                <div class="w-24 h-1 bg-yellow-500 mx-auto"></div>
            </div>

            <div class="space-y-8">
                <!-- Timeline Item -->
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-blue-900 rounded-full flex items-center justify-center text-white font-bold">
                            1
                        </div>
                    </div>
                    <div class="ml-6 bg-white rounded-lg p-6 shadow-md flex-1">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Pendaftaran Online</h3>
                        <p class="text-gray-600 mb-1">1 Januari - 31 Maret 2026</p>
                        <p class="text-sm text-gray-500">Buka akses pendaftaran melalui website resmi</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-emerald-600 rounded-full flex items-center justify-center text-white font-bold">
                            2
                        </div>
                    </div>
                    <div class="ml-6 bg-white rounded-lg p-6 shadow-md flex-1">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Seleksi Administrasi</h3>
                        <p class="text-gray-600 mb-1">1 - 10 April 2026</p>
                        <p class="text-sm text-gray-500">Verifikasi berkas dan data pendaftar oleh tim admin</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center text-blue-900 font-bold">
                            3
                        </div>
                    </div>
                    <div class="ml-6 bg-white rounded-lg p-6 shadow-md flex-1">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Tes Wawancara</h3>
                        <p class="text-gray-600 mb-1">15 - 20 April 2026</p>
                        <p class="text-sm text-gray-500">Wawancara calon santri dan orang tua/wali</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-blue-900 rounded-full flex items-center justify-center text-white font-bold">
                            4
                        </div>
                    </div>
                    <div class="ml-6 bg-white rounded-lg p-6 shadow-md flex-1">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Pengumuman Hasil</h3>
                        <p class="text-gray-600 mb-1">25 April 2026</p>
                        <p class="text-sm text-gray-500">Cek hasil seleksi melalui akun pendaftar</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-emerald-600 rounded-full flex items-center justify-center text-white font-bold">
                            5
                        </div>
                    </div>
                    <div class="ml-6 bg-white rounded-lg p-6 shadow-md flex-1">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Daftar Ulang</h3>
                        <p class="text-gray-600 mb-1">1 - 15 Mei 2026</p>
                        <p class="text-sm text-gray-500">Konfirmasi kehadiran dan pembayaran administrasi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-br from-blue-900 to-emerald-700">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Siap Bergabung Menjadi Santri?
            </h2>
            <p class="text-xl text-white/90 mb-8">
                Jangan lewatkan kesempatan emas untuk menimba ilmu di pondok pesantren kami
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/login" class="bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-bold px-8 py-4 rounded-lg text-lg shadow-lg hover:shadow-xl transition duration-300">
                    Daftar Sekarang
                </a>
                <a href="#" class="bg-white/10 hover:bg-white/20 text-white border-2 border-white font-bold px-8 py-4 rounded-lg text-lg transition duration-300">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Pondok Pesantren</h3>
                    <p class="text-gray-400 mb-4">
                        Mendidik generasi Qur'ani yang berakhlak mulia dan siap menghadapi tantangan masa depan.
                    </p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Kontak</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>📞 (021) 1234-5678</li>
                        <li>📧 info@pesantren.ac.id</li>
                        <li>📍 Jl. Pendidikan No. 123, Jakarta</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Link Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Beranda</a></li>
                        <li><a href="#tentang" class="text-gray-400 hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="#program" class="text-gray-400 hover:text-white transition">Program</a></li>
                        <li><a href="/login" class="text-gray-400 hover:text-white transition">Login</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2026 Pondok Pesantren. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
