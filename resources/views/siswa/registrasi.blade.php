@extends('layouts.main')

@section('container')
    <div class="container">
        <h1>Upload Files</h1>
        <form action="{{ route('registrasi_ulang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><label for="ijazah" class="form-label">Ijazah</label></td>
                        <td>
                            <input type="file" class="form-control @error('ijazah') is-invalid @enderror" id="ijazah"
                                name="ijazah" accept=".pdf,.docx">
                            @error('ijazah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="surat_pernyataan_bermaterai" class="form-label">Surat Pernyataan Bermaterai</label>
                        </td>
                        <td>
                            <input type="file"
                                class="form-control @error('surat_pernyataan_bermaterai') is-invalid @enderror"
                                id="surat_pernyataan_bermaterai" name="surat_pernyataan_bermaterai" accept=".pdf,.docx">
                            @error('surat_pernyataan_bermaterai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="surat_keterangan_siswa_aktif_sd_asal" class="form-label">Surat Keterangan Siswa
                                Aktif SD Asal</label></td>
                        <td>
                            <input type="file"
                                class="form-control @error('surat_keterangan_siswa_aktif_sd_asal') is-invalid @enderror"
                                id="surat_keterangan_siswa_aktif_sd_asal" name="surat_keterangan_siswa_aktif_sd_asal"
                                accept=".pdf,.docx">
                            @error('surat_keterangan_siswa_aktif_sd_asal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="pasfoto" class="form-label">Pasfoto</label></td>
                        <td>
                            <input type="file" class="form-control @error('pasfoto') is-invalid @enderror" id="pasfoto"
                                name="pasfoto" accept=".jpg,.jpeg,.png">
                            @error('pasfoto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="akta_kelahiran" class="form-label">Akta Kelahiran</label></td>
                        <td>
                            <input type="file" class="form-control @error('akta_kelahiran') is-invalid @enderror"
                                id="akta_kelahiran" name="akta_kelahiran" accept=".pdf,.docx">
                            @error('akta_kelahiran')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="kk" class="form-label">Kartu Keluarga (KK)</label></td>
                        <td>
                            <input type="file" class="form-control @error('kk') is-invalid @enderror" id="kk"
                                name="kk" accept=".pdf,.docx">
                            @error('kk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="button"
            onclick="showSweetAlert()"
                class="btn btn-success btn-block">Upload</button>
        </form>
    </div>
    <script>
        function showSweetAlert() {
            Swal.fire({
                title: "Apakah anda sudah yakin dengan data yang akan anda submit?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Saya Yakin",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user clicks "Ya, Saya Yakin," submit the form
                    document.querySelector('form').submit();
                }
            });
        }
    </script>
@endsection
