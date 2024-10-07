<?php

namespace App\Exports;

use App\Models\IkmRegistration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PanganExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return IkmRegistration::where('jenis_industri', 'pangan')->get([
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
            'kode_kbli',
            'nama_produk',
            'jenis_produk',
            'jumlah_tenaga_kerja_pria',
            'jumlah_tenaga_kerja_wanita',
            'nilai_investasi',
            'jumlah_kapasitas_produksi_perbulan',
            'satuan_produksi',
            'nilai_produksi',
            'status',
            'keterangan',
        ]);
    }

    public function headings(): array
    {
        return [
            'Jenis Industri',
            'Bulan Tahun Daftar Usaha',
            'Badan Usaha',
            'Nama Perusahaan',
            'Nama Pemilik',
            'Jenis Kelamin',
            'Tanggal Lahir',
            'NIK',
            'Alamat',
            'Desa/Kelurahan',
            'Kecamatan',
            'Telepon',
            'Email',
            'Izin NIB',
            'Kode KBLI',
            'Nama Produk',
            'Jenis Produk',
            'Jumlah Tenaga Kerja Pria',
            'Jumlah Tenaga Kerja Wanita',
            'Nilai Investasi',
            'Jumlah Kapasitas Produksi Perbulan',
            'Satuan Produksi',
            'Nilai Produksi',
            'Status',
            'Keterangan',
        ];
    }
}
