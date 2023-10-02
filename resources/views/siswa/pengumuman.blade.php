@extends('layouts.main')

@section('container')
    <h2 class="mb-3">Hasil Pengumuman {{ $siswa->nama_lengkap }}</h2>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="container mb-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Jenis Tes</th>
                    <th>Hasil Nilai</th>
                    {{-- <th>Tanggal Berakhir</th> --}}
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Matematika</td>
                    <td> {{ $siswa->nilai->matematika }}</td>
                    {{-- <td></td> --}}
                </tr>
                <tr>
                    <td>Ilmu Pengetahuan Alam</td>
                    <td>{{ $siswa->nilai->ilmu_pengetahuan_alam }}</td>
                    {{-- <td></td> --}}
                </tr>
                <tr>
                    <td>Bahasa Indonesia</td>
                    <td>{{ $siswa->nilai->bahasa_indonesia }}</td>
                    {{-- <td></td> --}}
                </tr>
                <tr>
                    <td>Tes Baca Al-Qur'an</td>
                    <td>{{ $siswa->nilai->test_membaca_al_quran }}</td>
                    {{-- <td></td> --}}
                </tr>
                {{-- <tr>
                    <td>Tes Wawancara</td>
                    <td>{{$config->test_wawancara_start}}</td>
                    <td>{{$config->test_wawancara_due}}</td>
                </tr> --}}
                <tr>
                    <td>Hasil tes</td>
                    <td>{{ $siswa->nilai->status }}</td>
                    {{-- <td></td> --}}

                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    @if ($user->datapokok->nilai->status == 'Tidak Lulus')
        <a href="#" class="btn btn-primary btn-block" disabled>Jangan putus asa dan tetep semangat!</a>
    @elseif (is_null(Auth::user()->registrasi_ulang))
        <a href="{{ url('/siswa/registrasi/' . $siswa->id) }}" class="btn btn-primary btn-block">Registrasi Ulang</a>
        <hr>
        <a href="{{ url('/siswa/cetak/' . $siswa->id) }}" title="Cetak Datapokok Siswa"
            class="btn btn-success btn-block">Cetak
            Datapokok</a>
    @else
        <button onclick="alert('Kamu sudah melakukan registrasi ulang!')" class="btn btn-primary btn-block mb-3"
            disabled>Registrasi Ulang</button>
        <div class="alert alert-success mb-3">
            Kamu sudah melakukan registrasi ulang!
        </div>
        <div class="alert alert-success">
            Silahkan join grup whatsapp: <a href="{{ $config->redirect_wa }}">{{ $config->redirect_wa }}</a>
        </div>
        <hr>
        <a href="{{ url('/siswa/cetak/' . $siswa->id) }}" title="Cetak Datapokok Siswa"
            class="btn btn-success btn-block">Cetak
            Datapokok</a>
    @endif
    {{-- <a href="/" class="btn btn-warning btn-block">Cetak Datapokok</a> --}}
    <a href="/siswa" class="btn btn-warning btn-block">Kembali ke dashboard</a>
@endsection
