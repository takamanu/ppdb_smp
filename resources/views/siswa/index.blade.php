@extends('layouts/main')

@section('container')
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-2 text-gray-800">Dashboard Siswa</h1>
        <h6>Selamat datang, {{ $user->name }}</h6>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

    <div class="card text-center mb-5">
        <div class="card-header">
            <h2>SMPTQ PANGERAN DIPONEGORO</h2>
        </div>
        <div class="card-body">
            <h5 class="card-title mb-5">Kartu Peserta PPDB SMP TQ Pangeran Diponegoro</h5>
            <div class="row mb-5">
                <div class="col-md-6">
                    <p class="card-text">
                        <img class="img-profile rounded-circle" width="50%"
                            src="{{ asset(Auth::user()->avatar) }}">
                    </p>
                </div>
                @if ($agen == 'NULL')
                    <div class="col-md-6">
                        <p class="card-text">
                        <div class="row">
                            <div class="col-md-6 d-flex justify-content-start">
                                <p class="text-start">Nama:</p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-start">Belum isi datapokok</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 d-flex justify-content-start">
                                <p class="text-start">No. Peserta:</p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-start">Belum isi datapokok</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 d-flex justify-content-start">
                                <p class="text-start">Asal Sekolah:</p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-start">Belum isi datapokok</div>
                        </div>
                        </p>
                    </div>
                @else
                    <div class="col-md-6">
                        <p class="card-text">
                        <div class="row">
                            <div class="col-md-6 d-flex justify-content-start">
                                <p class="text-start">Nama:</p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-start">{{ $agen->nama_lengkap }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 d-flex justify-content-start">
                                <p class="text-start">No. Peserta:</p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-start">{{ $agen->nisn }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 d-flex justify-content-start">
                                <p class="text-start">Asal Sekolah:</p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-start">{{ $agen->asal_sekolah }}</div>
                        </div>
                        </p>
                    </div>
                @endif


            </div>

        </div>
        <div class="card-footer text-body-secondary">
            <button onclick="alert('Coming soon')" class="btn btn-primary btn-block">Cetak profil</a>
        </div>
    </div>

    <div class="card text-center mb-5">
        <div class="card-header">
            <h2>Aktivitas Pembayaran & Datapokok</h2>
        </div>
        <div class="card-body p-5">
            {{-- <h5 class="card-title mb-5">Kartu Peserta PPDB SMP TQ Pangeran Diponegoro</h5> --}}
            <div class="row row-cols-1 row-cols-md-2 g-4 d-flex justify-content-center">
                <div class="col d-flex justify-content-center">
                    <div class="card max-card-size">
                        <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Pembayaran</h5>
                            <p class="card-text"><button class="btn btn-success btn-sm btn-block"
                                    disabled>Success</button></p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">

                    {{-- <h5 class="card-title">Datapokok</h5> --}}
                    @if ($agen == 'NULL')
                        <div class="card max-card-size">
                            <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Datapokok</h5>
                                <p class="card-text"><a href="/siswa/create"
                                        class="btn btn-danger btn-sm btn-block">Belum
                                        Isi</a></p>
                            </div>
                        </div>
                    @else
                        <div class="card max-card-size">
                            <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Datapokok</h5>
                                <p class="card-text"><button class="btn btn-success btn-sm btn-block"
                                        disabled>Success</button></p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="card text-center mb-5">
        <div class="card-header">
            <h2>Alur Seleksi</h2>
        </div>
        <div class="card-body p-5">
            {{-- <h5 class="card-title mb-5">Kartu Peserta PPDB SMP TQ Pangeran Diponegoro</h5> --}}
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                <div class="col d-flex justify-content-center">
                    <div class="card max-card-size">
                        <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Pendaftaran Akun PPDB</h5>
                            <p class="card-text">2 Agustus - 10 Agustus 2023</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card max-card-size">
                        <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Pengumpulan berkas</h5>
                            <p class="card-text">2 Agustus - 17 Agustus 2023</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card max-card-size">
                        <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Tes Akademik</h5>
                            <p class="card-text">20 Agustus - 24 Agustus 2023</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col d-flex justify-content-center">
                    <div class="card max-card-size">
                        <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Tes Baca Al-Quran</h5>
                            <p class="card-text">27 Agustus - 31 Agustus 2023</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card max-card-size">
                        <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Tes Wawancara</h5>
                            <p class="card-text">3 September - 7 September 2023</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card max-card-size">
                        <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Pendaftaran Ulang</h5>
                            <p class="card-text">10 September - 14 September 2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-body-secondary ">
            <button onclick="alert('Coming soon')" class="btn btn-primary btn-block">Cek Pengumuman</a>
        </div>
    </div>
@endsection
