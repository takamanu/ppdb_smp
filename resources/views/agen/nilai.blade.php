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
                            <div class="form-group form-outline">
                                <select id="matematika"
                                    class="form-select form-control @error('matematika') is-invalid @enderror"
                                    name="matematika" required>
                                    <option value="E" disabled {{ $agen->nilai->matematika == 'E' ? 'selected' : '' }}>
                                        Pilih nilai A-E</option>
                                    <option value="A" {{ $agen->nilai->matematika == 'A' ? 'selected' : '' }}>A
                                    </option>
                                    <option value="B" {{ $agen->nilai->matematika == 'B' ? 'selected' : '' }}>B
                                    </option>
                                    <option value="C" {{ $agen->nilai->matematika == 'C' ? 'selected' : '' }}>C
                                    </option>
                                    <option value="D" {{ $agen->nilai->matematika == 'D' ? 'selected' : '' }}>D
                                    </option>
                                    <option value="E" {{ $agen->nilai->matematika == 'E' ? 'selected' : '' }}>E
                                    </option>
                                </select>
                                @error('matematika')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Ilmu Pengetahuan Alam</td>
                        <td>
                            <div class="form-group form-outline">
                                <select id="ilmu_pengetahuan_alam"
                                    class="form-select form-control @error('ilmu_pengetahuan_alam') is-invalid @enderror"
                                    name="ilmu_pengetahuan_alam" required>
                                    <option value="E" disabled {{ $agen->nilai->ilmu_pengetahuan_alam == 'E' ? 'selected' : '' }}>Pilih nilai A-E</option>
                                    <option value="A" {{ $agen->nilai->ilmu_pengetahuan_alam == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ $agen->nilai->ilmu_pengetahuan_alam == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="C" {{ $agen->nilai->ilmu_pengetahuan_alam == 'C' ? 'selected' : '' }}>C</option>
                                    <option value="D" {{ $agen->nilai->ilmu_pengetahuan_alam == 'D' ? 'selected' : '' }}>D</option>
                                    <option value="E" {{ $agen->nilai->ilmu_pengetahuan_alam == 'E' ? 'selected' : '' }}>E</option>
                                </select>
                                @error('ilmu_pengetahuan_alam')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Bahasa Indonesia</td>
                        <td>
                            <div class="form-group form-outline">
                                <select id="bahasa_indonesia"
                                    class="form-select form-control @error('bahasa_indonesia') is-invalid @enderror"
                                    name="bahasa_indonesia" required>
                                    <option value="E" disabled {{ $agen->nilai->bahasa_indonesia == 'E' ? 'selected' : '' }}>Pilih nilai A-E</option>
                                    <option value="A" {{ $agen->nilai->bahasa_indonesia == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ $agen->nilai->bahasa_indonesia == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="C" {{ $agen->nilai->bahasa_indonesia == 'C' ? 'selected' : '' }}>C</option>
                                    <option value="D" {{ $agen->nilai->bahasa_indonesia == 'D' ? 'selected' : '' }}>D</option>
                                    <option value="E" {{ $agen->nilai->bahasa_indonesia == 'E' ? 'selected' : '' }}>E</option>
                                </select>
                                @error('bahasa_indonesia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Tes Baca Al-Qur'an</td>
                        <td>
                            <div class="form-group form-outline">
                                <select id="test_membaca_al_quran"
                                    class="form-select form-control @error('test_membaca_al_quran') is-invalid @enderror"
                                    name="test_membaca_al_quran" required>
                                    <option value="E" disabled {{ $agen->nilai->test_membaca_al_quran == 'E' ? 'selected' : '' }}>Pilih nilai A-E</option>
                                    <option value="A" {{ $agen->nilai->test_membaca_al_quran == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ $agen->nilai->test_membaca_al_quran == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="C" {{ $agen->nilai->test_membaca_al_quran == 'C' ? 'selected' : '' }}>C</option>
                                    <option value="D" {{ $agen->nilai->test_membaca_al_quran == 'D' ? 'selected' : '' }}>D</option>
                                    <option value="E" {{ $agen->nilai->test_membaca_al_quran == 'E' ? 'selected' : '' }}>E</option>
                                </select>
                                @error('test_membaca_al_quran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Status Kelulusan</td>
                        <td>
                            <select name="status" class="form-select form-control" required disabled>
                                <option selected disabled value="{{ $agen->nilai->status }}">{{ $agen->nilai->status }}
                                </option>
                                {{-- Add other status options as needed --}}
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-success btn-block" type="submit">Submit nilai</button>
        </form>
    </div>

    {{-- <a href="{{ url('/agen/cetak/' . $agen->id) }}" title="Cetak Datapokok Siswa" class="btn btn-warning btn-block">Submit Nilai</a> --}}
    <a href="/agen" class="btn btn-primary btn-block">Kembali ke dashboard</a>
@endsection
