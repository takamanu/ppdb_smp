<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'user_id' => 'required',
            'matematika' => 'required',
            'ilmu_pengetahuan_alam' => 'required',
            'bahasa_indonesia' => 'required',
            'test_membaca_al_quran' => 'required'
        ]);

        Nilai::create($validateData);
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
