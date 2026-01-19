<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Landing Page
Route::get('/', function () {
    return view('landing');
})->name('home');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Admin - Protected by auth and role:admin middleware
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        $totalPendaftar = \App\Models\Pendaftaran::count();
        $pending = \App\Models\Pendaftaran::where('status', 'pending')->count();
        $diterima = \App\Models\Pendaftaran::where('status', 'diterima')->count();
        $ditolak = \App\Models\Pendaftaran::where('status', 'ditolak')->count();
        
        // Ambil 5 pendaftar terbaru dengan relasi user
        $recentPendaftar = \App\Models\Pendaftaran::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        return view('admin.dashboard', compact('totalPendaftar', 'pending', 'diterima', 'ditolak', 'recentPendaftar'));
    })->name('admin.dashboard');
    
    // Data Pendaftar Routes
    Route::get('/pendaftar', [App\Http\Controllers\Admin\PendaftaranAdminController::class, 'index'])->name('admin.pendaftar.index');
    Route::get('/pendaftar/create', [App\Http\Controllers\Admin\PendaftaranAdminController::class, 'create'])->name('admin.pendaftar.create');
    Route::post('/pendaftar/store', [App\Http\Controllers\Admin\PendaftaranAdminController::class, 'store'])->name('admin.pendaftar.store');
    Route::get('/pendaftar/{id}', [App\Http\Controllers\Admin\PendaftaranAdminController::class, 'show'])->name('admin.pendaftar.show');
    Route::put('/pendaftar/{id}/update-status', [App\Http\Controllers\Admin\PendaftaranAdminController::class, 'updateStatus'])->name('admin.pendaftar.update-status');
    Route::delete('/pendaftar/{id}', [App\Http\Controllers\Admin\PendaftaranAdminController::class, 'destroy'])->name('admin.pendaftar.destroy');
    
    // Manajemen Akun
    Route::get('/akun', function () {
        $users = \App\Models\User::with('roles')->orderBy('created_at', 'desc')->get();
        return view('admin.akun', compact('users'));
    })->name('admin.akun');
});

// Dashboard Pendaftar - Protected by auth and role:pendaftar middleware
Route::middleware(['auth', 'role:pendaftar'])->prefix('pendaftar')->group(function () {
    Route::get('/dashboard', function () {
        $pendaftaran = Auth::user()->pendaftaran;
        return view('pendaftar.dashboard', compact('pendaftaran'));
    })->name('pendaftar.dashboard');
    
    // Routes untuk pendaftaran
    Route::get('/pendaftaran/create', [App\Http\Controllers\PendaftaranController::class, 'create'])->name('pendaftar.pendaftaran.create');
    Route::post('/pendaftaran/store', [App\Http\Controllers\PendaftaranController::class, 'store'])->name('pendaftar.pendaftaran.store');
    Route::get('/pendaftaran/edit', [App\Http\Controllers\PendaftaranController::class, 'edit'])->name('pendaftar.pendaftaran.edit');
    Route::put('/pendaftaran/update', [App\Http\Controllers\PendaftaranController::class, 'update'])->name('pendaftar.pendaftaran.update');
});

// ===== ROUTE TESTING (Bisa dihapus nanti) =====
// Route untuk test role - Login sebagai user tertentu
Route::get('/test-login/{id}', function ($id) {
    $user = User::findOrFail($id);
    Auth::login($user);
    return redirect('/check-role');
});

// Route untuk cek role user yang sedang login
Route::get('/check-role', function () {
    if (!Auth::check()) {
        return '<h1>Belum Login</h1><p>Silakan login dulu:</p>
                <a href="/test-login/1">Login sebagai Admin</a> | 
                <a href="/test-login/2">Login sebagai Pendaftar</a>';
    }
    
    $user = Auth::user();
    $roles = $user->getRoleNames();
    
    return view('check-role', compact('user', 'roles'));
});

// Route khusus admin (akan error jika bukan admin)
Route::get('/admin-only', function () {
    return '<h1>✅ Halaman Admin</h1><p>Anda berhasil mengakses halaman admin!</p>
            <a href="/check-role">Kembali</a>';
})->middleware(['auth', 'role:admin']);

// Route khusus pendaftar (akan error jika bukan pendaftar)
Route::get('/pendaftar-only', function () {
    return '<h1>✅ Halaman Pendaftar</h1><p>Anda berhasil mengakses halaman pendaftar!</p>
            <a href="/check-role">Kembali</a>';
})->middleware(['auth', 'role:pendaftar']);
