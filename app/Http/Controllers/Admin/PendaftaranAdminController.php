<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PendaftaranAdminController extends Controller
{
    /**
     * Display a listing of all pendaftaran
     */
    public function index(Request $request)
    {
        $query = Pendaftaran::with('user');
        
        // Filter berdasarkan status jika ada
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        
        // Search berdasarkan nama atau nomor pendaftaran
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('nomor_pendaftaran', 'like', "%{$search}%");
            });
        }
        
        $pendaftaran = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.pendaftar.index', compact('pendaftaran'));
    }
    
    /**
     * Show form to create new pendaftaran by admin
     */
    public function create()
    {
        return view('admin.pendaftar.create');
    }
    
    /**
     * Store new pendaftaran created by admin
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
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
        
        // Generate random password (8 karakter)
        $password = Str::random(8);
        
        // Buat user baru
        $user = User::create([
            'name' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($password),
        ]);
        
        // Assign role pendaftar
        $user->assignRole('pendaftar');
        
        // Buat data pendaftaran
        $pendaftaran = Pendaftaran::create([
            'user_id' => $user->id,
            'nomor_pendaftaran' => Pendaftaran::generateNomorPendaftaran(),
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telepon' => $request->no_telepon,
            'asal_sekolah' => $request->asal_sekolah,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'no_telepon_ortu' => $request->no_telepon_ortu,
            'alamat_lengkap' => $request->alamat_lengkap,
            'rt_rw' => $request->rt_rw,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kode_pos' => $request->kode_pos,
            'status' => 'pending',
        ]);
        
        // Redirect dengan credentials
        return redirect()->route('admin.pendaftar.show', $pendaftaran->id)
            ->with('success', 'Pendaftaran berhasil ditambahkan!')
            ->with('credentials', [
                'email' => $request->email,
                'password' => $password,
                'nama' => $request->nama_lengkap
            ]);
    }
    
    /**
     * Display the specified pendaftaran
     */
    public function show($id)
    {
        $pendaftaran = Pendaftaran::with('user')->findOrFail($id);
        return view('admin.pendaftar.show', compact('pendaftaran'));
    }
    
    /**
     * Update status pendaftaran
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diterima,ditolak',
            'catatan_admin' => 'nullable|string'
        ]);
        
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->status = $request->status;
        $pendaftaran->catatan_admin = $request->catatan_admin;
        $pendaftaran->save();
        
        return redirect()->back()->with('success', 'Status pendaftaran berhasil diperbarui!');
    }
    
    /**
     * Delete pendaftaran
     */
    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();
        
        return redirect()->route('admin.pendaftar.index')->with('success', 'Data pendaftaran berhasil dihapus!');
    }
}
