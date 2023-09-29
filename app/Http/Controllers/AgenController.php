<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agen;
use App\Models\User;
use App\Models\Nilai;
use App\Models\Policy;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Datapokok;

date_default_timezone_set('Asia/Jakarta');

class AgenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //
        // return view('user.index', [
        //     'users' => DB::table('users')->paginate(15)
        // ]);
        $cari = $request->query('cari');

        if(!empty($cari)){
            $dataagen = Agen::where('name','like',"%".$cari."%")
                ->sortable()
                ->paginate(5);
//
        }else{
            $dataagen = Agen::sortable()->paginate(5);
        }
        return view('agen.index')->with([
            'agen' => $dataagen,
            'cari' => $cari,
        ]);

        $dataagen = Agen::paginate(5);
        return view ('agen.index')->with([
            'agen' => $dataagen,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // $user = User::where('id', $userData)->first();
        
        $idBaru = User::latest('id')->first();

        Datapokok::create([
            'user_id' => $idBaru->id,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'upload_file' => "NULL", 
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
            'motivasi' => 'apasih anj',
            'daftar_sekolah_lain' => 1,
            'nama_sekolahnya_jika_daftar' => 'apasih anj',
            'informasi_didapatkan_dari' => 'brosur',
        ]);

        $idBaruDatapokok = Datapokok::latest('id')->first();

        $raw_data_policy = [
            'datapokok_id' => $idBaruDatapokok->id, 
            'perjanjian1' => "ya",
            'perjanjian2' => "ya",
            'perjanjian3' => "ya",
            'perjanjian4' => "ya",
        ];

        $raw_data_nilai = [
            'datapokok_id' => $idBaruDatapokok->id, 
            "matematika" => $request->matematika,
            "ilmu_pengetahuan_alam" => $request->ilmu_pengetahuan_alam,
            "bahasa_indonesia" => $request->bahasa_indonesia,
            "test_membaca_al_quran" => $request->test_membaca_al_quran,
            "status" => "LULUS",
        ];

        Nilai::create($raw_data_nilai);
        Policy::create($raw_data_policy);
 
         // Agen::create($input);
        return redirect('agen')->with('flash_message', 'Isi datapokok selesai!');
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

    public function cetak($id)
    {
        $agen = Datapokok::where('user_id', $id)->first();
        // return $agen;
        return view('agen.cetak')->with('agen', $agen);
    }

    public function masukNilai($id)
    {
        $agen = Datapokok::where('user_id', $id)->first();
        // return $agen;    
        return view('agen.nilai')->with('agen', $agen);
    }

    public function check_nilai(Nilai $nilai){
        
        //cek nilai akademis
        $nilai_akademis = [];
        // $nilai_baca_quaran = $nilai->test_membaca_al_quran;
        $nilai_akir = '';
        array_push($nilai_akademis, $nilai->matematika,$nilai->bahasa_indonesia,$nilai->ilmu_pengetahuan_alam,$nilai->test_membaca_al_quran);

        if (in_array("D", $nilai_akademis)) {
            $nilai_akir = "Tidak Lulus";
        }else if(in_array("E", $nilai_akademis)){
            $nilai_akir = "Tidak Lulus";
        }else{
            $nilai_akir = "Lulus";
        }

        return $nilai_akir;

    }

    public function updateNilai(Request $request, $id)
    {
        $agen = Datapokok::where('user_id', $id)->first();

        if ($agen) {
            $nilai = $agen->nilai;

            // Make sure $nilai exists before attempting to update it
            if ($nilai) {
                $validateData = [
                    'matematika' => $request->matematika,
                    'ilmu_pengetahuan_alam' => $request->ilmu_pengetahuan_alam,
                    'bahasa_indonesia' => $request->bahasa_indonesia,
                    'test_membaca_al_quran' => $request->test_membaca_al_quran
                ];

                // Update the $nilai object with the new data
                $nilai->update($validateData);

                // Update the 'status' field based on the 'check_nilai' method
                $nilai->update([
                    'status' => $this->check_nilai($nilai)
                ]);

                // Optionally, you can return a response indicating success
                // return response()->json(['message' => 'Nilai updated successfully']);
            } else {
                // Handle the case where $nilai is not found
                // return response()->json(['error' => 'Nilai not found for this user'], 404);
            }
        } else {
            // Handle the case where $agen is not found
            // return response()->json(['error' => 'Datapokok not found for this user'], 404);
        }
        return redirect('/agen/nilai/' . $id)->with(['flash_message' => 'Nilai Updated!', 'agen' => $agen]);
    }

    
        // $nilai = Nilai::where('id', $nilaiId)->first();
        // $input = $request->all();
        // $nilai->update($input);

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
    public function destroy($id)
    {
        $agen = Datapokok::where('user_id', $id)->first();
        // return $agen;
        $nama = $agen->nama_lengkap;
        $id_datapokok = $agen->id;
        Datapokok::destroy($id_datapokok);
        Agen::destroy($id);
        return redirect('agen')->with('status', 'Siswa '. $nama .' berhasil dihapus!');
    }
}
