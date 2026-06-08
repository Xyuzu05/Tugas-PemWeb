@extends('layouts.app')

@section('title', 'Dashboard - Sistem Perpustakaan')

@section('content')
<div class="mb-4">
    <h1>
        <i class="bi bi-speedometer2"></i>
        Dashboard
    </h1>
    <p class="text-muted">Ringkasan statistik dan data terbaru Sistem Perpustakaan</p>
</div>

{{-- Statistik Buku --}}
<div class="row mb-5">
    <div class="col-md-4 mb-3">
        <div class="card border-left-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted text-uppercase font-weight-bold">Total Buku</h6>
                        <h2 class="text-primary">{{ $totalBuku }}</h2>
                    </div>
                    <i class="bi bi-book-fill text-primary" style="font-size: 3rem; opacity: 0.5;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card border-left-success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted text-uppercase font-weight-bold">Buku Tersedia</h6>
                        <h2 class="text-success">{{ $bukuTersedia }}</h2>
                    </div>
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem; opacity: 0.5;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card border-left-danger">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted text-uppercase font-weight-bold">Buku Habis</h6>
                        <h2 class="text-danger">{{ $bukuHabis }}</h2>
                    </div>
                    <i class="bi bi-x-circle-fill text-danger" style="font-size: 3rem; opacity: 0.5;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Statistik Anggota --}}
<div class="row mb-5">
    <div class="col-md-4 mb-3">
        <div class="card border-left-info">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted text-uppercase font-weight-bold">Total Anggota</h6>
                        <h2 class="text-info">{{ $totalAnggota }}</h2>
                    </div>
                    <i class="bi bi-people-fill text-info" style="font-size: 3rem; opacity: 0.5;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card border-left-success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted text-uppercase font-weight-bold">Anggota Aktif</h6>
                        <h2 class="text-success">{{ $anggotaAktif }}</h2>
                    </div>
                    <i class="bi bi-person-check-fill text-success" style="font-size: 3rem; opacity: 0.5;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card border-left-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted text-uppercase font-weight-bold">Anggota Nonaktif</h6>
                        <h2 class="text-warning">{{ $anggotaNonaktif }}</h2>
                    </div>
                    <i class="bi bi-person-x-fill text-warning" style="font-size: 3rem; opacity: 0.5;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    {{-- Buku Terbaru --}}
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-calendar-event"></i>
                    5 Buku Terbaru
                </h5>
            </div>
            <div class="card-body">
                @forelse ($bukuTerbaru as $buku)
                    <div class="mb-3 pb-3 border-bottom">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">
                                    <a href="{{ route('buku.show', $buku->id) }}" class="text-decoration-none">
                                        {{ $buku->judul }}
                                    </a>
                                </h6>
                                <small class="text-muted">
                                    {{ $buku->pengarang }} | {{ $buku->tahun_terbit }}
                                </small>
                                <div class="mt-2">
                                    <span class="badge bg-info">{{ $buku->kategori }}</span>
                                    @if ($buku->stok > 0)
                                        <span class="badge bg-success">Tersedia: {{ $buku->stok }}</span>
                                    @else
                                        <span class="badge bg-danger">Habis</span>
                                    @endif
                                </div>
                            </div>
                            <div class="text-end ms-2">
                                <strong class="text-primary">Rp {{ number_format($buku->harga, 0, ',', '.') }}</strong>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted text-center">Tidak ada data buku</p>
                @endforelse
            </div>
            <div class="card-footer">
                <a href="{{ route('buku.index') }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-arrow-right"></i> Lihat Semua Buku
                </a>
            </div>
        </div>
    </div>

    {{-- Anggota Terbaru --}}
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">
                    <i class="bi bi-calendar-event"></i>
                    5 Anggota Terbaru
                </h5>
            </div>
            <div class="card-body">
                @forelse ($anggotaTerbaru as $anggota)
                    <div class="mb-3 pb-3 border-bottom">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">
                                    <a href="{{ route('anggota.show', $anggota->id) }}" class="text-decoration-none">
                                        {{ $anggota->nama }}
                                    </a>
                                </h6>
                                <small class="text-muted">
                                    <i class="bi bi-envelope"></i> {{ $anggota->email }}
                                </small>
                                <div class="mt-2">
                                    @if ($anggota->jenis_kelamin == 'Laki-laki')
                                        <span class="badge bg-info">
                                            <i class="bi bi-gender-male"></i> Laki-laki
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            <i class="bi bi-gender-female"></i> Perempuan
                                        </span>
                                    @endif
                                    @if ($anggota->status == 'Aktif')
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    @endif
                                </div>
                            </div>
                            <div class="text-end ms-2">
                                <small class="text-muted d-block">
                                    <i class="bi bi-calendar-check"></i><br>
                                    {{ $anggota->created_at->format('d/m/Y') }}
                                </small>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted text-center">Tidak ada data anggota</p>
                @endforelse
            </div>
            <div class="card-footer">
                <a href="{{ route('anggota.index') }}" class="btn btn-sm btn-success">
                    <i class="bi bi-arrow-right"></i> Lihat Semua Anggota
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Quick Links --}}
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">
                    <i class="bi bi-lightning"></i>
                    Quick Links Menu Utama
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('buku.index') }}" class="btn btn-outline-primary btn-block w-100">
                            <i class="bi bi-book"></i> Kelola Buku
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('anggota.index') }}" class="btn btn-outline-success btn-block w-100">
                            <i class="bi bi-people"></i> Kelola Anggota
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('buku.create') }}" class="btn btn-outline-info btn-block w-100">
                            <i class="bi bi-plus-circle"></i> Tambah Buku
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('anggota.create') }}" class="btn btn-outline-warning btn-block w-100">
                            <i class="bi bi-person-plus"></i> Tambah Anggota
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
