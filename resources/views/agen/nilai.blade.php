@extends('layouts.main')

@section('container')
    <h2 class="mb-3">Masukkan nilai {{ $agen->nama_lengkap }}</h2>
    @if (session('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @endif

    <div class="container mb-5">
        <form action="{{ url('agen/nilai/update/' . $agen->id) }}" method="post">
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
                            <input type="text" name="matematika" value="{{ $agen->nilai->matematika }}" class="form-control">
                        </td>
                        {{-- <td>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </td> --}}
                    </tr>
                    <tr>
                        <td>Ilmu Pengetahuan Alam</td>
                        <td>
                            <input type="text" name="ilmu_pengetahuan_alam" value="{{ $agen->nilai->ilmu_pengetahuan_alam }}" class="form-control">
                        </td>
                        {{-- <td>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </td> --}}
                    </tr>
                    <tr>
                        <td>Bahasa Indonesia</td>
                        <td>
                            <input type="text" name="bahasa_indonesia" value="{{ $agen->nilai->bahasa_indonesia }}" class="form-control">
                        </td>
                        {{-- <td>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </td> --}}
                    </tr>
                    <tr>
                        <td>Tes Baca Al-Qur'an</td>
                        <td>
                            <input type="text" name="test_membaca_al_quran" value="{{ $agen->nilai->test_membaca_al_quran }}" class="form-control">
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
