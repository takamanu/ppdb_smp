<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Log;


use App\Models\RegistrasiUlang;
use App\Models\Datapokok;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    //  public function store(Request $request)
    //     {
    //         // Retrieve the authenticated user
    //         $user = auth()->user();
    //         $config = Config::find(1); // Assuming 'Config' is your model for configuration data

    //         // Check if the user has already submitted files
    //         if (!is_null($user->registrasi_ulang)) {
    //             return abort(403, 'Unauthorized');
    //         }

    //         // Define validation rules
    //         $validator = Validator::make($request->all(), [
    //             'ijazah' => 'required|mimes:pdf,docx',
    //             'surat_pernyataan_bermaterai' => 'required|mimes:pdf,docx',
    //             'surat_keterangan_siswa_aktif_sd_asal' => 'required|mimes:pdf,docx',
    //             'pasfoto' => 'required|image|mimes:jpg,jpeg,png',
    //             'akta_kelahiran' => 'required|mimes:pdf,docx',
    //             'kk' => 'required|mimes:pdf,docx',
    //         ]);

    //         if ($validator->fails()) {
    //             return redirect()->back()
    //                 ->withErrors($validator)
    //                 ->withInput();
    //         }

    //         try {
    //             // Start a database transaction
    //             DB::beginTransaction();

    //             // Store the uploaded files
    //             $uploadedFiles = [];
    //             foreach ($request->allFiles() as $key => $file) {
    //                 $path = $file->store('uploads'); // Store files in the 'uploads' directory
    //                 $uploadedFiles[$key] = $path;
    //             }

    //             // Create a record in the database with the file paths
    //             RegistrasiUlang::create([
    //                 'user_id' => $user->id,
    //                 'ijazah' => $uploadedFiles['ijazah'],
    //                 'surat_pernyataan_bermaterai' => $uploadedFiles['surat_pernyataan_bermaterai'],
    //                 'surat_keterangan_siswa_aktif_sd_asal' => $uploadedFiles['surat_keterangan_siswa_aktif_sd_asal'],
    //                 'pasfoto' => $uploadedFiles['pasfoto'],
    //                 'akta_kelahiran' => $uploadedFiles['akta_kelahiran'],
    //                 'kk' => $uploadedFiles['kk'],
    //             ]);

    //             // Commit the database transaction
    //             DB::commit();

    //             // Redirect with a success message
    //             return redirect('/siswa/pengumuman/' . $user->id)
    //                 ->with([
    //                     'success' => 'Files uploaded successfully.',
    //                     'config' => $config,
    //                 ]);
    //         } catch (\Exception $e) {
    //             // Rollback the database transaction on error
    //             DB::rollback();

    //             // Log the error for debugging (you can customize this)
    //             Log::error('File upload error: ' . $e->getMessage());

    //             // Redirect with an error message
    //             return redirect()->back()
    //                 ->with('error', 'An error occurred while processing your request. Please try again later.');
    //         }
    //     }
    public function store(Request $request)
    {   
        // return $request;
        
        $user = auth()->user()->id;
        $auth = auth()->user();
        $config = Config::where('id', 1)->first();


        if (!is_null($auth->registrasi_ulang)){
            return abort(403, 'Unauthorized');

        }

        $user = auth()->user()->id;
        $siswa = Datapokok::where('user_id', $user)->first();

        $usess = User::find(Auth::user()->id);
        // dd($usess->datapokok);
        $request->validate([
            'ijazah' => 'required|mimes:pdf,docx',
            'surat_pernyataan_bermaterai' => 'required|mimes:pdf,docx',
            'surat_keterangan_siswa_aktif_sd_asal' => 'required|mimes:pdf,docx',
            'pasfoto' => 'required|image|mimes:jpg,jpeg,png',
            'akta_kelahiran' => 'required|mimes:pdf,docx',
            'kk' => 'required|mimes:pdf,docx',
        ]);
        // return $siswa;

        // Store the uploaded files
        $uploadedFiles = [];
        // return $user->datapokok;
        // $agen = $user->datapokok;
        // return $agen;'
        $agen = '';
        $date_now = date('Y-m-d H:i:s');

        if (is_null($siswa)) {
            $agen = 'NULL'; // Set a default value or any other value you want to use
        }

        foreach ($request->allFiles() as $key => $file) {
            $path = $file->store('uploads'); // Store files in the 'uploads' directory

            $uploadedFiles[$key] = $path;
        }

        // Create a record in the database with the file paths
        RegistrasiUlang::create([
            'user_id' => auth()->user()->id,
            'ijazah' => $uploadedFiles['ijazah'],
            'surat_pernyataan_bermaterai' => $uploadedFiles['surat_pernyataan_bermaterai'],
            'surat_keterangan_siswa_aktif_sd_asal' => $uploadedFiles['surat_keterangan_siswa_aktif_sd_asal'],
            'pasfoto' => $uploadedFiles['pasfoto'],
            'akta_kelahiran' => $uploadedFiles['akta_kelahiran'],
            'kk' => $uploadedFiles['kk'],
        ]);

        // Redirect with a success message
        return redirect('/siswa/pengumuman/' . $siswa->user_id)
            ->with(['siswa' => $siswa,
            'agen' => $agen,
            'success' => 'Files uploaded successfully.',
            'config' =>$config]);
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
        $check_data = RegistrasiUlang::find('user_id',Auth::user()->id);
        if($check_data){
            return abort(403, 'Unauthorized');
        }
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
