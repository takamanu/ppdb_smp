<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Http\Controllers\Controller;
use App\Models\Testresult;
use App\Models\User;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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

    public function store(Request $request)
    {

        $validateData = [
            'user_id' => auth()->user()->id,
            'matematika' => $request->matematika,
            'ilmu_pengetahuan_alam' => $request->ilmu_pengetahuan_alam,
            'bahasa_indonesia' => $request->bahasa_indonesia,
            'test_membaca_al_quran' => $request->test_membaca_al_quran
        ];

        $nilai = Nilai::create($validateData);

        $nilai_find = Nilai::find($nilai->id);
        $nilai_find->update([
            'status' => $this->check_nilai($nilai)
        ]);

        return "Berhasil";        
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        $validateData = $request->validate([
            'user_id' => 'required',
            'matematika' => 'required',
            'ilmu_pengetahuan_alam' => 'required',
            'bahasa_indonesia' => 'required',
            'test_membaca_al_quran' => 'required'
        ]);

        $id_nilai = $request->id_nilai;
        $nilai = Nilai::find($id_nilai);
        $nilai->update($validateData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        //
    }
}
