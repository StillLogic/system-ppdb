<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - PPDB Pondok Pesantren</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .islamic-pattern {
            background-color: #f8fafc;
            background-image: 
                repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(30, 64, 175, 0.03) 35px, rgba(30, 64, 175, 0.03) 70px),
                repeating-linear-gradient(-45deg, transparent, transparent 35px, rgba(5, 150, 105, 0.03) 35px, rgba(5, 150, 105, 0.03) 70px);
        }
    </style>
</head>
<body class="islamic-pattern min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        <!-- Logo & Header -->
        <div class="text-center mb-8">
            <div class="text-6xl mb-4">🕌</div>
            <h2 class="text-3xl font-bold text-gray-900 mb-2">
                Daftar Akun
            </h2>
            <p class="text-gray-600">
                Pendaftaran Santri Baru - Pondok Pesantren
            </p>
        </div>

        <!-- Register Form -->
        <div class="bg-white rounded-xl shadow-2xl p-8">
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

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Nama Lengkap -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>
                    <input 
                        id="name" 
                        name="name" 
                        type="text" 
                        required 
                        autofocus
                        value="{{ old('name') }}"
                        class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 @error('name') border-red-500 @enderror"
                        placeholder="Masukkan nama lengkap">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        required
                        value="{{ old('email') }}"
                        class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 @error('email') border-red-500 @enderror"
                        placeholder="email@example.com">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        required
                        class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 @error('password') border-red-500 @enderror"
                        placeholder="Minimal 8 karakter">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">Password minimal 8 karakter</p>
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                        Konfirmasi Password <span class="text-red-500">*</span>
                    </label>
                    <input 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        required
                        class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150"
                        placeholder="Ulangi password">
                </div>

                <!-- Info -->
                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-blue-700">
                                Dengan mendaftar, Anda akan mendapatkan akses ke portal pendaftaran santri baru.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button 
                        type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-lg text-white bg-gradient-to-r from-blue-900 to-emerald-700 hover:from-blue-800 hover:to-emerald-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 shadow-lg">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-white/80 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                        </span>
                        Daftar Sekarang
                    </button>
                </div>
            </form>

            <!-- Login Link -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <p class="text-center text-sm text-gray-600">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="font-semibold text-blue-900 hover:text-blue-700 transition">
                        Login di sini
                    </a>
                </p>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="mt-6 text-center">
            <a href="/" class="text-sm text-gray-600 hover:text-gray-900 transition">
                ← Kembali ke Beranda
            </a>
        </div>
    </div>
</body>
</html>
