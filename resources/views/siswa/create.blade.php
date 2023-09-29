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
                                <h3>Data Pribadi</h3>
                                <h6 class="mb-3" style="color:red;">*wajib diisi</h6>
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
                                                        {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>
                                                        Perempuan
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



                                    <h3>Informasi Keluarga</h3>
                                    <h6 class="mb-3" style="color:red;">*wajib diisi</h6>
                                        <!-- Add the nama_ayah field -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-outline mb-3">
                                                    <input id="nama_ayah" type="text"
                                                        class="form-control @error('nama_ayah') is-invalid @enderror"
                                                        name="nama_ayah" value="{{ old('nama_ayah') }}"
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
                                                        name="no_wa_ayah" value="{{ old('no_wa_ayah') }}"
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
                                                        name="pendidikan_terakir_ayah">
                                                        <option value="sd" disabled selected>Pilih Pendidikan Terakhir
                                                            Ayah
                                                        </option>
                                                        <option value="sd"
                                                            {{ old('pendidikan_terakir_ayah') == 'sd' ? 'selected' : '' }}>
                                                            SD
                                                        </option>
                                                        <option value="smp"
                                                            {{ old('pendidikan_terakir_ayah') == 'smp' ? 'selected' : '' }}>
                                                            SMP
                                                        </option>
                                                        <option value="sma"
                                                            {{ old('pendidikan_terakir_ayah') == 'sma' ? 'selected' : '' }}>
                                                            SMA
                                                        </option>
                                                        <option value="d1/2/3"
                                                            {{ old('pendidikan_terakir_ayah') == 'd1/2/3' ? 'selected' : '' }}>
                                                            D1/D2/D3
                                                        </option>
                                                        <option value="s1"
                                                            {{ old('pendidikan_terakir_ayah') == 's1' ? 'selected' : '' }}>
                                                            S1
                                                        </option>
                                                        <option value="s2"
                                                            {{ old('pendidikan_terakir_ayah') == 's2' ? 'selected' : '' }}>
                                                            S2
                                                        </option>
                                                        <option value="s3"
                                                            {{ old('pendidikan_terakir_ayah') == 's3' ? 'selected' : '' }}>
                                                            S3
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
                                                        name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" placeholder="Pekerjaan Ayah">
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
                                                        name="penghasilan_ayah">
                                                        <option value="1" disabled selected>Pilih Kategori Penghasilan
                                                            Ayah
                                                        </option>
                                                        <option value="1"
                                                            {{ old('penghasilan_ayah') == '1' ? 'selected' : '' }}>Di bawah
                                                            Rp
                                                            1.000.000</option>
                                                        <option value="2"
                                                            {{ old('penghasilan_ayah') == '2' ? 'selected' : '' }}>Rp
                                                            1.000.000 -
                                                            Rp 3.000.000</option>
                                                        <option value="3"
                                                            {{ old('penghasilan_ayah') == '3' ? 'selected' : '' }}>Rp
                                                            3.000.000 -
                                                            Rp 5.000.000</option>
                                                        <option value="4"
                                                            {{ old('penghasilan_ayah') == '4' ? 'selected' : '' }}>Rp
                                                            5.000.000 -
                                                            Rp 10.000.000</option>
                                                        <option value="5"
                                                            {{ old('penghasilan_ayah') == '5' ? 'selected' : '' }}>Di atas
                                                            Rp
                                                            10.000.000</option>

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
                                                        name="nama_ibu" value="{{ old('nama_ibu') }}"
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
                                                        name="no_wa_ibu" value="{{ old('no_wa_ibu') }}"
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
                                                        name="pendidikan_terakir_ibu">
                                                        <option value="sd" disabled selected>Pilih Pendidikan Terakhir
                                                            Ibu
                                                        </option>
                                                        <option value="sd"
                                                            {{ old('pendidikan_terakhir_ibu') == 'sd' ? 'selected' : '' }}>
                                                            SD
                                                        </option>
                                                        <option value="smp"
                                                            {{ old('pendidikan_terakhir_ibu') == 'smp' ? 'selected' : '' }}>
                                                            SMP
                                                        </option>
                                                        <option value="sma"
                                                            {{ old('pendidikan_terakhir_ibu') == 'sma' ? 'selected' : '' }}>
                                                            SMA
                                                        </option>
                                                        <option value="d1/2/3"
                                                            {{ old('pendidikan_terakhir_ibu') == 'd1/2/3' ? 'selected' : '' }}>
                                                            D1/D2/D3
                                                        </option>
                                                        <option value="s1"
                                                            {{ old('pendidikan_terakhir_ibu') == 's1' ? 'selected' : '' }}>
                                                            S1
                                                        </option>
                                                        <option value="s2"
                                                            {{ old('pendidikan_terakhir_ibu') == 's2' ? 'selected' : '' }}>
                                                            S2
                                                        </option>
                                                        <option value="s3"
                                                            {{ old('pendidikan_terakhir_ibu') == 's3' ? 'selected' : '' }}>
                                                            S3
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
                                                        name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}"
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
                                                        name="penghasilan_ibu">
                                                        <option value="1" disabled selected>Pilih Kategori Penghasilan
                                                            Ibu
                                                        </option>
                                                        <option value="1"
                                                            {{ old('penghasilan_ibu') == '1' ? 'selected' : '' }}>Di bawah
                                                            Rp
                                                            1.000.000</option>
                                                        <option value="2"
                                                            {{ old('penghasilan_ibu') == '2' ? 'selected' : '' }}>Rp
                                                            1.000.000 - Rp
                                                            3.000.000</option>
                                                        <option value="3"
                                                            {{ old('penghasilan_ibu') == '3' ? 'selected' : '' }}>Rp
                                                            3.000.000 - Rp
                                                            5.000.000</option>
                                                        <option value="4"
                                                            {{ old('penghasilan_ibu') == '4' ? 'selected' : '' }}>Rp
                                                            5.000.000 - Rp
                                                            10.000.000</option>
                                                        <option value="5"
                                                            {{ old('penghasilan_ibu') == '5' ? 'selected' : '' }}>Di atas
                                                            Rp
                                                            10.000.000</option>
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

                                        <h3>Data Wali Siswa</h3>
                                        <h6 class="mb-3" style="color:black;">*opsional</h6>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-outline">
                                                        <input id="nama_wali_siswa" type="text"
                                                            class="form-control @error('nama_wali_siswa') is-invalid @enderror"
                                                            name="nama_wali_siswa" value="{{ old('nama_wali_siswa') }}"
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
                                                            name="no_wa_wali_siswa" value="{{ old('no_wa_wali_siswa') }}"
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
                                                            name="hubungan_dengan_siswa"
                                                            value="{{ old('hubungan_dengan_siswa') }}" required
                                                            placeholder="Hubungan dengan Siswa">
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
                                                            name="alamat_wali_siswa"
                                                            value="{{ old('alamat_wali_siswa') }}"
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
                                                            name="pendidikan_terakir_wali">
                                                            <option value="0" disabled selected>Pilih Pendidikan
                                                                Terakhir Wali
                                                            </option>
                                                            <option value="sd"
                                                                {{ old('pendidikan_terakir_wali') == 'sd' ? 'selected' : '' }}>
                                                                SD
                                                            </option>
                                                            <option value="smp"
                                                                {{ old('pendidikan_terakir_wali') == 'smp' ? 'selected' : '' }}>
                                                                SMP
                                                            </option>
                                                            </option>
                                                            <option value="sma"
                                                                {{ old('pendidikan_terakir_wali') == 'sma' ? 'selected' : '' }}>
                                                                SMA
                                                            </option>
                                                            <option value="d1/2/3"
                                                                {{ old('pendidikan_terakir_wali') == 'd1/2/3' ? 'selected' : '' }}>
                                                                D1/D2/D3
                                                            </option>
                                                            <option value="s1"
                                                                {{ old('pendidikan_terakir_wali') == 's1' ? 'selected' : '' }}>
                                                                S1
                                                            </option>
                                                            <option value="s2"
                                                                {{ old('pendidikan_terakir_wali') == 's2' ? 'selected' : '' }}>
                                                                S2
                                                            </option>
                                                            <option value="s3"
                                                                {{ old('pendidikan_terakir_wali') == 's3' ? 'selected' : '' }}>
                                                                S3
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
                                                            name="pekerjaan_wali" value="{{ old('pekerjaan_wali') }}"
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
                                                            name="penghasilan_wali">
                                                            <option value="0" disabled selected>Pilih Kategori
                                                                Penghasilan Wali
                                                            </option>
                                                            <option value="1"
                                                                {{ old('penghasilan_wali') == '1' ? 'selected' : '' }}>Di
                                                                bawah Rp
                                                                1.000.000</option>
                                                            <option value="2"
                                                                {{ old('penghasilan_wali') == '2' ? 'selected' : '' }}>Rp
                                                                1.000.000 -
                                                                Rp 3.000.000</option>
                                                            <option value="3"
                                                                {{ old('penghasilan_wali') == '3' ? 'selected' : '' }}>Rp
                                                                3.000.000 -
                                                                Rp 5.000.000</option>
                                                            <option value="4"
                                                                {{ old('penghasilan_wali') == '4' ? 'selected' : '' }}>Rp
                                                                5.000.000 -
                                                                Rp 10.000.000</option>
                                                            <option value="5"
                                                                {{ old('penghasilan_wali') == '5' ? 'selected' : '' }}>Di
                                                                atas Rp
                                                                10.000.000</option>
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

                                            <h3>Lainnya</h3>
                                            <h6 class="mb-3" style="color: red;">*wajib diisi</h6>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    Apakah daftar ke sekolah lain?
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="daftar_sekolah_lain" value="1" id="daftar_sekolah_lain"
                                                            {{ old('daftar_sekolah_lain') ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="daftar_sekolah_lain">Ya</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    Jika <b>YA</b>, silahkan isi:
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-outline">
                                                        <input id="nama_sekolahnya_jika_daftar" type="text"
                                                            class="form-control @error('nama_sekolahnya_jika_daftar') is-invalid @enderror"
                                                            name="nama_sekolahnya_jika_daftar"
                                                            value="{{ old('nama_sekolahnya_jika_daftar') }}"
                                                            placeholder="Nama Sekolah Jika Daftar Lain"
                                                            {{ old('daftar_sekolah_lain') ? '' : 'disabled' }} required>
                                                        @error('nama_sekolahnya_jika_daftar')
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
                                                        <input id="motivasi" type="text"
                                                            class="form-control @error('motivasi') is-invalid @enderror"
                                                            name="motivasi" value="{{ old('motivasi') }}"
                                                            placeholder="Motivasi">
                                                        @error('motivasi')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-outline">
                                                        <select id="informasi_didapatkan_dari"
                                                            class="form-select form-control @error('informasi_didapatkan_dari') is-invalid @enderror"
                                                            name="informasi_didapatkan_dari">
                                                            <option value="" disabled selected>Pilih Sumber Informasi</option>
                                                            <option value="website"
                                                                {{ old('informasi_didapatkan_dari') == 'website' ? 'selected' : '' }}>
                                                                Website
                                                            </option>
                                                            <option value="brosur"
                                                                {{ old('informasi_didapatkan_dari') == 'brosur' ? 'selected' : '' }}>
                                                                Brosur
                                                            </option>
                                                            <option value="pamflet"
                                                                {{ old('informasi_didapatkan_dari') == 'pamflet' ? 'selected' : '' }}>
                                                                Pamflet
                                                            </option>
                                                            <option value="kerabat"
                                                                {{ old('informasi_didapatkan_dari') == 'kerabat' ? 'selected' : '' }}>
                                                                Kerabat
                                                            </option>
                                                            <option value="lain-lain"
                                                                {{ old('informasi_didapatkan_dari') == 'lain-lain' ? 'selected' : '' }}>
                                                                Lainnya
                                                            </option>
                                                        </select>
                                                        @error('informasi_didapatkan_dari')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <h3>Perjanjian</h3>
                                            <h6 class="mb-3" style="color:red;">*wajib diisi</h6>

                                                <div class="row mb-2">
                                                    <div class="col-md-4 d-flex justify-content-start">
                                                        Percaya dan taat sepenuhnya kepada kebijaksanaan SMPTQ
                                                    </div>
                                                    <div class="col-md-2 d-flex justify-content-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="perjanjian1" value="ya" id="perjanjian1Ya"
                                                                {{ old('perjanjian1') == 'ya' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="perjanjian1Ya">ya</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 d-flex justify-content-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="perjanjian1" value="tidak" id="perjanjian1Tidak"
                                                                {{ old('perjanjian1') == 'tidak' ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="perjanjian1Tidak">tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 d-flex justify-content-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="perjanjian1" value="ragu" id="perjanjian1Ragu"
                                                                {{ old('perjanjian1') == 'tidak' ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="perjanjian1Ragu">ragu</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-md-4 d-flex justify-content-start">
                                                        Mendukung sunnah dan disiplin yang berlaku di SMPTQ
                                                    </div>
                                                    <div class="col-md-2 d-flex justify-content-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="perjanjian2" value="ya" id="perjanjian2Ya"
                                                                {{ old('perjanjian2') == 'ya' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="perjanjian2Ya">ya</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 d-flex justify-content-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="perjanjian2" value="tidak" id="perjanjian2Tidak"
                                                                {{ old('perjanjian2') == 'tidak' ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="perjanjian2Tidak">tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 d-flex justify-content-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="perjanjian2" value="ragu" id="perjanjian2Ragu"
                                                                {{ old('perjanjian2') == 'ragu' ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="perjanjian2Ragu">ragu</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-md-4 d-flex justify-content-start">
                                                        Memenuhi segala kewajiban yang telah ditetapkan oleh SMPTQ
                                                    </div>
                                                    <div class="col-md-2 d-flex justify-content-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="perjanjian3" value="ya" id="perjanjian3Ya"
                                                                {{ old('perjanjian3') == 'ya' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="perjanjian3Ya">ya</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 d-flex justify-content-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="perjanjian3" value="tidak" id="perjanjian3Tidak"
                                                                {{ old('perjanjian3') == 'tidak' ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="perjanjian3Tidak">tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 d-flex justify-content-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="perjanjian3" value="ragu" id="perjanjian3Ragu"
                                                                {{ old('perjanjian3') == 'ragu' ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="perjanjian3Ragu">ragu</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div class="col-md-4 d-flex justify-content-start">Melunasi semua pembayaran uang sekolah dan uang makan sebelum Ujian Semester Ganjil dan Semester Genap.</div>
                                                    <div class="col-md-2 d-flex justify-content-center"><div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="perjanjian4" value="ya" id="perjanjian4Ya"
                                                            {{ old('perjanjian4') == 'ya' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="perjanjian4Ya">ya</label>
                                                    </div></div>
                                                    <div class="col-md-2 d-flex justify-content-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="perjanjian4" value="tidak" id="perjanjian4Tidak"
                                                                {{ old('perjanjian4') == 'tidak' ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="perjanjian4Tidak">tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 d-flex justify-content-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="perjanjian4" value="ragu" id="perjanjian4Ragu"
                                                                {{ old('perjanjian4') == 'ragu' ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="perjanjian4Ragu">ragu</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                {{-- <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Perjanjian 1:</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="perjanjian1" value="Ya" id="perjanjian1Ya"
                                                {{ old('perjanjian1') == 'Ya' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="perjanjian1Ya">Ya</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="perjanjian1" value="Tidak" id="perjanjian1Tidak"
                                                {{ old('perjanjian1') == 'Tidak' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="perjanjian1Tidak">Tidak</label>
                                        </div>
                                        <p>Deskripsi Perjanjian 1:</p>
                                        <p>Percaya dan taat sepenuhnya kepada kebijaksanaan SMPTQ</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Perjanjian 2:</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="perjanjian2" value="Ya" id="perjanjian2Ya"
                                                {{ old('perjanjian2') == 'Ya' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="perjanjian2Ya">Ya</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="perjanjian2" value="Tidak" id="perjanjian2Tidak"
                                                {{ old('perjanjian2') == 'Tidak' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="perjanjian2Tidak">Tidak</label>
                                        </div>
                                        <p>Deskripsi Perjanjian 2:</p>
                                        <p>Mendukung sunnah dan disiplin yang berlaku di SMPTQ</p>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Perjanjian 3:</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="perjanjian3" value="Ya" id="perjanjian3Ya"
                                                {{ old('perjanjian3') == 'Ya' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="perjanjian3Ya">Ya</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="perjanjian3" value="Tidak" id="perjanjian3Tidak"
                                                {{ old('perjanjian3') == 'Tidak' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="perjanjian3Tidak">Tidak</label>
                                        </div>
                                        <p>Deskripsi Perjanjian 3:</p>
                                        <p>Memenuhi segala kewajiban yang telah ditetapkan oleh SMPTQ</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Perjanjian 4:</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="perjanjian4" value="Ya" id="perjanjian4Ya"
                                                {{ old('perjanjian4') == 'Ya' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="perjanjian4Ya">Ya</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="perjanjian4" value="Tidak" id="perjanjian4Tidak"
                                                {{ old('perjanjian4') == 'Tidak' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="perjanjian4Tidak">Tidak</label>
                                        </div>
                                        <p>Deskripsi Perjanjian 4:</p>
                                        <p>Melunasi semua pembayaran uang sekolah dan uang makan sebelum Ujian Semester Ganjil dan Semester Genap.</p>
                                    </div>
                                </div> --}}

                                                <button type="submit"
                                                    class="btn btn-primary btn-block">{{ __('Tambah') }}</button>
                                                <a href="{{ url()->previous() }}"
                                                    class="btn btn-danger btn-block">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <h3 class="mb-3">Masukkan Nilai</h3>

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
                                </div> --}}



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
            // Get references to the checkbox and input field
            const checkbox = document.getElementById('daftar_sekolah_lain');
            const inputField = document.getElementById('nama_sekolahnya_jika_daftar');
        
            // Add an event listener to the checkbox
            checkbox.addEventListener('change', function () {
                if (checkbox.checked) {
                    // If the checkbox is checked, enable the input field
                    inputField.removeAttribute('disabled');
                } else {
                    // If the checkbox is not checked, disable and clear the input field
                    inputField.setAttribute('disabled', 'true');
                    inputField.value = '';
                }
            });
        </script>

    </body>

@stop
