@extends('layouts.main')

@section('title', 'Pendaftaran IKM')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Pendaftaran IKM DISPERINDAG</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPart1">Tambah
                        IKM</button>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
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
                                    <th>Nilai Investasi</th>
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
                                        <td>{{ $ikm->nilai_investasi }}</td>
                                        <td class="text-nowrap">
                                            <div class="dropdown dropup">
                                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton-{{ $ikm->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu"
                                                    aria-labelledby="dropdownMenuButton-{{ $ikm->id }}">
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#detailModal{{ $ikm->id }}">
                                                            Lihat Detail
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editModal{{ $ikm->id }}">
                                                            Ubah
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('ikm-registrations.destroy', $ikm->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus pendaftaran ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item">Hapus</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    @include('admin.ikm.edit')


                                    @include('admin.ikm.show')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.ikm.create')
@endsection

@push('scripts')
    <script>
        $('form').on('submit', function(e) {
            console.log("Form submitted");
        });
    </script>
@endpush
