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
                        <div class="rounded-circle" style="width: 150px; height: 150px; overflow: hidden;">
                            <img class="img-fluid" src="{{ asset(Auth::user()->avatar) }}" style="object-fit: cover; width: 100%; height: 100%;" alt="User Avatar">
                        </div>  
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
        {{-- <div class="card-footer text-body-secondary">
            <button onclick="alert('Coming soon')" class="btn btn-primary btn-block">Cetak profil</a>
        </div> --}}
    </div>
    @if (session('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @elseif (session('flash_message_danger'))
        <div class="alert alert-danger">
            {{ session('flash_message_danger') }}
        </div>
    @endif

    <div class="card text-center mb-5">
        <div class="card-header">
            <h2>Aktivitas Pembayaran & Datapokok</h2>
        </div>
        <div class="card-body p-5">
            {{-- <h5 class="card-title mb-5">Kartu Peserta PPDB SMP TQ Pangeran Diponegoro</h5> --}}
            <div class="row row-cols-1 row-cols-md-2 g-4 d-flex justify-content-center">

                <div class="col d-flex justify-content-center">
                    <div class="card max-card-size">

                        <form action="{{ route('payment.store') }}" method="post">
                            @csrf
                            @if (empty($payment))
                                <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Pembayaran</h5>
                                    <button type="submit" class="btn btn-danger btn-sm btn-block">Belum bayar</button>
                                </div>
                            @elseif ($payment->status_payment !== 2 && $payment->status !== 2)
                                <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Pembayaran</h5>
                                    {{-- <p class="card-text"> --}}
                                    <a href="/bayar" class="btn btn-danger btn-sm btn-block">Selesaikan pembayaran</a>
                                    {{-- </p> --}}
                                </div>
                            @else
                                <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Pembayaran</h5>
                                    <button class="btn btn-success btn-sm btn-block" disabled>Sudah bayar</button>
                                </div>
                            @endif
                        </form>


                    </div>
                </div>

                <div class="col d-flex justify-content-center">

                    {{-- <h5 class="card-title">Datapokok</h5> --}}
                    @if (empty($payment))
                        <div class="card max-card-size">
                            <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Datapokok</h5>
                                <p class="card-text"><button class="btn btn-warning btn-sm btn-block" disabled>Bayar
                                        terlebih
                                        dahulu</button>
                                </p>
                            </div>
                        </div>
                    @elseif ($payment->status_payment !== 2 && $payment->status !== 2)
                        <div class="card max-card-size">
                            <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Datapokok</h5>
                                <p class="card-text"><button class="btn btn-warning btn-sm btn-block" disabled>Bayar
                                        terlebih
                                        dahulu</button>
                                </p>
                            </div>
                        </div>
                    @elseif ($agen == 'NULL')
                        <div class="card max-card-size">
                            <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Datapokok</h5>
                                <p class="card-text"><a href="/siswa/create" class="btn btn-danger btn-sm btn-block">Belum
                                        Isi</a></p>
                            </div>
                        </div>
                    @else
                        <div class="card max-card-size">
                            <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Datapokok</h5>
                                <p class="card-text"><button class="btn btn-success btn-sm btn-block"
                                        disabled>Success</button>
                                </p>
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
                        @if ($date_now > $config->pendaftaran_akun_ppdb_due)
                            <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                        @else
                            <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">Pendaftaran Akun PPDB</h5>
                            <p class="card-text">{{ $config->pendaftaran_akun_ppdb_start }} s/d
                                {{ $config->pendaftaran_akun_ppdb_due }}</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card max-card-size">
                        @if ($date_now > $config->pengumpulan_berkas_due)
                            <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                        @else
                            <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">Pengumpulan berkas</h5>
                            <p class="card-text">{{ $config->pengumpulan_berkas_start }} s/d
                                {{ $config->pengumpulan_berkas_due }}</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card max-card-size">
                        @if ($date_now > $config->test_akademik_due)
                            <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                        @else
                            <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">Tes Akademik</h5>
                            <p class="card-text">{{ $config->test_akademik_start }} s/d {{ $config->test_akademik_due }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-around">
                <div class="col">
                    <div class="card max-card-size">
                        @if ($date_now > $config->test_baca_al_quran_due)
                            <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                        @else
                            <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">Tes Baca Al-Quran</h5>
                            <p class="card-text">{{ $config->test_baca_al_quran_start }} s/d
                                {{ $config->test_baca_al_quran_due }}</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="col d-flex justify-content-center">
                    <div class="card max-card-size">
                        @if ($date_now > $config->test_wawancara_start)
                            <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                        @else
                            <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">Tes Wawancara</h5>
                            <p class="card-text">{{$config->test_wawancara_start}} s/d {{$config->test_wawancara_due}}</p>
                        </div>
                    </div>
                </div> --}}
                <div class="col">
                    <div class="card max-card-size">
                        @if ($date_now > $config->pendaftaran_ulang_due)
                            <img src="/images/centang_sudah.png" class="card-img-top" alt="...">
                        @else
                            <img src="/images/centang_belum.png" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">Pendaftaran Ulang</h5>
                            <p class="card-text">{{ $config->pendaftaran_ulang_start }} s/d
                                {{ $config->pendaftaran_ulang_due }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer text-body-secondary ">
            @if ($config->pengumuman == 0)
                <a href="#" onclick="alert('Pengumuman belum dibuka!');" class="btn btn-primary btn-block">Cek
                    Pengumuman</a>
            @elseif (!is_null(Auth::user()->datapokok) && Auth::user()->datapokok->nilai->matematika === "Isi nilai A-E")
                <a href="#" onclick="alert('Kamu belum mempunyai nilai!');"
                    class="btn btn-primary btn-block">Cek Pengumuman</a>    
            @else
                @if (empty($payment))
                    <a href="#" onclick="alert('Kamu belum melakukan pembayaran!');"
                        class="btn btn-primary btn-block">Cek Pengumuman</a>
                @elseif ($payment->status_payment !== 2 && $payment->status !== 2)
                    <a href="#" onclick="alert('Kamu belum menyelesaikan pembayaran!');"
                        class="btn btn-primary btn-block">Cek Pengumuman</a>
                @elseif ($agen == 'NULL')
                    <a href="#" onclick="alert('Kamu belum mengisi datapokok!');"
                        class="btn btn-primary btn-block">Cek Pengumuman</a>
                @elseif (Auth::user()->datapokok->nilai->matematika === "Isi nilai A-E")
                    <a href="#" onclick="alert('Kamu belum mempunyai nilai!');"
                        class="btn btn-primary btn-block">Cek Pengumuman</a>        
                @else
                    <a href="{{ url('/siswa/pengumuman/' . Auth::user()->id) }}" class="btn btn-primary btn-block">Cek
                        Pengumuman</a>
                @endif
            @endif
        </div>
    </div>

    <!-- Include Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function fixAspect(img) {
            var $img = $(img),
                width = $img.width(),
                height = $img.height(),
                tallAndNarrow = width / height < 1;
            if (tallAndNarrow) {
                $img.addClass('tallAndNarrow');
            }
            $img.addClass('loaded');
        }
    </script>

    <script>
        // Using jQuery for simplicity, but you can use plain JavaScript as well
        $(document).ready(function() {

            // var payButton = document.getElementById('pay-button');

            // Add a click event listener to the "Bayar" button
            $('#exampleModal').on('click', '.btn-primary', function() {
                // Hide the current modal
                $('#exampleModal').modal('hide');

                // Show the second modal
                $('#secondModal').modal('show');
            });


        });
    </script>
@endsection
