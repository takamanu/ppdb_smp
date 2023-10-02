@extends('layouts.main')

@section('container')
    <h2 class="mb-3">Masukkan nilai {{ $agen->nama_lengkap }}</h2>
    @if (session('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @endif

    <div class="container mb-5">
        <form action="{{ url('agen/nilai/update/' . $agen->user_id) }}" method="post">
            @csrf
            @method('PUT')
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Jenis Tes</th>
                        <th>Nilai</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Matematika</td>
                        <td>
                            {{-- <input type="text" name="matematika" value="{{ $agen->nilai->matematika }}" class="form-control"> --}}
                            <div class="form-group form-outline">
                                <select id="matematika"
                                    class="form-select form-control @error('matematika') is-invalid @enderror"
                                    name="matematika" required>
                                    <option value="E" disabled selected>Pilih nilai A-E
                                    </option>
                                    <option value="A"
                                        {{ old('matematika') == 'A' ? 'selected' : '' }}>A
                                    </option>
                                    <option value="B"
                                        {{ old('matematika') == 'B' ? 'selected' : '' }}>B
                                    </option>
                                    </option>
                                    <option value="C"
                                        {{ old('matematika') == 'C' ? 'selected' : '' }}>C
                                    </option>
                                    <option value="D"
                                        {{ old('matematika') == 'D' ? 'selected' : '' }}>D
                                    </option>
                                    <option value="E"
                                        {{ old('matematika') == 'E' ? 'selected' : '' }}>E
                                    </option>
                                    <!-- Add other options as needed -->
                                </select>
                                @error('matematika')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                        {{-- <td>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </td> --}}
                    </tr>
                    <tr>
                        <td>Ilmu Pengetahuan Alam</td>
                        <td>
                            <div class="form-group form-outline">
                                <select id="ilmu_pengetahuan_alam"
                                    class="form-select form-control @error('ilmu_pengetahuan_alam') is-invalid @enderror"
                                    name="ilmu_pengetahuan_alam" required>
                                    <option value="E" disabled selected>Pilih nilai A-E
                                    </option>
                                    <option value="A"
                                        {{ old('ilmu_pengetahuan_alam') == 'A' ? 'selected' : '' }}>A
                                    </option>
                                    <option value="B"
                                        {{ old('ilmu_pengetahuan_alam') == 'B' ? 'selected' : '' }}>B
                                    </option>
                                    </option>
                                    <option value="C"
                                        {{ old('ilmu_pengetahuan_alam') == 'C' ? 'selected' : '' }}>C
                                    </option>
                                    <option value="D"
                                        {{ old('ilmu_pengetahuan_alam') == 'D' ? 'selected' : '' }}>D
                                    </option>
                                    <option value="E"
                                        {{ old('ilmu_pengetahuan_alam') == 'E' ? 'selected' : '' }}>E
                                    </option>
                                    <!-- Add other options as needed -->
                                </select>
                                @error('ilmu_pengetahuan_alam')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                        {{-- <td>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </td> --}}
                    </tr>
                    <tr>
                        <td>Bahasa Indonesia</td>
                        <td>
                            <div class="form-group form-outline">
                                <select id="bahasa_indonesia"
                                    class="form-select form-control @error('bahasa_indonesia') is-invalid @enderror"
                                    name="bahasa_indonesia" required>
                                    <option value="E" disabled selected>Pilih nilai A-E
                                    </option>
                                    <option value="A"
                                        {{ old('bahasa_indonesia') == 'A' ? 'selected' : '' }}>A
                                    </option>
                                    <option value="B"
                                        {{ old('bahasa_indonesia') == 'B' ? 'selected' : '' }}>B
                                    </option>
                                    </option>
                                    <option value="C"
                                        {{ old('bahasa_indonesia') == 'C' ? 'selected' : '' }}>C
                                    </option>
                                    <option value="D"
                                        {{ old('bahasa_indonesia') == 'D' ? 'selected' : '' }}>D
                                    </option>
                                    <option value="E"
                                        {{ old('bahasa_indonesia') == 'E' ? 'selected' : '' }}>E
                                    </option>
                                    <!-- Add other options as needed -->
                                </select>
                                @error('bahasa_indonesia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                        {{-- <td>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </td> --}}
                    </tr>
                    <tr>
                        <td>Tes Baca Al-Qur'an</td>
                        <td>
                            <div class="form-group form-outline">
                                <select id="test_membaca_al_quran"
                                    class="form-select form-control @error('test_membaca_al_quran') is-invalid @enderror"
                                    name="test_membaca_al_quran" required>
                                    <option value="E" disabled selected>Pilih nilai A-E
                                    </option>
                                    <option value="A"
                                        {{ old('test_membaca_al_quran') == 'A' ? 'selected' : '' }}>A
                                    </option>
                                    <option value="B"
                                        {{ old('test_membaca_al_quran') == 'B' ? 'selected' : '' }}>B
                                    </option>
                                    </option>
                                    <option value="C"
                                        {{ old('test_membaca_al_quran') == 'C' ? 'selected' : '' }}>C
                                    </option>
                                    <option value="D"
                                        {{ old('test_membaca_al_quran') == 'D' ? 'selected' : '' }}>D
                                    </option>
                                    <option value="E"
                                        {{ old('test_membaca_al_quran') == 'E' ? 'selected' : '' }}>E
                                    </option>
                                    <!-- Add other options as needed -->
                                </select>
                                @error('test_membaca_al_quran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                        {{-- <td>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </td> --}}
                    </tr>
                     <tr>
                        <td>Status Kelulusan</td>
                        <td>
                            <select name="status" class="form-select form-control" required disabled>
                            <option selected disabled value="{{ $agen->nilai->status }}"> {{ $agen->nilai->status }} </option>
                            {{-- @if ($agen->nilai->status == "BELUM LULUS")
                                <option value="LULUS"> LULUS </option>
                            @else
                                <option value="BELUM LULUS"> BELUM LULUS </option>
                            @endif --}}
                        </td>
                        {{-- <td>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </td>  --}}
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
            <button class="btn btn-success btn-block" type="submit">Submit nilai</button>
        </form>
    </div>

    {{-- <a href="{{ url('/agen/cetak/' . $agen->id) }}" title="Cetak Datapokok Siswa" class="btn btn-warning btn-block">Submit Nilai</a> --}}
    <a href="/agen" class="btn btn-primary btn-block">Kembali ke dashboard</a>
@endsection
