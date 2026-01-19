<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PPDB Pondok Pesantren</title>
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
                Login PPDB
            </h2>
            <p class="text-gray-600">
                Pondok Pesantren
            </p>
        </div>

        <!-- Login Form -->
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
                            <p class="text-sm text-red-700 font-semibold">
                                {{ $errors->first() }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Email
                    </label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        required 
                        autofocus
                        value="{{ old('email') }}"
                        class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150"
                        placeholder="email@example.com">
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Password
                    </label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        required
                        class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150"
                        placeholder="••••••••">
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input 
                            id="remember" 
                            name="remember" 
                            type="checkbox"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded cursor-pointer">
                        <label for="remember" class="ml-2 block text-sm text-gray-700 cursor-pointer">
                            Ingat Saya
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button 
                        type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-lg text-white bg-gradient-to-r from-blue-900 to-emerald-700 hover:from-blue-800 hover:to-emerald-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 shadow-lg">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-white/80 group-hover:text-white transition" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                            </svg>
                        </span>
                        Masuk
                    </button>
                </div>
            </form>

            <!-- Info -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <p class="text-center text-sm text-gray-600">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="font-semibold text-blue-900 hover:text-blue-700 transition">
                        Daftar Sekarang
                    </a>
                </p>
            </div>
        </div>

        <!-- Test Credentials -->
        <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
            <p class="text-xs font-semibold text-yellow-800 mb-2">🔑 Kredensial untuk Testing:</p>
            <div class="space-y-1 text-xs text-yellow-700">
                <p><strong>Admin:</strong> admin@pesantren.ac.id / password</p>
                <p><strong>Pendaftar:</strong> pendaftar@example.com / password</p>
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
