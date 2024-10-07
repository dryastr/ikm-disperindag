<!-- Combined Form -->
<form id="ikmRegistrationForm" action="{{ route('ikm-registrations.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Modal Part 1 -->
    <div class="modal fade" id="modalPart1" tabindex="-1" aria-labelledby="modalPart1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPart1Label">Pendaftaran IKM - Bagian 1</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form input part 1 -->
                    <div class="mb-3">
                        <label for="jenis_industri" class="form-label">Jenis Industri</label>
                        <select class="form-select" name="jenis_industri" required>
                            <option value="Pangan">Pangan</option>
                            <option value="Kerajinan">Kerajinan</option>
                            <option value="Aneka">Aneka</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="bulan_tahun_daftar_usaha" class="form-label">Bulan & Tahun Daftar Usaha</label>
                        <input type="date" class="form-control" name="bulan_tahun_daftar_usaha" required>
                    </div>

                    <div class="mb-3">
                        <label for="badan_usaha" class="form-label">Badan Usaha</label>
                        <select class="form-select" name="badan_usaha" required>
                            <option value="PT">PT</option>
                            <option value="PO">PO</option>
                            <option value="CV">CV</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" name="nama_perusahaan" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                        <input type="text" class="form-control" name="nama_pemilik" value="{{ Auth::user()->name }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin" required>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" data-bs-target="#modalPart2"
                        data-bs-toggle="modal">Next</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Part 2 -->
    <div class="modal fade" id="modalPart2" tabindex="-1" aria-labelledby="modalPart2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPart2Label">Pendaftaran IKM - Bagian 2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form input part 2 -->
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" required>
                    </div>

                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" name="nik" maxlength="16" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="desa_kelurahan" class="form-label">Desa/Kelurahan</label>
                        <input type="text" class="form-control" name="desa_kelurahan" required>
                    </div>

                    <div class="mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan" required>
                    </div>

                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" name="telepon" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="izin_nib" class="form-label">Izin NIB</label>
                        <input type="text" class="form-control" name="izin_nib" required>
                    </div>

                    <div class="mb-3">
                        <label for="pirt" class="form-label">Foto PIRT</label>
                        <input type="file" class="form-control" name="pirt" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="sertifikat_halal" class="form-label">Foto Sertifikat Hala</label>
                        <input type="file" class="form-control" name="sertifikat_halal" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-target="#modalPart1"
                        data-bs-toggle="modal">Prev</button>
                    <button type="button" class="btn btn-primary" data-bs-target="#modalPart3"
                        data-bs-toggle="modal">Next</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Part 3 -->
    <div class="modal fade" id="modalPart3" tabindex="-1" aria-labelledby="modalPart3Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPart3Label">Pendaftaran IKM - Bagian 3</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode_kbli" class="form-label">Kode KBLI</label>
                        <input type="text" class="form-control" name="kode_kbli" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" required>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_produk" class="form-label">Jenis Produk</label>
                        <input type="text" class="form-control" name="jenis_produk" required>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah_tenaga_kerja_pria" class="form-label">Tenaga Kerja Pria</label>
                        <input type="number" class="form-control" name="jumlah_tenaga_kerja_pria" required>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah_tenaga_kerja_wanita" class="form-label">Tenaga Kerja Wanita</label>
                        <input type="number" class="form-control" name="jumlah_tenaga_kerja_wanita" required>
                    </div>

                    <div class="mb-3">
                        <label for="nilai_investasi" class="form-label">Nilai Investasi</label>
                        <input type="number" class="form-control" name="nilai_investasi" required>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah_kapasitas_produksi_perbulan" class="form-label">Jumlah
                            Produksi/Bulan</label>
                        <input type="number" class="form-control" name="jumlah_kapasitas_produksi_perbulan"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="satuan_produksi" class="form-label">Satuan Produksi</label>
                        <input type="text" class="form-control" name="satuan_produksi" required>
                    </div>

                    <div class="mb-3">
                        <label for="nilai_produksi" class="form-label">Nilai Produksi</label>
                        <input type="number" class="form-control" name="nilai_produksi" required>
                    </div>

                    <div class="mb-3">
                        <label for="foto_ktp" class="form-label">Foto KTP</label>
                        <input type="file" class="form-control" name="foto_ktp" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="foto_produk" class="form-label">Foto Produk</label>
                        <input type="file" class="form-control" name="foto_produk" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="foto_sample_produk" class="form-label">Foto Sample Produk</label>
                        <input type="file" class="form-control" name="foto_sample_produk" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-target="#modalPart2"
                        data-bs-toggle="modal">Prev</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
