<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function create()
    {
        $existingPendaftaran = Auth::user()->pendaftaran;
        
        if ($existingPendaftaran) {
            return redirect()->route('pendaftar.dashboard')
                ->with('error', 'Anda sudah melakukan pendaftaran.');
        }

        return view('pendaftar.form-pendaftaran');
    }

    public function store(Request $request)
    {
        if (Auth::user()->pendaftaran) {
            return redirect()->route('pendaftar.dashboard')
                ->with('error', 'Anda sudah melakukan pendaftaran.');
        }

        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'required|string|max:20',
            'asal_sekolah' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'no_telepon_ortu' => 'required|string|max:20',
            'alamat_lengkap' => 'required|string',
            'rt_rw' => 'required|string|max:10',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['nomor_pendaftaran'] = Pendaftaran::generateNomorPendaftaran();
        $validated['status'] = 'pending';

        Pendaftaran::create($validated);

        return redirect()->route('pendaftar.dashboard')
            ->with('success', 'Pendaftaran berhasil! Data Anda sedang dalam proses verifikasi.');
    }

    public function edit()
    {
        $pendaftaran = Auth::user()->pendaftaran;

        if (!$pendaftaran) {
            return redirect()->route('pendaftar.dashboard')
                ->with('error', 'Anda belum melakukan pendaftaran.');
        }

        if ($pendaftaran->status !== 'pending') {
            return redirect()->route('pendaftar.dashboard')
                ->with('error', 'Pendaftaran sudah diverifikasi, tidak dapat diubah.');
        }

        return view('pendaftar.edit-pendaftaran', compact('pendaftaran'));
    }

    public function update(Request $request)
    {
        $pendaftaran = Auth::user()->pendaftaran;

        if (!$pendaftaran) {
            return redirect()->route('pendaftar.dashboard')
                ->with('error', 'Anda belum melakukan pendaftaran.');
        }

        if ($pendaftaran->status !== 'pending') {
            return redirect()->route('pendaftar.dashboard')
                ->with('error', 'Pendaftaran sudah diverifikasi, tidak dapat diubah.');
        }

        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'required|string|max:20',
            'asal_sekolah' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'no_telepon_ortu' => 'required|string|max:20',
            'alamat_lengkap' => 'required|string',
            'rt_rw' => 'required|string|max:10',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
        ]);

        $pendaftaran->update($validated);

        return redirect()->route('pendaftar.dashboard')
            ->with('success', 'Data pendaftaran berhasil diperbarui.');
    }
}
