<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';

    protected $fillable = [
        'user_id',
        'nomor_pendaftaran',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'no_telepon',
        'asal_sekolah',
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'no_telepon_ortu',
        'alamat_lengkap',
        'rt_rw',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'kode_pos',
        'status',
        'catatan_admin',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Generate nomor pendaftaran otomatis
     */
    public static function generateNomorPendaftaran()
    {
        $year = date('Y');
        $lastNumber = self::whereYear('created_at', $year)->count() + 1;
        return 'PPDB-' . $year . '-' . str_pad($lastNumber, 3, '0', STR_PAD_LEFT);
    }
}
