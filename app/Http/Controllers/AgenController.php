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
use App\Models\RegistrasiUlang;

date_default_timezone_set('Asia/Jakarta');

class AgenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function get_user_with_all_paid(){
        $users = DB::table('users')
                ->join('payments', 'users.id', '=', 'payments.user_id')
                ->join('datapokok', 'users.id', '=', 'datapokok.user_id')
                ->select('users.*', 'payments.*', 'datapokok.*')
                ->where('payments.status',2)
                ->where('users.role',1)
                ->get();
    }

    public function get_user_with_all_paid_and_datapokok(){
        $users = DB::table('users')
                ->join('payments', 'users.id', '=', 'payments.user_id')
                ->join('datapokok', 'users.id', '=', 'datapokok.user_id')
                ->select('users.*', 'payments.*', 'datapokok.*')
                ->where('payments.status',2)
                ->where('users.role',1)
                ->where('datapokok.user_id','!=',NULL)
                ->get();
        // dd($users);
    }

    public function get_user_with_all_registerd_account(){
        $users = DB::table('users')
                ->where('users.role',1)
                ->get();
        dd($users);
    }

    public function index(Request $request)
    {
        // $this->get_user_with_all_registerd_account();
        //
        // return view('user.index', [
        //     'users' => DB::table('users')->paginate(15)
        // ]);
        $cari = $request->query('cari');


        if(!empty($cari)){
            $dataagen = User::where('name','like',"%".$cari."%")
                ->sortable()
                ->paginate(5);
//
        }else{
            $dataagen = User::sortable()->paginate(5);
        }
        return view('agen.index')->with([
            'agen' => $dataagen,
            'cari' => $cari,

        ]);

        $dataagen = User::paginate(5);
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

        $registrasi_ulang = RegistrasiUlang::where('user_id',$id)->first();
        // return $user->registrasi_ulang;
        // dd($registrasi_ulang);

        $data = [];
        

        $data['ijazah'] = explode("/",$registrasi_ulang->ijazah)[2];
        $data['surat_pernyataan_bermaterai'] = explode("/",$registrasi_ulang->surat_pernyataan_bermaterai)[2];
        $data['surat_keterangan_siswa_aktif_sd_asal'] = explode("/",$registrasi_ulang->surat_keterangan_siswa_aktif_sd_asal)[2];
        $data['pasfoto'] = explode("/",$registrasi_ulang->pasfoto)[2];
        $data['akta_kelahiran'] = explode("/",$registrasi_ulang->akta_kelahiran)[2];
        $data['kk'] = explode("/",$registrasi_ulang->kk)[2];

        // dd($data);
        

        // dd($agen->nilai);
        // $agen = User::where('id', $id)->first();

        // dd($agen->datapokok->policy);
        // $agentest = Datapokok::where('user_id', 2)->first();
        // return $agentest;
        // dd($data);

        // return $agen;
        return view('agen.show')->with(['agen' => $agen, 'user' => $user, 'data' => $data]);
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
        // return $id;

        $agen = Datapokok::where('user_id', $id)->first();
        // return $id;

        $nilai = $agen->nilai;

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
        
        $agen = User::where('id', $id)->first();

        if (!empty($agen->datapokok)){
            Datapokok::destroy($agen->datapokok->id);
        }

        if (!empty($agen->nilai)){
            Nilai::destroy($agen->nilai->id);
        }

        if (!empty($agen->policy)){
            Policy::destroy($agen->policy->id);
        }

        if (!empty($agen->registrasi_ulang)){
            Policy::destroy($agen->policy->registrasi_ulang);
        }
        // return $agen;
        $nama = $agen->name;
        User::destroy($id);
        
        return redirect('agen')->with('status', 'Siswa '. $nama .' berhasil dihapus!');
    }
}
