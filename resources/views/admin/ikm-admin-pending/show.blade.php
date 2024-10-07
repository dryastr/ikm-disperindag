<div class="modal fade" id="detailModal{{ $ikm->id }}" tabindex="-1"
    aria-labelledby="detailModalLabel{{ $ikm->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel{{ $ikm->id }}">
                    Detail Pendaftaran IKM: {{ $ikm->nama_perusahaan }} |
                    @if ($ikm->status === 'accepted')
                        <span class="badge bg-success">Accepted</span>
                    @elseif ($ikm->status === 'rejected')
                        <span class="badge bg-danger">Rejected</span>
                    @else
                        <span class="badge bg-warning">{{ $ikm->status }}</span>
                    @endif
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Keterangan:</strong> {{ !empty($ikm->keterangan) ? $ikm->keterangan : '-' }}</p>
                <hr>
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
                        data-bs-target="#statusModal{{ $ikm->id }}">Ambil Keputusan</button>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Status Modal -->
<div class="modal fade" id="statusModal{{ $ikm->id }}" tabindex="-1"
    aria-labelledby="statusModalLabel{{ $ikm->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModalLabel{{ $ikm->id }}">Ubah Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('updateStatus', $ikm->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <div>
                            <input type="radio" id="accepted{{ $ikm->id }}" name="status" value="accepted"
                                required>
                            <label for="accepted{{ $ikm->id }}">Accepted</label>
                        </div>
                        <div>
                            <input type="radio" id="rejected{{ $ikm->id }}" name="status" value="rejected">
                            <label for="rejected{{ $ikm->id }}">Rejected</label>
                        </div>
                    </div>
                    <div class="mb-3" id="keteranganContainer{{ $ikm->id }}" style="display: none;">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan{{ $ikm->id }}" name="keterangan" rows="3">{{ $ikm->keterangan ?? '-' }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Ambil Keputusan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Show/Hide Keterangan container based on radio button selection
    document.querySelectorAll('input[name="status"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const keteranganContainer = document.getElementById('keteranganContainer' + this.id.replace(
                'rejected', '').replace('accepted', ''));
            if (this.value === 'rejected') {
                keteranganContainer.style.display = 'block';
            } else {
                keteranganContainer.style.display = 'none';
            }
        });
    });
</script>
