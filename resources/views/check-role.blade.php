<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Role PPDB</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-3xl mx-auto">
            <!-- Header -->
            <div class="bg-white rounded-lg shadow-lg p-8 mb-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">🔐 Test Role System</h1>
                <p class="text-gray-600">Sistem PPDB Pondok Pesantren</p>
            </div>

            <!-- User Info -->
            <div class="bg-white rounded-lg shadow-lg p-8 mb-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Informasi User Login</h2>
                
                <div class="space-y-3">
                    <div class="flex items-center">
                        <span class="font-semibold w-32">Nama:</span>
                        <span class="text-gray-700">{{ $user->name }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="font-semibold w-32">Email:</span>
                        <span class="text-gray-700">{{ $user->email }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="font-semibold w-32">User ID:</span>
                        <span class="text-gray-700">{{ $user->id }}</span>
                    </div>
                    <div class="flex items-start">
                        <span class="font-semibold w-32">Role:</span>
                        <div>
                            @foreach($roles as $role)
                                <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold
                                    {{ $role === 'admin' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                    {{ ucfirst($role) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Role Check -->
            <div class="bg-white rounded-lg shadow-lg p-8 mb-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Pengecekan Role</h2>
                
                <div class="space-y-4">
                    <!-- Cek Admin -->
                    <div class="flex items-center justify-between p-4 rounded-lg border-2
                        {{ $user->hasRole('admin') ? 'border-green-500 bg-green-50' : 'border-red-300 bg-red-50' }}">
                        <div>
                            <span class="font-semibold">Apakah Admin?</span>
                        </div>
                        <div>
                            @if($user->hasRole('admin'))
                                <span class="text-green-600 font-bold text-xl">✅ YA</span>
                            @else
                                <span class="text-red-600 font-bold text-xl">❌ TIDAK</span>
                            @endif
                        </div>
                    </div>

                    <!-- Cek Pendaftar -->
                    <div class="flex items-center justify-between p-4 rounded-lg border-2
                        {{ $user->hasRole('pendaftar') ? 'border-green-500 bg-green-50' : 'border-red-300 bg-red-50' }}">
                        <div>
                            <span class="font-semibold">Apakah Pendaftar?</span>
                        </div>
                        <div>
                            @if($user->hasRole('pendaftar'))
                                <span class="text-green-600 font-bold text-xl">✅ YA</span>
                            @else
                                <span class="text-red-600 font-bold text-xl">❌ TIDAK</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Test Akses Route -->
            <div class="bg-white rounded-lg shadow-lg p-8 mb-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Test Akses Route dengan Middleware</h2>
                <p class="text-gray-600 mb-6">Coba akses route yang dilindungi middleware role:</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="/admin-only" class="block p-4 border-2 border-blue-500 rounded-lg hover:bg-blue-50 transition">
                        <div class="font-bold text-blue-900 mb-1">🔒 Admin Only</div>
                        <div class="text-sm text-gray-600">Hanya bisa diakses admin</div>
                        @if($user->hasRole('admin'))
                            <span class="text-xs text-green-600 font-semibold">✓ Anda bisa akses</span>
                        @else
                            <span class="text-xs text-red-600 font-semibold">✗ Anda tidak bisa akses</span>
                        @endif
                    </a>

                    <a href="/pendaftar-only" class="block p-4 border-2 border-green-500 rounded-lg hover:bg-green-50 transition">
                        <div class="font-bold text-green-900 mb-1">🔒 Pendaftar Only</div>
                        <div class="text-sm text-gray-600">Hanya bisa diakses pendaftar</div>
                        @if($user->hasRole('pendaftar'))
                            <span class="text-xs text-green-600 font-semibold">✓ Anda bisa akses</span>
                        @else
                            <span class="text-xs text-red-600 font-semibold">✗ Anda tidak bisa akses</span>
                        @endif
                    </a>
                </div>
            </div>

            <!-- Switch User -->
            <div class="bg-gray-800 rounded-lg shadow-lg p-8 mb-6">
                <h2 class="text-xl font-bold text-white mb-4">Ganti User Login</h2>
                <p class="text-gray-300 mb-4">Test dengan login sebagai user lain:</p>
                
                <div class="flex gap-4">
                    <a href="/test-login/1" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-lg transition">
                        🔑 Login sebagai Admin
                    </a>
                    <a href="/test-login/2" class="bg-green-600 hover:bg-green-700 text-white font-bold px-6 py-3 rounded-lg transition">
                        🔑 Login sebagai Pendaftar
                    </a>
                    <a href="/logout" class="bg-red-600 hover:bg-red-700 text-white font-bold px-6 py-3 rounded-lg transition">
                        🚪 Logout
                    </a>
                </div>
            </div>

            <!-- Info -->
            <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 rounded">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-yellow-700">
                            <strong>Info:</strong> Jika Anda mengakses route yang tidak sesuai role, akan muncul error 403 Forbidden.
                            Ini artinya middleware role bekerja dengan baik!
                        </p>
                    </div>
                </div>
            </div>

            <!-- Back -->
            <div class="mt-6 text-center">
                <a href="/" class="text-blue-600 hover:text-blue-800 font-semibold">← Kembali ke Landing Page</a>
            </div>
        </div>
    </div>
</body>
</html>
