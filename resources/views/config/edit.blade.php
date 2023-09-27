@extends('layouts.main')

@section('container')
    <h2 class="mb-3">Konfigurasi Tanggal PPDB</h2>

    <form action="/config/update" method="post">
        {!! csrf_field() !!}
        @method("PUT")
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
                        <td><input type="date" id="pendaftaran_akun_ppdb_start" name="pendaftaran_akun_ppdb_start" aria-label="pendaftaran_akun_ppdb_start" class="form-control" value="{{$config->pendaftaran_akun_ppdb_start}}"></td>
                        <td><input type="date" id="pendaftaran_akun_ppdb_due" name="pendaftaran_akun_ppdb_due" aria-label="pendaftaran_akun_ppdb_due" class="form-control" value="{{$config->pendaftaran_akun_ppdb_due}}"></td>
                    </tr>
                    <tr>
                        <td>Pengumpulan berkas</td>
                        <td><input type="date" id="pengumpulan_berkas_start" name="pengumpulan_berkas_start" aria-label="pengumpulan_berkas_start" class="form-control" value="{{$config->pengumpulan_berkas_start}}"></td>
                        <td><input type="date" id="pengumpulan_berkas_due" name="pengumpulan_berkas_due" aria-label="pengumpulan_berkas_due" class="form-control" value="{{$config->pengumpulan_berkas_due}}"></td>
                    </tr>
                    <tr>
                        <td>Tes Akademik</td>
                        <td><input type="date" id="test_akademik_start" name="test_akademik_start" aria-label="test_akademik_start" class="form-control" value="{{$config->test_akademik_start}}"></td>
                        <td><input type="date" id="test_akademik_due" name="test_akademik_due" aria-label="test_akademik_due" class="form-control" value="{{$config->test_akademik_due}}"></td>
                    </tr>
                    <tr>
                        <td>Tes Baca Al-Qur'an</td>
                        <td><input type="date" id="test_baca_al_quran_start" name="test_baca_al_quran_start" aria-label="test_baca_al_quran_start" class="form-control" value="{{$config->test_baca_al_quran_start}}"></td>
                        <td><input type="date" id="test_baca_al_quran_due" name="test_baca_al_quran_due" aria-label="test_baca_al_quran_due" class="form-control" value="{{$config->test_baca_al_quran_due}}"></td>
                    </tr>
                    {{-- <tr>
                        <td>Tes Wawancara</td>
                        <td><input type="date" id="test_wawancara_start" name="test_wawancara_start" aria-label="test_wawancara_start" class="form-control" value="{{$config->test_wawancara_start}}"></td>
                        <td><input type="date" id="test_wawancara_due" name="test_wawancara_due" aria-label="test_wawancara_due" class="form-control" value="{{$config->test_wawancara_due}}"></td>
                    </tr> --}}
                    <tr>
                        <td>Pendaftaran Ulang</td>
                        <td><input type="date" id="pendaftaran_ulang_start" name="pendaftaran_ulang_start" aria-label="pendaftaran_ulang_start" class="form-control" value="{{$config->pendaftaran_ulang_start}}"></td>
                        <td><input type="date" id="pendaftaran_ulang_due" name="pendaftaran_ulang_due" aria-label="pendaftaran_ulang_due" class="form-control" value="{{$config->pendaftaran_ulang_due}}"></td>
                    </tr>

                </tbody>

            </table>
        </div>
        <button class="btn btn-primary btn-block" type="submit">Submit perubahan</a>
    
    </form>

    
@endsection