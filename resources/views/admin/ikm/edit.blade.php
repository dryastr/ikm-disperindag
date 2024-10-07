<div class="modal fade" id="editModal{{ $ikm->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $ikm->id }}"
    aria-hidden="true">
    <form id="ikmRegistrationEditForm{{ $ikm->id }}" action="{{ route('ikm-registrations.update', $ikm->id) }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-dialog">
            <!-- Modal Part 1 -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $ikm->id }}">Edit Pendaftaran IKM - Bagian 1</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="jenis_industri{{ $ikm->id }}" class="form-label">Jenis Industri</label>
                        <select class="form-select" name="jenis_industri" required>
                            <option value="Pangan" {{ $ikm->jenis_industri == 'Pangan' ? 'selected' : '' }}>Pangan
                            </option>
                            <option value="Kerajinan" {{ $ikm->jenis_industri == 'Kerajinan' ? 'selected' : '' }}>
                                Kerajinan</option>
                            <option value="Aneka" {{ $ikm->jenis_industri == 'Aneka' ? 'selected' : '' }}>Aneka
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bulan_tahun_daftar_usaha{{ $ikm->id }}" class="form-label">Bulan & Tahun Daftar
                            Usaha</label>
                        <input type="date" class="form-control" name="bulan_tahun_daftar_usaha"
                            value="{{ $ikm->bulan_tahun_daftar_usaha }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="badan_usaha{{ $ikm->id }}" class="form-label">Badan Usaha</label>
                        <select class="form-select" name="badan_usaha" required>
                            <option value="PT" {{ $ikm->badan_usaha == 'PT' ? 'selected' : '' }}>PT</option>
                            <option value="PO" {{ $ikm->badan_usaha == 'PO' ? 'selected' : '' }}>PO</option>
                            <option value="CV" {{ $ikm->badan_usaha == 'CV' ? 'selected' : '' }}>CV</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_perusahaan{{ $ikm->id }}" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" name="nama_perusahaan"
                            value="{{ $ikm->nama_perusahaan }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_pemilik{{ $ikm->id }}" class="form-label">Nama Pemilik</label>
                        <input type="text" class="form-control" name="nama_pemilik" value="{{ $ikm->nama_pemilik }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin{{ $ikm->id }}" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin" required>
                            <option value="Pria" {{ $ikm->jenis_kelamin == 'Pria' ? 'selected' : '' }}>Pria</option>
                            <option value="Wanita" {{ $ikm->jenis_kelamin == 'Wanita' ? 'selected' : '' }}>Wanita
                            </option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" data-bs-target="#editModalPart2{{ $ikm->id }}"
                        data-bs-toggle="modal">Next</button>
                </div>
            </div>
        </div>
</div>

<!-- Modal Part 2 -->
<div class="modal fade" id="editModalPart2{{ $ikm->id }}" tabindex="-1"
    aria-labelledby="editModalPart2Label{{ $ikm->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalPart2Label{{ $ikm->id }}">Edit Pendaftaran IKM - Bagian 2
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form input part 2 -->
                <div class="mb-3">
                    <label for="tanggal_lahir{{ $ikm->id }}" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" value="{{ $ikm->tanggal_lahir }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="nik{{ $ikm->id }}" class="form-label">NIK</label>
                    <input type="text" class="form-control" name="nik" value="{{ $ikm->nik }}"
                        maxlength="16" required>
                </div>
                <div class="mb-3">
                    <label for="alamat{{ $ikm->id }}" class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" required>{{ $ikm->alamat }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="desa_kelurahan{{ $ikm->id }}" class="form-label">Desa/Kelurahan</label>
                    <input type="text" class="form-control" name="desa_kelurahan"
                        value="{{ $ikm->desa_kelurahan }}" required>
                </div>
                <div class="mb-3">
                    <label for="kecamatan{{ $ikm->id }}" class="form-label">Kecamatan</label>
                    <input type="text" class="form-control" name="kecamatan" value="{{ $ikm->kecamatan }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="telepon{{ $ikm->id }}" class="form-label">Telepon</label>
                    <input type="text" class="form-control" name="telepon" value="{{ $ikm->telepon }}" required>
                </div>
                <div class="mb-3">
                    <label for="email{{ $ikm->id }}" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $ikm->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="izin_nib{{ $ikm->id }}" class="form-label">Izin NIB</label>
                    <input type="text" class="form-control" name="izin_nib" value="{{ $ikm->izin_nib }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="pirt{{ $ikm->id }}" class="form-label">Foto PIRT</label>
                    <input type="file" class="form-control" name="pirt" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="sertifikat_halal{{ $ikm->id }}" class="form-label">Foto Sertifikat
                        Halal</label>
                    <input type="file" class="form-control" name="sertifikat_halal" accept="image/*">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-target="#editModal{{ $ikm->id }}"
                    data-bs-toggle="modal">Prev</button>
                <button type="button" class="btn btn-primary" data-bs-target="#editModalPart3{{ $ikm->id }}"
                    data-bs-toggle="modal">Next</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Part 3 -->
<div class="modal fade" id="editModalPart3{{ $ikm->id }}" tabindex="-1"
    aria-labelledby="editModalPart3Label{{ $ikm->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalPart3Label{{ $ikm->id }}">Edit Pendaftaran IKM - Bagian
                    3
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="kode_kbli" class="form-label">Kode KBLI</label>
                    <input type="text" class="form-control" name="kode_kbli" value="{{ $ikm->kode_kbli }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" value="{{ $ikm->nama_produk }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="jenis_produk" class="form-label">Jenis Produk</label>
                    <input type="text" class="form-control" name="jenis_produk" value="{{ $ikm->jenis_produk }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="jumlah_tenaga_kerja_pria" class="form-label">Tenaga Kerja Pria</label>
                    <input type="number" class="form-control" name="jumlah_tenaga_kerja_pria"
                        value="{{ $ikm->jumlah_tenaga_kerja_pria }}" required>
                </div>

                <div class="mb-3">
                    <label for="jumlah_tenaga_kerja_wanita" class="form-label">Tenaga Kerja Wanita</label>
                    <input type="number" class="form-control" name="jumlah_tenaga_kerja_wanita"
                        value="{{ $ikm->jumlah_tenaga_kerja_wanita }}" required>
                </div>

                <div class="mb-3">
                    <label for="nilai_investasi" class="form-label">Nilai Investasi</label>
                    <input type="number" class="form-control" name="nilai_investasi"
                        value="{{ $ikm->nilai_investasi }}" required>
                </div>

                <div class="mb-3">
                    <label for="jumlah_kapasitas_produksi_perbulan" class="form-label">Jumlah
                        Produksi/Bulan</label>
                    <input type="number" class="form-control" name="jumlah_kapasitas_produksi_perbulan"
                        value="{{ $ikm->jumlah_kapasitas_produksi_perbulan }}" required>
                </div>

                <div class="mb-3">
                    <label for="satuan_produksi" class="form-label">Satuan Produksi</label>
                    <input type="text" class="form-control" name="satuan_produksi"
                        value="{{ $ikm->satuan_produksi }}" required>
                </div>

                <div class="mb-3">
                    <label for="nilai_produksi" class="form-label">Nilai Produksi</label>
                    <input type="number" class="form-control" name="nilai_produksi"
                        value="{{ $ikm->nilai_produksi }}" required>
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
                <button type="button" class="btn btn-secondary" data-bs-target="#editModalPart2{{ $ikm->id }}"
                    data-bs-toggle="modal">Prev</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
</form>
