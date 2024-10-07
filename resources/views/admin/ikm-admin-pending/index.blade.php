@extends('layouts.main')

@section('title', 'Pendaftaran IKM')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Pendaftaran IKM DISPERINDAG</h4>
                </div>
            </div>

            <div class="card-content">
                <div class="card-body">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ $jenisIndustri == 'pangan' ? 'active' : '' }}" id="pangan-tab"
                                data-bs-toggle="tab" href="#pangan" role="tab" aria-controls="pangan"
                                aria-selected="{{ $jenisIndustri == 'pangan' ? 'true' : 'false' }}">IKM Pangan</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ $jenisIndustri == 'kerajinan' ? 'active' : '' }}" id="kerajinan-tab"
                                data-bs-toggle="tab" href="#kerajinan" role="tab" aria-controls="kerajinan"
                                aria-selected="{{ $jenisIndustri == 'kerajinan' ? 'true' : 'false' }}">IKM Kerajinan</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ $jenisIndustri == 'aneka' ? 'active' : '' }}" id="aneka-tab"
                                data-bs-toggle="tab" href="#aneka" role="tab" aria-controls="aneka"
                                aria-selected="{{ $jenisIndustri == 'aneka' ? 'true' : 'false' }}">IKM Aneka</a>
                        </li>
                    </ul>


                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade {{ $jenisIndustri == 'pangan' ? 'show active' : '' }}" id="pangan"
                            role="tabpanel" aria-labelledby="pangan-tab">
                            @include('admin.ikm-admin-pending.table', [
                                'ikmRegistrations' => $ikmData['pangan'],
                            ])
                        </div>
                        <div class="tab-pane fade {{ $jenisIndustri == 'kerajinan' ? 'show active' : '' }}" id="kerajinan"
                            role="tabpanel" aria-labelledby="kerajinan-tab">
                            @include('admin.ikm-admin-pending.table', [
                                'ikmRegistrations' => $ikmData['kerajinan'],
                            ])
                        </div>
                        <div class="tab-pane fade {{ $jenisIndustri == 'aneka' ? 'show active' : '' }}" id="aneka"
                            role="tabpanel" aria-labelledby="aneka-tab">
                            @include('admin.ikm-admin-pending.table', [
                                'ikmRegistrations' => $ikmData['aneka'],
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelects = document.querySelectorAll('select[id^="status"]');

            statusSelects.forEach(select => {
                select.addEventListener('change', function() {
                    const id = select.id.replace('status', '');
                    const keteranganContainer = document.getElementById('keteranganContainer' + id);

                    if (select.value === 'rejected') {
                        keteranganContainer.style.display = 'block';
                    } else {
                        keteranganContainer.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endpush
