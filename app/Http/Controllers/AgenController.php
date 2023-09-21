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
            'nama_lengkap' => $request->name,
            'email' => $request->email,
            'upload_file' => NULL,
            'nisn' => NULL,
            'jenis_kelamin' => 1,
            'tempat_lahir' => NULL,
            'tanggal_lahir' => NULL,
            'agama' => NULL,
            'asal_sekolah' => NULL,
            'alamat_sekolah' => NULL,
            'jumlah_hafalan => NULL' => NULL,
            'nama_ayah => NULL' => NULL,
            'pekerjaan_ayah' => NULL,
            'penghasilan_ayah' => NULL,
            'pendidikan_terakir_ayah' => NULL,
            'no_wa_ayah' => NULL,
            'nama_ibu' => NULL,
            'pekerjaan_ibu' => NULL,
            'penghasilan_ibu' => NULL,
            'pendidikan_terakir_ibu' => NULL,
            'no_wa_ibu' => NULL,
            'nama_wali_siswa' => NULL,
            'hubungan_dengan_siswa' => NULL,
            'alamat_wali_siswa' => NULL,
            'pekerjaan_wali' => NULL,
            'penghasilan_wali' => NULL,
            'pendidikan_terakir_wali' => NULL,
            'no_wa_wali_siswa' => NULL,
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
        $agen = Datapokok::find($id);
        return view('agen.show')->with('agen', $agen);
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
        Agen::destroy($id);
        return redirect('agen')->with('status', 'Member berhasil dihapus!');
    }
}
