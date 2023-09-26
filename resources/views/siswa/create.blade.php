@extends('layouts.main')

@section('container')

    <body class="bg-gradient-primary">
        {{-- <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> --}}

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <div class="card w-75">
            <div class="card-header"><b>Isi Datapokok</b></div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="p-5">
                           <form method="POST" action="{{ route('siswa.store') }}" enctype="multipart/form-data">
                                @csrf
                                <h3 class="mb-3">Data Pribadi</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="nama_lengkap" type="text"
                                                class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                name="nama_lengkap" value="{{ old('nama_lengkap') }}" required
                                                placeholder="Nama Lengkap">
                                            @error('nama_lengkap')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="nisn" type="text"
                                                class="form-control @error('nisn') is-invalid @enderror" name="nisn"
                                                value="{{ old('nisn') }}" required placeholder="NISN">
                                            @error('nisn')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Add the jenis_kelamin field -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="jenis_kelamin"
                                                class="form-select form-control @error('jenis_kelamin') is-invalid @enderror"
                                                name="jenis_kelamin" required>
                                                <option value="laki" selected disabled>Pilih jenis kelamin
                                                </option>
                                                <option value="laki"
                                                    {{ old('jenis_kelamin') == 'laki' ? 'selected' : '' }}>Laki-Laki
                                                </option>
                                                <option value="perempuan"
                                                    {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan
                                                </option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <!-- Add the tempat_lahir field -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="tempat_lahir" type="text"
                                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                name="tempat_lahir" value="{{ old('tempat_lahir') }}" required
                                                placeholder="Tempat Lahir">
                                            @error('tempat_lahir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="tanggal_lahir" type="date"
                                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                                            @error('tanggal_lahir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="jumlah_hafalan"
                                                class="form-select form-control @error('jumlah_hafalan') is-invalid @enderror"
                                                name="jumlah_hafalan" required>
                                                <option value="0"
                                                    {{ old('jumlah_hafalan', '0') == '0' ? 'selected disabled' : '' }}>
                                                    Pilih Jumlah Hafalan Juz</option>
                                                @for ($i = 1; $i <= 30; $i++)
                                                    <option value="{{ $i }}"
                                                        {{ old('jumlah_hafalan') == $i ? 'selected' : '' }}>
                                                        {{ $i }} Juz</option>
                                                @endfor
                                            </select>

                                            @error('jumlah_hafalan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="agama" type="text"
                                                class="form-control @error('agama') is-invalid @enderror" name="agama"
                                                value="{{ old('agama') }}" required placeholder="Agama">
                                            @error('agama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="form-group form-outline">
                                        <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required
                                            placeholder="Alamat Siswa">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="asal_sekolah" type="text"
                                                class="form-control @error('asal_sekolah') is-invalid @enderror"
                                                name="asal_sekolah" value="{{ old('asal_sekolah') }}" required
                                                placeholder="Asal Sekolah">
                                            @error('asal_sekolah')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="form-group form-outline">
                                        <textarea id="alamat_sekolah" class="form-control @error('alamat_sekolah') is-invalid @enderror"
                                            name="alamat_sekolah" required placeholder="Alamat Sekolah">{{ old('alamat_sekolah') }}</textarea>
                                        @error('alamat_sekolah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Add the asal_sekolah field -->


                                <!-- Add the alamat_sekolah field -->


                                <!-- Add the jumlah_hafalan field -->

                                <h3 class="mb-3">Informasi Keluarga</h3>
                                <!-- Add the nama_ayah field -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline mb-3">
                                            <input id="nama_ayah" type="text"
                                                class="form-control @error('nama_ayah') is-invalid @enderror"
                                                name="nama_ayah" value="{{ old('nama_ayah') }}" required
                                                placeholder="Nama Ayah">
                                            @error('nama_ayah')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="no_wa_ayah" type="text"
                                                class="form-control @error('no_wa_ayah') is-invalid @enderror"
                                                name="no_wa_ayah" value="{{ old('no_wa_ayah') }}" required
                                                placeholder="No. WhatsApp Ayah">
                                            @error('no_wa_ayah')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <!-- Add the pekerjaan_ayah field -->


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="pendidikan_terakir_ayah"
                                                class="form-select form-control @error('pendidikan_terakir_ayah') is-invalid @enderror"
                                                name="pendidikan_terakir_ayah" required>
                                                <option value="0" disabled selected>Pilih Pendidikan Terakhir Ayah
                                                </option>
                                                <option value="sd"
                                                    {{ old('pendidikan_terakir_ayah') == 'sd' ? 'selected' : '' }}>SD
                                                </option>
                                                <option value="smp"
                                                    {{ old('pendidikan_terakir_ayah') == 'smp' ? 'selected' : '' }}>SMP
                                                </option>
                                                <!-- Add other options as needed -->
                                            </select>
                                            @error('pendidikan_terakir_ayah')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="pekerjaan_ayah" type="text"
                                                class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                                                name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" required
                                                placeholder="Pekerjaan Ayah">
                                            @error('pekerjaan_ayah')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Add the penghasilan_ayah field -->
                                        <div class="form-group form-outline">
                                            <select id="penghasilan_ayah"
                                                class="form-select form-control @error('penghasilan_ayah') is-invalid @enderror"
                                                name="penghasilan_ayah" required>
                                                <option value="0" disabled selected>Pilih Kategori Penghasilan Ayah
                                                </option>
                                                <option value="1"
                                                    {{ old('penghasilan_ayah') == '1' ? 'selected' : '' }}>1</option>
                                                <option value="2"
                                                    {{ old('penghasilan_ayah') == '2' ? 'selected' : '' }}>2</option>
                                                <!-- Add other options as needed -->
                                            </select>
                                            @error('penghasilan_ayah')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <!-- Add the pendidikan_terakir_ayah field -->


                                <!-- Add the no_wa_ayah field -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="nama_ibu" type="text"
                                                class="form-control @error('nama_ibu') is-invalid @enderror"
                                                name="nama_ibu" value="{{ old('nama_ibu') }}" required
                                                placeholder="Nama Ibu">
                                            @error('nama_ibu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="no_wa_ibu" type="text"
                                                class="form-control @error('no_wa_ibu') is-invalid @enderror"
                                                name="no_wa_ibu" value="{{ old('no_wa_ibu') }}" required
                                                placeholder="No. WhatsApp Ibu">
                                            @error('no_wa_ibu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="pendidikan_terakir_ibu"
                                                class="form-select form-control @error('pendidikan_terakir_ibu') is-invalid @enderror"
                                                name="pendidikan_terakir_ibu" required>
                                                <option value="0" disabled selected>Pilih Pendidikan Terakhir Ibu
                                                </option>
                                                <option value="sd"
                                                    {{ old('pendidikan_terakir_ibu') == 'sd' ? 'selected' : '' }}>SD
                                                </option>
                                                <option value="smp"
                                                    {{ old('pendidikan_terakir_ibu') == 'smp' ? 'selected' : '' }}>SD
                                                </option>
                                            </select>
                                            @error('pendidikan_terakir_ibu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="pekerjaan_ibu" type="text"
                                                class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                                name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" required
                                                placeholder="Pekerjaan Ibu">
                                            @error('pekerjaan_ibu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="penghasilan_ibu"
                                                class="form-select form-control @error('penghasilan_ibu') is-invalid @enderror"
                                                name="penghasilan_ibu" required>
                                                <option value="0" disabled selected>Pilih Kategori Penghasilan Ibu
                                                </option>
                                                <option value="1"
                                                    {{ old('penghasilan_ibu') == '1' ? 'selected' : '' }}>1
                                                </option>
                                                <option value="2"
                                                    {{ old('penghasilan_ibu') == '2' ? 'selected' : '' }}>2
                                                </option>
                                                <!-- Add other options as needed -->
                                            </select>
                                            @error('penghasilan_ibu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <h3 class="mb-3">Data Wali Siswa</h3>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="nama_wali_siswa" type="text"
                                                class="form-control @error('nama_wali_siswa') is-invalid @enderror"
                                                name="nama_wali_siswa" value="{{ old('nama_wali_siswa') }}" required
                                                placeholder="Nama Wali Siswa">
                                            @error('nama_wali_siswa')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="no_wa_wali_siswa" type="text"
                                                class="form-control @error('no_wa_wali_siswa') is-invalid @enderror"
                                                name="no_wa_wali_siswa" value="{{ old('no_wa_wali_siswa') }}" required
                                                placeholder="No. WhatsApp Wali Siswa">
                                            @error('no_wa_wali_siswa')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="hubungan_dengan_siswa" type="text"
                                                class="form-control @error('hubungan_dengan_siswa') is-invalid @enderror"
                                                name="hubungan_dengan_siswa" value="{{ old('hubungan_dengan_siswa') }}"
                                                required placeholder="Hubungan dengan Siswa">
                                            @error('hubungan_dengan_siswa')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="alamat_wali_siswa" type="text"
                                                class="form-control @error('alamat_wali_siswa') is-invalid @enderror"
                                                name="alamat_wali_siswa" value="{{ old('alamat_wali_siswa') }}" required
                                                placeholder="Alamat Wali Siswa">
                                            @error('alamat_wali_siswa')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="pendidikan_terakir_wali"
                                                class="form-select form-control @error('pendidikan_terakir_wali') is-invalid @enderror"
                                                name="pendidikan_terakir_wali" required>
                                                <option value="0" disabled selected>Pilih Pendidikan Terakhir Wali
                                                </option>
                                                <option value="sd"
                                                    {{ old('pendidikan_terakir_wali') == 'sd' ? 'selected' : '' }}>SD
                                                </option>
                                                <option value="smp"
                                                    {{ old('pendidikan_terakir_wali') == 'smp' ? 'selected' : '' }}>SMP
                                                </option>
                                                <!-- Add other options as needed -->
                                            </select>
                                            @error('pendidikan_terakir_wali')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="pekerjaan_wali" type="text"
                                                class="form-control @error('pekerjaan_wali') is-invalid @enderror"
                                                name="pekerjaan_wali" value="{{ old('pekerjaan_wali') }}" required
                                                placeholder="Pekerjaan Wali">
                                            @error('pekerjaan_wali')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="penghasilan_wali"
                                                class="form-select form-control @error('penghasilan_wali') is-invalid @enderror"
                                                name="penghasilan_wali" required>
                                                <option value="0" disabled selected>Pilih Kategori Penghasilan Wali
                                                </option>
                                                <option value="1"
                                                    {{ old('penghasilan_wali') == '1' ? 'selected' : '' }}>1
                                                </option>
                                                <option value="2"
                                                    {{ old('penghasilan_wali') == '2' ? 'selected' : '' }}>2
                                                </option>
                                                <!-- Add other options as needed -->
                                            </select>
                                            @error('penghasilan_wali')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <h3 class="mb-3">Masukkan Nilai</h3>

                                <!-- Previous input fields (nama_wali_siswa, no_wa_wali_siswa, hubungan_dengan_siswa, alamat_wali_siswa, pendidikan_terakir_wali, pekerjaan_wali, penghasilan_wali) -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="matematika" type="number"
                                                class="form-control @error('matematika') is-invalid @enderror"
                                                name="matematika" value="{{ old('matematika') }}" required
                                                placeholder="Nilai Matematika">
                                            @error('matematika')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="ilmu_pengetahuan_alam" type="number"
                                                class="form-control @error('ilmu_pengetahuan_alam') is-invalid @enderror"
                                                name="ilmu_pengetahuan_alam" value="{{ old('ilmu_pengetahuan_alam') }}"
                                                required placeholder="Nilai Ilmu Pengetahuan Alam (IPA)">
                                            @error('ilmu_pengetahuan_alam')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="bahasa_indonesia" type="number"
                                                class="form-control @error('bahasa_indonesia') is-invalid @enderror"
                                                name="bahasa_indonesia" value="{{ old('bahasa_indonesia') }}" required
                                                placeholder="Nilai Bahasa Indonesia">
                                            @error('bahasa_indonesia')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="test_membaca_al_quran" type="number"
                                                class="form-control @error('test_membaca_al_quran') is-invalid @enderror"
                                                name="test_membaca_al_quran" value="{{ old('test_membaca_al_quran') }}"
                                                required placeholder="Nilai Test Membaca Al-Quran">
                                            @error('test_membaca_al_quran')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="row mb-5">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="status" type="text"
                                                class="form-control @error('status') is-invalid @enderror" name="status"
                                                value="{{ old('status') }}" required placeholder="Status">
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}


                                <!-- Add the hubungan_dengan_siswa field -->


                                <!-- Add the alamat_wali_siswa field -->


                                <!-- Add the pekerjaan_wali field -->


                                <!-- Add the penghasilan_wali field -->


                                <!-- Add the pendidikan_terakir_wali field -->


                                <!-- Add the no_wa_wali_siswa field -->

                                {{-- <h3 class="mb-3">Lainnya</h3>

                                <!-- Add the motivasi field -->
                                <div class="row">

                                </div>
                                <div class="form-group form-outline">
                                    <textarea id="motivasi" class="form-control @error('motivasi') is-invalid @enderror" name="motivasi" required
                                        placeholder="Motivasi">{{ old('motivasi') }}</textarea>
                                    @error('motivasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Add the daftar_sekolah_lain field -->
                                <div class="form-group form-outline">
                                    <select id="daftar_sekolah_lain"
                                        class="form-select form-control @error('daftar_sekolah_lain') is-invalid @enderror"
                                        name="daftar_sekolah_lain" required>
                                        <option value="Yes"
                                            {{ old('daftar_sekolah_lain') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="No" {{ old('daftar_sekolah_lain') == 'No' ? 'selected' : '' }}>
                                            No</option>
                                    </select>
                                    @error('daftar_sekolah_lain')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Add the nama_sekolahnya_jika_daftar field -->
                                <div class="form-group form-outline">
                                    <input id="nama_sekolahnya_jika_daftar" type="text"
                                        class="form-control @error('nama_sekolahnya_jika_daftar') is-invalid @enderror"
                                        name="nama_sekolahnya_jika_daftar"
                                        value="{{ old('nama_sekolahnya_jika_daftar') }}"
                                        placeholder="Nama Sekolah Jika Daftar">
                                    @error('nama_sekolahnya_jika_daftar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Add the informasi_didapatkan_dari field -->
                                <div class="form-group form-outline">
                                    <input id="informasi_didapatkan_dari" type="text"
                                        class="form-control @error('informasi_didapatkan_dari') is-invalid @enderror"
                                        name="informasi_didapatkan_dari" value="{{ old('informasi_didapatkan_dari') }}"
                                        placeholder="Informasi Didapatkan Dari">
                                    @error('informasi_didapatkan_dari')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group form-outline">
                                    <label for="avatar" class="text-md-right">Please upload avatar</label>
                                    <input id="avatar" type="file"
                                        class="form-control @error('avatar') is-invalid @enderror" name="avatar">
                                    @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}




                                <button type="submit" class="btn btn-primary btn-block">{{ __('Tambah') }}</button>
                                <a href="{{ url()->previous() }}" class="btn btn-danger btn-block">Back</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- </div>
    </div> --}}

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <script>
            const togglePassword = document.querySelector("#togglePassword");
            const password = document.querySelector("#password");
            const passwordConfirm = document.querySelector("#password-confirm");

            togglePassword.addEventListener("click", function(e) {
                // toggle the type attribute
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);

                // toggle the icon
                this.classList.toggle("bi-eye");
            });

            togglePassword.addEventListener("click", function(e) {
                // toggle the type attribute
                const type = passwordConfirm.getAttribute("type") === "password" ? "text" : "password";
                passwordConfirm.setAttribute("type", type);

                // toggle the icon
                // this.classList.toggle("bi-eye");
            });

            // prevent form submit
            const form = document.querySelector("form");
            form.addEventListener('submit', function(e) {
                e.preventDefault();
            });
        </script>
    </body>

@stop
