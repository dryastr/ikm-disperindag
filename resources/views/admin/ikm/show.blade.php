<div class="modal fade" id="detailModal{{ $ikm->id }}" tabindex="-1"
    aria-labelledby="detailModalLabel{{ $ikm->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel{{ $ikm->id }}">
                    Detail
                    Pendaftaran IKM: {{ $ikm->nama_perusahaan }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nama Perusahaan:</strong> {{ $ikm->nama_perusahaan }}</p>
                <p><strong>Nama Pemilik:</strong> {{ $ikm->nama_pemilik }}</p>
                <p><strong>Alamat:</strong> {{ $ikm->alamat }}</p>
                <p><strong>Jenis Industri:</strong> {{ $ikm->jenis_industri }}</p>
                <p><strong>Bulan & Tahun Daftar Usaha:</strong>
                    {{ \Carbon\Carbon::parse($ikm->bulan_tahun_daftar_usaha)->translatedFormat('d F Y') }}
                </p>
                <p><strong>Kode KBLI:</strong> {{ $ikm->kode_kbli }}</p>
                <p><strong>Jumlah Tenaga Kerja:</strong>
                    {{ $ikm->jumlah_tenaga_kerja_pria + $ikm->jumlah_tenaga_kerja_wanita }}
                </p>
                <p><strong>Nilai Investasi:</strong> {{ $ikm->nilai_investasi }}</p>
                <p><strong>Izin NIB:</strong> {{ $ikm->izin_nib }}</p>
                <p><strong>PIRT:</strong><br> <img src="{{ asset('storage/' . $ikm->pirt) }}" alt="PIRT"
                        width="100" /></p>
                <p><strong>Sertifikat Halal:</strong><br> <img src="{{ asset('storage/' . $ikm->sertifikat_halal) }}"
                        alt="Sertifikat Halal" width="100" /></p>
                <p><strong>Nama Produk:</strong> {{ $ikm->nama_produk }}</p>
                <p><strong>Jenis Produk:</strong> {{ $ikm->jenis_produk }}</p>
                <p><strong>Tenaga Kerja Pria:</strong>
                    {{ $ikm->jumlah_tenaga_kerja_pria }}</p>
                <p><strong>Tenaga Kerja Wanita:</strong>
                    {{ $ikm->jumlah_tenaga_kerja_wanita }}
                </p>
                <p><strong>Kapasitas Produksi/Bulan:</strong>
                    {{ $ikm->jumlah_kapasitas_produksi_perbulan }}</p>
                <p><strong>Satuan Produksi:</strong> {{ $ikm->satuan_produksi }}</p>
                <p><strong>Nilai Produksi:</strong> {{ $ikm->nilai_produksi }}</p>
                <p><strong>FOTO KTP:</strong><br> <img src="{{ asset('storage/' . $ikm->foto_ktp) }}" alt="KTP"
                        width="100" /></p>
                <p><strong>Foto Produk:</strong><br> <img src="{{ asset('storage/' . $ikm->foto_produk) }}"
                        alt="Foto Produk" width="100" /></p>
                <p><strong>Sample Produk:</strong><br> <img src="{{ asset('storage/' . $ikm->foto_sample_produk) }}"
                        alt="Sample Produk" width="100" /></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                @if (auth()->user()->role->name == 'admin')
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#statusModal">Ambil Keputusan</button>
                @endif
            </div>
        </div>
    </div>
</div>

@if (auth()->user()->role->name == 'admin')
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Ubah Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('updateStatus', $registration->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="" disabled selected>Pilih Status</option>
                                <option value="accepted">Accepted</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                        <div class="mb-3" id="keteranganContainer" style="display: none;">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelect = document.getElementById('status');
            const keteranganContainer = document.getElementById('keteranganContainer');

            statusSelect.addEventListener('change', function() {
                if (statusSelect.value === 'rejected') {
                    keteranganContainer.style.display = 'block';
                } else {
                    keteranganContainer.style.display = 'none';
                }
            });
        });
    </script>
@endif
