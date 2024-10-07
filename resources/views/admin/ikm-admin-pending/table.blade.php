<table class="table table-striped table-xl">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Perusahaan</th>
            <th>Nama Pemilik</th>
            <th>Alamat</th>
            <th>Jenis Industri</th>
            <th>Kode KBLI</th>
            <th>Jumlah Tenaga Kerja</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ikmRegistrations as $key => $ikm)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $ikm->nama_perusahaan }}</td>
                <td>{{ $ikm->nama_pemilik }}</td>
                <td>{{ $ikm->alamat }}</td>
                <td>{{ $ikm->jenis_industri }}</td>
                <td>{{ $ikm->kode_kbli }}</td>
                <td>{{ $ikm->jumlah_tenaga_kerja_pria + $ikm->jumlah_tenaga_kerja_wanita }}</td>
                <td>
                    @if ($ikm->status === 'accepted')
                        <span class="badge bg-success">Accepted</span>
                    @elseif ($ikm->status === 'rejected')
                        <span class="badge bg-danger">Rejected</span>
                    @else
                        <span class="badge bg-warning">{{ $ikm->status }}</span>
                    @endif
                </td>
                <td class="text-nowrap">
                    <div class="dropdown dropup">
                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                            id="dropdownMenuButton-{{ $ikm->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $ikm->id }}">
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $ikm->id }}">
                                    Lihat Detail
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>

            @include('admin.ikm-admin-pending.show')
        @endforeach
    </tbody>
</table>
