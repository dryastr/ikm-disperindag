<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ikm_registrations', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_industri', ['Pangan', 'Kerajinan', 'Aneka']);
            $table->date('bulan_tahun_daftar_usaha');
            $table->enum('badan_usaha', ['PT', 'PO', 'CV']);
            $table->string('nama_perusahaan');
            $table->string('nama_pemilik');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->date('tanggal_lahir');
            $table->string('nik', 16);
            $table->text('alamat');
            $table->string('desa_kelurahan');
            $table->string('kecamatan');
            $table->string('telepon');
            $table->string('email')->unique();
            $table->string('izin_nib')->nullable();
            $table->string('pirt')->nullable();
            $table->string('sertifikat_halal')->nullable();
            $table->string('kode_kbli');
            $table->string('nama_produk');
            $table->string('jenis_produk');
            $table->integer('jumlah_tenaga_kerja_pria');
            $table->integer('jumlah_tenaga_kerja_wanita');
            $table->decimal('nilai_investasi', 15, 2);
            $table->integer('jumlah_kapasitas_produksi_perbulan');
            $table->string('satuan_produksi');
            $table->decimal('nilai_produksi', 15, 2);
            $table->string('foto_ktp')->nullable(); 
            $table->string('foto_produk')->nullable();
            $table->string('foto_sample_produk')->nullable();
            $table->enum('status', ['accepted', 'rejected'])->default('rejected');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ikm_registrations');
    }
};
