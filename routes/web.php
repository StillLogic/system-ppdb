<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('landing');
})->name('home');

Route::get('/refresh-csrf', function () {
    return response()->json(['token' => csrf_token()]);
})->name('refresh-csrf');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        $totalPendaftar = \App\Models\Pendaftaran::count();
        $pending = \App\Models\Pendaftaran::where('status', 'pending')->count();
        $diterima = \App\Models\Pendaftaran::where('status', 'diterima')->count();
        $ditolak = \App\Models\Pendaftaran::where('status', 'ditolak')->count();
        
        $recentPendaftar = \App\Models\Pendaftaran::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        return view('admin.dashboard', compact('totalPendaftar', 'pending', 'diterima', 'ditolak', 'recentPendaftar'));
    })->name('admin.dashboard');
    
    Route::get('/pendaftar', [App\Http\Controllers\Admin\PendaftaranAdminController::class, 'index'])->name('admin.pendaftar.index');
    Route::get('/pendaftar/create', [App\Http\Controllers\Admin\PendaftaranAdminController::class, 'create'])->name('admin.pendaftar.create');
    Route::post('/pendaftar/store', [App\Http\Controllers\Admin\PendaftaranAdminController::class, 'store'])->name('admin.pendaftar.store');
    Route::get('/pendaftar/{id}', [App\Http\Controllers\Admin\PendaftaranAdminController::class, 'show'])->name('admin.pendaftar.show');
    Route::put('/pendaftar/{id}/update-status', [App\Http\Controllers\Admin\PendaftaranAdminController::class, 'updateStatus'])->name('admin.pendaftar.update-status');
    Route::delete('/pendaftar/{id}', [App\Http\Controllers\Admin\PendaftaranAdminController::class, 'destroy'])->name('admin.pendaftar.destroy');
    
    Route::get('/akun', function () {
        $users = \App\Models\User::with('roles')->orderBy('created_at', 'desc')->get();
        return view('admin.akun', compact('users'));
    })->name('admin.akun');
    Route::get('/akun/create-admin', [App\Http\Controllers\Admin\AkunController::class, 'createAdmin'])->name('admin.akun.create-admin');
    Route::post('/akun/store-admin', [App\Http\Controllers\Admin\AkunController::class, 'storeAdmin'])->name('admin.akun.store-admin');
    Route::delete('/akun/{id}', [App\Http\Controllers\Admin\AkunController::class, 'destroy'])->name('admin.akun.destroy');
});

Route::middleware(['auth', 'role:pendaftar'])->prefix('pendaftar')->group(function () {
    Route::get('/dashboard', function () {
        $pendaftaran = Auth::user()->pendaftaran;
        return view('pendaftar.dashboard', compact('pendaftaran'));
    })->name('pendaftar.dashboard');
    Route::get('/pendaftaran/create', [App\Http\Controllers\PendaftaranController::class, 'create'])->name('pendaftar.pendaftaran.create');
    Route::post('/pendaftaran/store', [App\Http\Controllers\PendaftaranController::class, 'store'])->name('pendaftar.pendaftaran.store');
    Route::get('/pendaftaran/edit', [App\Http\Controllers\PendaftaranController::class, 'edit'])->name('pendaftar.pendaftaran.edit');
    Route::put('/pendaftaran/update', [App\Http\Controllers\PendaftaranController::class, 'update'])->name('pendaftar.pendaftaran.update');
});
