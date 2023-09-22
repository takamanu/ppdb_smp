<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agen;
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

        // $waktu = date('H:i');
        // $request->created_at = $waktu;
        // $request->updated_at = $waktu;

        Agen::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->newPassword),
        ]);

        Datapokok::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'upload_file' => NULL,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat_sekolah' => $request->alamat_sekolah,
            'jumlah_hafalan' => $request->jumlah_hafalan,
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
            'motivasi' => NULL,
            'daftar_sekolah_lain' => NULL,
            'nama_sekolahnya_jika_daftar' => NULL,
            'informasi_didapatkan_dari' => NULL,
        ]);

        // Agen::create($input);
        return redirect('agen')->with('flash_message', 'Users Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agen = Datapokok::where('user_id', $id)->first();


        // return $agen;
        return view('agen.show')->with('agen', $agen);
    }

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
