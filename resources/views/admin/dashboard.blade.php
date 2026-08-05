@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('css')
<style>
    .dashboard-stat-card .card-body {
        text-align: center;
    }

    .dashboard-stat-icon {
        font-size: 1.85rem;
        margin-bottom: .75rem;
    }

    .dashboard-table-card .card-body {
        padding: 1.5rem;
    }

    .dashboard-table-card .table-responsive {
        min-height: 290px;
    }

    .dashboard-table-card table {
        margin-bottom: 0;
    }

    .dashboard-table-card .card-title {
        margin-bottom: 1rem;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <h3 class="page-title">Dashboard Admin</h3>
</div>

<div class="row grid-margin">
    <div class="col-12">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-2 col-6 mb-4">
                        <div class="statistics-item">
                            <p><i class="icon-sm fa fa-user-graduate mr-2"></i>Mahasiswa</p>
                            <h2>{{ $jumlahMahasiswa }}</h2>
                            <label class="badge badge-outline-primary badge-pill">Total Mahasiswa</label>
                        </div>
                    </div>

                    <div class="col-md-2 col-6 mb-4">
                        <div class="statistics-item">
                            <p><i class="icon-sm fas fa-chalkboard-teacher mr-2"></i>Dosen</p>
                            <h2>{{ $jumlahDosen }}</h2>
                            <label class="badge badge-outline-success badge-pill">Total Dosen</label>
                        </div>
                    </div>

                    <div class="col-md-2 col-6 mb-4">
                        <div class="statistics-item">
                            <p><i class="icon-sm fas fa-handshake mr-2"></i>Mitra Kerja Sama</p>
                            <h2>{{ $jumlahMitra }}</h2>
                            <label class="badge badge-outline-info badge-pill">Total Mitra</label>
                        </div>
                    </div>

                    <div class="col-md-2 col-6 mb-4">
                        <div class="statistics-item">
                            <p><i class="icon-sm fas fa-award mr-2"></i>Penerima Beasiswa</p>
                            <h2>{{ $jumlahBeasiswa }}</h2>
                            <label class="badge badge-outline-warning badge-pill">Total Beasiswa</label>
                        </div>
                    </div>

                    <div class="col-md-2 col-6 mb-4">
                        <div class="statistics-item">
                            <p><i class="icon-sm fas fa-users mr-2"></i>Civitas</p>
                            <h2>{{ $jumlahCivitas }}</h2>
                            <label class="badge badge-outline-dark badge-pill">Total Civitas</label>
                        </div>
                    </div>

                    <div class="col-md-2 col-6 mb-4">
                        <div class="statistics-item">
                            <p><i class="icon-sm fas fa-user-tie mr-2"></i>Guru Besar</p>
                            <h2>{{ $jumlahGuruBesar }}</h2>
                            <label class="badge badge-outline-danger badge-pill">Total Guru Besar</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card dashboard-stat-card">
            <div class="card-body">
                <i class="fas fa-user-tie dashboard-stat-icon text-primary"></i>
                <h5>Total Dosen</h5>
                <h2>{{ $jumlahDosen }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card dashboard-stat-card">
            <div class="card-body">
                <i class="fas fa-user-graduate dashboard-stat-icon text-success"></i>
                <h5>Total Mahasiswa</h5>
                <h2>{{ $jumlahMahasiswa }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card dashboard-stat-card">
            <div class="card-body">
                <i class="fas fa-book-open dashboard-stat-icon text-warning"></i>
                <h5>Total Prodi</h5>
                <h2>{{ $jumlahProdi }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card dashboard-stat-card">
            <div class="card-body">
                <i class="fas fa-university dashboard-stat-icon text-danger"></i>
                <h5>Total Fakultas</h5>
                <h2>{{ $jumlahFakultas }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card dashboard-table-card">
            <div class="card-body">
                <h4 class="card-title">Dosen Terbaru</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIDN</th>
                                <th>Prodi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dosenTerbaru as $dosen)
                                <tr>
                                    <td>{{ $dosen->nama }}</td>
                                    <td>{{ $dosen->nidn }}</td>
                                    <td>{{ $dosen->prodi->pluck('nama_prodi')->implode(', ') ?: '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">Belum ada data dosen.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card dashboard-table-card">
            <div class="card-body">
                <h4 class="card-title">Mahasiswa Terbaru</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Prodi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mahasiswaTerbaru as $mhs)
                                <tr>
                                    <td>{{ $mhs->nama }}</td>
                                    <td>{{ $mhs->nim }}</td>
                                    <td>{{ $mhs->prodi->nama_prodi ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">Belum ada data mahasiswa.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card dashboard-table-card">
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
                    <h4 class="card-title mb-0">Aktivitas Admin Terbaru</h4>
                    <a href="{{ route('admin.activities.index') }}" class="btn btn-outline-dark btn-sm">
                        Cek Selengkapnya
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>Waktu</th>
                                <th>Pengguna</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($aktivitasTerbaru as $aktivitas)
                                <tr>
                                    <td>{{ optional($aktivitas->performed_at)->format('d M Y H:i') ?: '-' }}</td>
                                    <td>
                                        <strong>{{ $aktivitas->name ?: '-' }}</strong>
                                        <div class="text-muted small">{{ $aktivitas->module ?: '-' }}</div>
                                    </td>
                                    <td>
                                        <span class="text-uppercase">{{ $aktivitas->action ?: '-' }}</span>
                                        <div class="text-muted small">{{ $aktivitas->description ?: '-' }}</div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">Belum ada aktivitas admin terbaru.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card dashboard-table-card">
            <div class="card-body">
                <h4 class="card-title">Grafik Mahasiswa per Angkatan</h4>
                <div class="table-responsive d-flex align-items-center" style="min-height: 290px;">
                    <canvas id="chartMahasiswaTahun" height="180"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    (function () {
        const chartElement = document.getElementById('chartMahasiswaTahun');
        if (!chartElement) {
            return;
        }

        const labels = @json($mahasiswaPerTahun->pluck('tahun')->values());
        const totals = @json($mahasiswaPerTahun->pluck('total')->values());

        new Chart(chartElement, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Mahasiswa',
                    data: totals,
                    backgroundColor: 'rgba(234, 88, 12, 0.85)',
                    borderColor: '#ea580c',
                    borderWidth: 1.5,
                    borderRadius: 8,
                    maxBarThickness: 42
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    })();
</script>
@endsection
