<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agen;
use App\Models\Datapokok;
use App\Models\Policy;
use App\Models\Nilai;
use App\Models\Config;
use App\Models\RegistrasiUlang;

date_default_timezone_set('Asia/Jakarta');

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $userData = auth()->user()->id;

        $user = User::where('id', $userData)->first();
        $config = Config::where('id', 1)->first();
        $agen = $user->datapokok;
        $date_now = date('Y-m-d H:i:s');

        if (is_null($agen)) {
            $agen = 'NULL'; // Set a default value or any other value you want to use
        }

        return view('siswa.index')->with([
            'agen' => $agen,
            'user' => $user,
            'config' => $config,
            'date_now' => $date_now,
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $userData = auth()->user()->id;

        $user = User::where('id', $userData)->first();
        $config = Config::where('id', 1)->first();
        $agen = $user->datapokok;
        $date_now = date('Y-m-d H:i:s');

        if (is_null($agen)) {
            $agen = 'NULL'; // Set a default value or any other value you want to use
        }
        
        return view('siswa.create')->with('agen', $agen);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($data);
        $userData = auth()->user();
        // $user = User::where('id', $userData)->first();
        $daftarSekolahLain = $request->input('daftar_sekolah_lain');
        // Get the value of Nama Sekolah Jika Daftar
        $namaSekolahJikaDaftar = $request->input('nama_sekolahnya_jika_daftar');

        // If the checkbox is not checked and the field is not filled, set a default value
        if (!$daftarSekolahLain && empty($namaSekolahJikaDaftar)) {
            $namaSekolahJikaDaftar = 'None';
            $daftarSekolahLain = 0;
        }

        Datapokok::create([
            'user_id' => $userData->id,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $userData->email,
            'upload_file' => 'NULL',
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat_sekolah' => $request->alamat_sekolah,
            'jumlah_hafalan' => 2,
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'pendidikan_terakir_ayah' => $request->pendidikan_terakir_ayah,
            'no_wa_ayah' => $request->no_wa_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'pendidikan_terakir_ibu' => $request->pendidikan_terakir_ibu,
            'no_wa_ibu' => $request->no_wa_ibu,
            'nama_wali_siswa' => $request->nama_wali_siswa,
            'hubungan_dengan_siswa' => $request->hubungan_dengan_siswa,
            'alamat_wali_siswa' => $request->alamat_wali_siswa,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'penghasilan_wali' => $request->penghasilan_wali,
            'pendidikan_terakir_wali' => $request->pendidikan_terakir_wali,
            'no_wa_wali_siswa' => $request->no_wa_wali_siswa,
            'motivasi' => $request->motivasi,
            'daftar_sekolah_lain' => $daftarSekolahLain,
            'nama_sekolahnya_jika_daftar' => $namaSekolahJikaDaftar,
            'informasi_didapatkan_dari' => $request->informasi_didapatkan_dari,
        ]);

        $idBaruDatapokok = Datapokok::latest('id')->first();

        $raw_data_policy = [
            'datapokok_id' => $idBaruDatapokok->id,
            'perjanjian1' => $request->perjanjian1,
            'perjanjian2' => $request->perjanjian2,
            'perjanjian3' => $request->perjanjian3,
            'perjanjian4' => $request->perjanjian4,
        ];

        $raw_data_nilai = [
            'datapokok_id' => $idBaruDatapokok->id,
            'matematika' => 0,
            'ilmu_pengetahuan_alam' => 0,
            'bahasa_indonesia' => 0,
            'test_membaca_al_quran' => 0,
            'status' => 'BELUM LULUS',
        ];

        Nilai::create($raw_data_nilai);
        Policy::create($raw_data_policy);

        // Agen::create($input);
        return redirect('siswa')->with('flash_message', 'Isi datapokok selesai!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $agen = Datapokok::where('user_id', $id)->first();
        $user = User::where('id', $id)->first();
        $agen = $user->datapokok;

        // dd($agen->nilai);
        // $agen = User::where('id', $id)->first();

        // dd($agen->datapokok->policy);
        // $agentest = Datapokok::where('user_id', 2)->first();
        // return $agentest;

        // return $agen;
        return view('agen.show')->with('agen', $agen);
    }

    public function pengumuman($id)
    {
        $siswa = Datapokok::where('user_id', $id)->first();
        //   $siswa->nilai;
        // return $agen;
        $userData = auth()->user()->id;
        $user = User::where('id', $userData)->first();
        $config = Config::where('id', 1)->first();
        $agen = $user->datapokok;
        $date_now = date('Y-m-d H:i:s');

        if (is_null($agen)) {
            $agen = 'NULL'; // Set a default value or any other value you want to use
        }

        return view('siswa.pengumuman')->with(['siswa' => $siswa, 'agen' => $agen]);
    }

    public function registrasiUlang($id)
    {
        $siswa = Datapokok::where('user_id', $id)->first();
        //   $siswa->nilai;
        // return $agen;
        $userData = auth()->user()->id;
        $user = User::where('id', $userData)->first();
        $config = Config::where('id', 1)->first();
        $agen = $user->datapokok;
        $date_now = date('Y-m-d H:i:s');

        if (is_null($agen)) {
            $agen = 'NULL'; // Set a default value or any other value you want to use
        }

        return view('siswa.registrasi')->with(['siswa'=> $siswa, 'agen' => $agen]);
    }

    // public function storeRegistrasiUlang(Request $request)
    // {
    //     // Validate the uploaded files
    //     $request->validate([
    //         'ijazah' => 'required|mimes:pdf,docx',
    //         'surat_pernyataan_bermaterai' => 'required|mimes:pdf,docx',
    //         'surat_keterangan_siswa_aktif_sd_asal' => 'required|mimes:pdf,docx',
    //         'pasfoto' => 'required|image|mimes:jpg,jpeg,png',
    //         'akta_kelahiran' => 'required|mimes:pdf,docx',
    //         'kk' => 'required|mimes:pdf,docx',
    //     ]);

    //     // Store the uploaded files
    //     $uploadedFiles = [];

    //     foreach ($request->allFiles() as $key => $file) {
    //         $path = $file->store('uploads'); // Store files in the 'uploads' directory

    //         $uploadedFiles[$key] = $path;
    //     }

    //     // Create a record in the database with the file paths
    //     RegistrasiUlang::create([
    //         'user_id' => auth()->user()->id,
    //         'ijazah' => $uploadedFiles['ijazah'],
    //         'surat_pernyataan_bermaterai' => $uploadedFiles['surat_pernyataan_bermaterai'],
    //         'surat_keterangan_siswa_aktif_sd_asal' => $uploadedFiles['surat_keterangan_siswa_aktif_sd_asal'],
    //         'pasfoto' => $uploadedFiles['pasfoto'],
    //         'akta_kelahiran' => $uploadedFiles['akta_kelahiran'],
    //         'kk' => $uploadedFiles['kk'],
    //     ]);

    //     // Redirect with a success message
    //     return redirect()
    //         ->route('siswa.pengumuman')
    //         ->with('success', 'Files uploaded successfully.');
    // }

    public function cetak($id)
    {
        $agen = Datapokok::where('user_id', $id)->first();
        // return $agen;

        return view('agen.cetak')->with('agen', $agen);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agen = Agen::find($id);
        return view('agen.edit')->with('agen', $agen);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agen = Agen::find($id);
        $input = $request->all();
        $agen->update($input);
        return redirect('agen')->with('flash_message', 'Users Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
