<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IkmRegistration extends Model
{
    use HasFactory;

    protected $table = 'ikm_registrations';

    protected $fillable = [
        'jenis_industri',
        'bulan_tahun_daftar_usaha',
        'badan_usaha',
        'nama_perusahaan',
        'nama_pemilik',
        'jenis_kelamin',
        'tanggal_lahir',
        'nik',
        'alamat',
        'desa_kelurahan',
        'kecamatan',
        'telepon',
        'email',
        'izin_nib',
        'pirt',
        'sertifikat_halal',
        'kode_kbli',
        'nama_produk',
        'jenis_produk',
        'jumlah_tenaga_kerja_pria',
        'jumlah_tenaga_kerja_wanita',
        'nilai_investasi',
        'jumlah_kapasitas_produksi_perbulan',
        'satuan_produksi',
        'nilai_produksi',
        'foto_ktp',
        'foto_produk',
        'foto_sample_produk',
        'status',
        'keterangan',
        'created_by',
        'updated_by',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relasi ke model User untuk updated_by
    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
