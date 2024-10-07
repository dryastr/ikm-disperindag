@extends('layouts.main')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="d-flex align-items-center justify-content-start px-4">
                    <div>
                        <div class="stats-icon purple">
                            <i class="bi bi-egg-fried" style="position: relative;top: -13px;right: 5px;"></i>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="card-header p-0 m-0">
                            <h5 class="card-title p-0 m-0">IKM Pangan</h5>
                        </div>
                        <div class="card-body p-0 m-0">
                            <p class="card-text p-0 m-0">{{ $panganCount }}</p>
                            <a href="{{ url('lists-ikm?jenis_industri=pangan') }}">Lihat Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="d-flex align-items-center justify-content-start px-4">
                    <div>
                        <div class="stats-icon blue">
                            <i class="bi bi-box-fill" style="position: relative;top: -13px;right: 5px;"></i>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="card-header p-0 m-0">
                            <h5 class="card-title p-0 m-0">IKM Kerajinan</h5>
                        </div>
                        <div class="card-body p-0 m-0">
                            <p class="card-text p-0 m-0">{{ $kerajinanCount }}</p>
                            <a href="{{ url('lists-ikm?jenis_industri=kerajinan') }}">Lihat Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="d-flex align-items-center justify-content-start px-4">
                    <div>
                        <div class="stats-icon green">
                            <i class="bi bi-universal-access-circle" style="position: relative;top: -13px;right: 5px;"></i>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="card-header p-0 m-0">
                            <h5 class="card-title p-0 m-0">IKM Aneka</h5>
                        </div>
                        <div class="card-body p-0 m-0">
                            <p class="card-text p-0 m-0">{{ $anekaCount }}</p>
                            <a href="{{ url('lists-ikm?jenis_industri=aneka') }}">Lihat Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="d-flex align-items-center justify-content-start px-4">
                    <div>
                        <div class="stats-icon red">
                            <i class="bi bi-exclamation-octagon" style="position: relative;top: -13px;right: 5px;"></i>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="card-header p-0 m-0">
                            <h5 class="card-title p-0 m-0">Pengaduan</h5>
                        </div>
                        <div class="card-body p-0 m-0">
                            <p class="card-text p-0 m-0">{{ $complaintsCount }}</p>
                            <a href="{{ route('list-complaints.index') }}">Lihat Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Chart card -->
        <div class="col-md-12 col-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h4>Grafik Data IKM dan Pengaduan</h4>
                </div>
                <div class="card-body">
                    <div id="chart"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            series: [{
                name: 'Jumlah',
                data: [{{ $panganCount }}, {{ $kerajinanCount }}, {{ $anekaCount }},
                    {{ $complaintsCount }}]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Pangan', 'Kerajinan', 'Aneka', 'Pengaduan'],
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + " data"
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endpush
