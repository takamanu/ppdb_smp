@extends('layouts.main')

@section('container')
    <div class="card">
        <div class="card-header">Lihat Siswa {{ $agen->nama_lengkap }}</div>
        <div class="card-body">
            <!-- Section 1: Data Pribadi -->
            <h3 class="mb-5">Data Pribadi</h3>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $agen->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>NISN</th>
                        <td>{{ $agen->nisn }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $agen->email }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $agen->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Lahir</th>
                        <td>{{ $agen->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $agen->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $agen->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>{{ $agen->agama }}</td>
                    </tr>
                    <tr>
                        <th>Asal Sekolah</th>
                        <td>{{ $agen->asal_sekolah }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Sekolah</th>
                        <td>{{ $agen->alamat_sekolah }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Hafalan</th>
                        <td>{{ $agen->jumlah_hafalan }}</td>
                    </tr>
                </tbody>
            </table>

            <!-- Section 2: Informasi Keluarga -->
            <h3 class="mb-5">Informasi Keluarga</h3>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Nama Ayah</th>
                        <td>{{ $agen->nama_ayah }}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan Ayah</th>
                        <td>{{ $agen->pekerjaan_ayah }}</td>
                    </tr>
                    <tr>
                        <th>Penghasilan Ayah</th>
                        <td>{{ $agen->penghasilan_ayah }}</td>
                    </tr>
                    <tr>
                        <th>Pendidikan Terakhir Ayah</th>
                        <td>{{ $agen->pendidikan_terakir_ayah }}</td>
                    </tr>
                    <tr>
                        <th>No. WhatsApp Ayah</th>
                        <td>{{ $agen->no_wa_ayah }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ibu</th>
                        <td>{{ $agen->nama_ibu }}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan Ibu</th>
                        <td>{{ $agen->pekerjaan_ibu }}</td>
                    </tr>
                    <tr>
                        <th>Penghasilan Ibu</th>
                        <td>{{ $agen->penghasilan_ibu }}</td>
                    </tr>
                    <tr>
                        <th>Pendidikan Terakhir Ibu</th>
                        <td>{{ $agen->pendidikan_terakir_ibu }}</td>
                    </tr>
                    <tr>
                        <th>No. WhatsApp Ibu</th>
                        <td>{{ $agen->no_wa_ibu }}</td>
                    </tr>
                </tbody>
            </table>

            <!-- Section 3: Data Wali Siswa -->
            <h3 class="mb-5">Data Wali Siswa</h3>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Nama Wali Siswa</th>
                        <td>{{ $agen->nama_wali_siswa }}</td>
                    </tr>
                    <tr>
                        <th>Hubungan dengan Siswa</th>
                        <td>{{ $agen->hubungan_dengan_siswa }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Wali Siswa</th>
                        <td>{{ $agen->alamat_wali_siswa }}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan Wali</th>
                        <td>{{ $agen->pekerjaan_wali }}</td>
                    </tr>
                    <tr>
                        <th>Penghasilan Wali</th>
                        <td>{{ $agen->penghasilan_wali }}</td>
                    </tr>
                    <tr>
                        <th>Pendidikan Terakhir Wali</th>
                        <td>{{ $agen->pendidikan_terakir_wali }}</td>
                    </tr>
                    <tr>
                        <th>No. WhatsApp Wali Siswa</th>
                        <td>{{ $agen->no_wa_wali_siswa }}</td>
                    </tr>
                </tbody>
            </table>

            <h3 class="mb-5">Policy</h3>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Policy (1)</th>
                        <td>{{ $agen->policy->perjanjian1 }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Percaya dan taat sepenuhnya kepada kebijaksanaan SMPTQ</td>
                    </tr>
                    <tr>
                        <th>Policy (2)</th>
                        <td>{{ $agen->policy->perjanjian2 }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Mendukung sunnah dan disiplin yang berlaku di SMPTQ</td>
                    </tr>
                    <tr>
                        <th>Policy (3)</th>
                        <td>{{ $agen->policy->perjanjian3 }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Memenuhi segala kewajiban yang telah ditetapkan oleh SMPTQ</td>
                    </tr>
                    <tr>
                        <th>Policy (4)</th>
                        <td>{{ $agen->policy->perjanjian4 }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Melunasi semua pembayaran uang sekolah dan uang makan sebelum Ujian Semester
                            Ganjil dan
                            Semester Genap</td>
                    </tr>
                    <!-- Add more rows for other policy information -->
                </tbody>
            </table>

            <h3 class="mb-3">Nilai</h3>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Matematika</th>
                        <td>{{ $agen->nilai->matematika }}</td>
                    </tr>
                    <tr>
                        <th>Ilmu Pengetahuan Alam</th>
                        <td>{{ $agen->nilai->ilmu_pengetahuan_alam }}</td>
                    </tr>
                    <tr>
                        <th>Bahasa Indonesia</th>
                        <td>{{ $agen->nilai->bahasa_indonesia }}</td>
                    </tr>
                    <tr>
                        <th>Tes Baca Al-Qur'an</th>
                        <td>{{ $agen->nilai->test_membaca_al_quran }}</td>
                    </tr>
                    <tr>
                        <th>Status Kelulusan</th>
                        <td>{{ $agen->nilai->status }}</td>
                    </tr>
                </tbody>
            </table>

            <!-- Section 4: Lainnya -->
            <h3 class="mb-3">Lainnya</h3>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Motivasi</th>
                        <td>{{ $agen->motivasi }}</td>
                    </tr>
                    <tr>
                        <th>Daftar Sekolah Lain</th>
                        <td>
                            @if ($agen->daftar_sekolah_lain == 1)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Sekolah Jika Daftar</th>
                        <td>{{ $agen->nama_sekolahnya_jika_daftar }}</td>
                    </tr>
                    <tr>
                        <th>Informasi Didapatkan Dari</th>
                        <td>{{ $agen->informasi_didapatkan_dari }}</td>
                    </tr>
                    <!-- Add more rows for other additional information -->
                </tbody>
            </table>
            {{-- @if (!is_null($siswaagen->registrasi_ulang)) --}}
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Ijazah</th>
                            <td><a href="{{ $user->registrasi_ulang->ijazah }}">{{ $user->registrasi_ulang->ijazah }}</a></td>
                        </tr>
                        <tr>
                            <th>Surat Pernyataan Bermaterai</th>
                            <td>
                                <a href="{{ $user->registrasi_ulang->surat_pernyataan_bermaterai }}">{{ $user->registrasi_ulang->surat_pernyataan_bermaterai }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Surat Keterangan Siswa Aktif SD Asal</th>
                            <td>
                                <a href="{{ $user->registrasi_ulang->surat_keterangan_siswa_aktif_sd_asal }}">{{ $user->registrasi_ulang->surat_keterangan_siswa_aktif_sd_asal }}</a>

                            </td>
                        </tr>
                        <tr>
                            <th>Pasfoto</th>
                            <td>
                                <a href="{{ $user->registrasi_ulang->pasfoto }}">{{ $user->registrasi_ulang->pasfoto }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Akta Kelahiran</th>
                            <td>
                                <a href="{{ $user->registrasi_ulang->akta_kelahiran }}">{{ $user->registrasi_ulang->akta_kelahiran }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Kartu Keluarga</th>
                            <td>
                                <a href="{{ $user->registrasi_ulang->kk }}">{{ $user->registrasi_ulang->kk }}</a>
                            </td>
                        </tr>
                        <!-- Add more rows for other additional information -->
                    </tbody>
                </table>
            {{-- @else
                No data for registration ulang.
            @endif --}}


            <br>
            <div class="row">
                <div class="col">
                    <a href="{{ url()->previous() }}" class="btn btn-danger btn-block">Back</a>
                </div>
            </div>
        </div>
    </div>
@stop
