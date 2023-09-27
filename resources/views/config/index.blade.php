@extends('layouts.main')

@section('container')
    <h2 class="mb-3">Konfigurasi Tanggal PPDB</h2>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="container mb-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Jenis Aktivitas</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pendaftaran Akun PPDB</td>
                    <td>{{ $config->pendaftaran_akun_ppdb_start }}</td>
                    <td>{{ $config->pendaftaran_akun_ppdb_due }}</td>
                </tr>
                <tr>
                    <td>Pengumpulan berkas</td>
                    <td>{{ $config->pengumpulan_berkas_start }}</td>
                    <td>{{ $config->pengumpulan_berkas_due }}</td>
                </tr>
                <tr>
                    <td>Tes Akademik</td>
                    <td>{{ $config->test_akademik_start }}</td>
                    <td>{{ $config->test_akademik_due }}</td>
                </tr>
                <tr>
                    <td>Tes Baca Al-Qur'an</td>
                    <td>{{ $config->test_baca_al_quran_start }}</td>
                    <td>{{ $config->test_baca_al_quran_due }}</td>
                </tr>
                {{-- <tr>
                    <td>Tes Wawancara</td>
                    <td>{{$config->test_wawancara_start}}</td>
                    <td>{{$config->test_wawancara_due}}</td>
                </tr> --}}
                <tr>
                    <td>Pendaftaran Ulang</td>
                    <td>{{ $config->pendaftaran_ulang_start }}</td>
                    <td>{{ $config->pendaftaran_ulang_due }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <a href="/config/edit" class="btn btn-warning btn-block">Update tanggal</a>
@endsection
