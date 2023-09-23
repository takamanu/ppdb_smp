<?php

namespace App\Http\Controllers;

use App\Models\RegistrasiUlang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegistrasiUlangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
        $validatedData = $request->validate([
            'ijazah' => 'required|mimes:pdf|',
            'surat_pernyataan_bermaterai' => 'required|mimes:pdf|',
            'surat_keterangan_siswa_aktif_sd_asal' => 'required|mimes:pdf|',
            'pasfoto' => 'required|mimes:pdf|',
            'akta_kelahiran' => 'required|mimes:pdf|',
            'kk' => 'required|mimes:pdf|',
        ]);
        $validatedData['ijazah'] = $request->file('ijazah')->store('/public/registrasi_ulang/ijazah');
        $validatedData['surat_pernyataan_bermaterai'] = $request->file('surat_pernyataan_bermaterai')->store('/public/registrasi_ulang/surat_pernyataan_bermaterai');
        $validatedData['surat_keterangan_siswa_aktif_sd_asal'] = $request->file('surat_keterangan_siswa_aktif_sd_asal')->store('/public/registrasi_ulang/surat_keterangan_siswa_aktif_sd_asal');
        $validatedData['pasfoto'] = $request->file('pasfoto')->store('/public/registrasi_ulang/pasfoto');
        $validatedData['akta_kelahiran'] = $request->file('akta_kelahiran')->store('/public/registrasi_ulang/akta_kelahiran');
        $validatedData['kk'] = $request->file('kk')->store('/public/registrasi_ulang/kk');
        $validatedData['user_id'] = 1;

        $registrasiUlang = RegistrasiUlang::create($validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegistrasiUlang  $registrasiUlang
     * @return \Illuminate\Http\Response
     */
    public function show(RegistrasiUlang $registrasiUlang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistrasiUlang  $registrasiUlang
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistrasiUlang $registrasiUlang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistrasiUlang  $registrasiUlang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistrasiUlang $registrasiUlang)
    {
        $validatedData = $request->validate([
            'ijazah' => 'mimes:pdf',
            'surat_pernyataan_bermaterai' => 'mimes:pdf',
            'surat_keterangan_siswa_aktif_sd_asal' => 'mimes:pdf',
            'pasfoto' => 'mimes:pdf',
            'akta_kelahiran' => 'mimes:pdf',
            'kk' => 'mimes:pdf',
        ]);

        if($request->file('ijazah')){
            if($request->old_ijazah){
                Storage::delete($request->old_ijazah);
            }
            $validatedData['ijazah'] = $request->file('ijazah')->store('/public/registrasi_ulang/ijazah');
        }

        if($request->file('surat_pernyataan_bermaterai')){
            if($request->old_surat_pernyataan){
                Storage::delete($request->old_surat_pernyataan);
            }
            $validatedData['surat_pernyataan_bermaterai'] = $request->file('surat_pernyataan_bermaterai')->store('/public/registrasi_ulang/surat_pernyataan_bermaterai');
        }

        if($request->file('surat_keterangan_siswa_aktif_sd_asal')){
            if($request->old_surat_keterangan_swswa_aktif){
                Storage::delete($request->old_surat_keterangan_swswa_aktif);
            }
            $validatedData['surat_keterangan_siswa_aktif_sd_asal'] = $request->file('surat_keterangan_siswa_aktif_sd_asal')->store('/public/registrasi_ulang/surat_keterangan_siswa_aktif_sd_asal');
        }

        if($request->file('pasfoto')){
            if($request->old_pas_foto){
                Storage::delete($request->old_pas_foto);
            }
            $validatedData['pasfoto'] = $request->file('pasfoto')->store('/public/registrasi_ulang/pasfoto');
        }

        if($request->file('akta_kelahiran')){
            if($request->old_akta_kelahiran){
                Storage::delete($request->old_akta_kelahiran);
            }
            $validatedData['akta_kelahiran'] = $request->file('akta_kelahiran')->store('/public/registrasi_ulang/akta_kelahiran');
        }

        if($request->file('kk')){
            if($request->old_kk){
                Storage::delete($request->old_kk);
            }
            $validatedData['kk'] = $request->file('kk')->store('/public/registrasi_ulang/kk');
        }
        $id = $request->id_registrasi_ulang;
        $registrasiUlang = RegistrasiUlang::find($id);
        $registrasiUlang->update($validatedData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistrasiUlang  $registrasiUlang
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistrasiUlang $registrasiUlang)
    {
        //
    }
}
