<?php

namespace App\Http\Controllers\Auth;

use App\Models\Agen;
use App\Models\User;
use App\Models\Stock;
use App\Models\Produk;
use App\Models\Policy;
use App\Models\Nilai;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Datapokok;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['sometimes', 'image', 'mimes:jpg,jpeg,bmp,svg,png', 'max:5000'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if(request()->has('avatar')){

            $avataruploaded = request()->file('avatar');
            $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
            $avatarpath = public_path('/images/');
            $avataruploaded->move($avatarpath, $avatarname);
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'role' => 1,
                'password' => Hash::make($data['password']),
                'avatar' => '/images/' . $avatarname,
            ]);
            
        } else {

            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'role' => 1,
                'password' => Hash::make($data['password']),
            ]);
            
        }

        // $idBaru = User::latest('id')->first();


        // Datapokok::create([
        //     'user_id' => $idBaru->id,
        //     'nama_lengkap' => $data['nama_lengkap'],
        //     'email' => $data['email'],
        //     'upload_file' => "apasih anj",
        //     'nisn' => $data['nisn'],
        //     'jenis_kelamin' => $data['jenis_kelamin'],
        //     'tempat_lahir' => $data['tempat_lahir'],
        //     'tanggal_lahir' => $data['tanggal_lahir'],
        //     'agama' => $data['agama'],
        //     'alamat' => $data['alamat'],
        //     'asal_sekolah' => $data['asal_sekolah'],
        //     'alamat_sekolah' => $data['alamat_sekolah'],
        //     'jumlah_hafalan' => 2,
        //     'nama_ayah' => $data['nama_ayah'],
        //     'pekerjaan_ayah' => $data['pekerjaan_ayah'],
        //     'penghasilan_ayah' => $data['penghasilan_ayah'],
        //     'pendidikan_terakir_ayah' => $data['pendidikan_terakir_ayah'],
        //     'no_wa_ayah' => $data['no_wa_ayah'],
        //     'nama_ibu' => $data['nama_ibu'],
        //     'pekerjaan_ibu' => $data['pekerjaan_ibu'],
        //     'penghasilan_ibu' => $data['penghasilan_ibu'],
        //     'pendidikan_terakir_ibu' => $data['pendidikan_terakir_ibu'],
        //     'no_wa_ibu' => $data['no_wa_ibu'],
        //     'nama_wali_siswa' => $data['nama_wali_siswa'],
        //     'hubungan_dengan_siswa' => $data['hubungan_dengan_siswa'],
        //     'alamat_wali_siswa' => $data['alamat_wali_siswa'],
        //     'pekerjaan_wali' => $data['pekerjaan_wali'],
        //     'penghasilan_wali' => $data['penghasilan_wali'],
        //     'pendidikan_terakir_wali' => $data['pendidikan_terakir_wali'],
        //     'no_wa_wali_siswa' => $data['no_wa_wali_siswa'],
        //     'motivasi' => 'apasih anj',
        //     'daftar_sekolah_lain' => 1,
        //     'nama_sekolahnya_jika_daftar' => 'apasih anj',
        //     'informasi_didapatkan_dari' => 'brosur',
        // ]);

        // $idBaruDatapokok = Datapokok::latest('id')->first();


        // $raw_data_policy = [
        //     'datapokok_id' => $idBaruDatapokok->id, 
        //     'perjanjian1' => "ya",
        //     'perjanjian2' => "ya",
        //     'perjanjian3' => "ya",
        //     'perjanjian4' => "ya",
        // ];

        // $raw_data_nilai = [
        //     'datapokok_id' => $idBaruDatapokok->id, 
        //     "matematika" => $data['matematika'],
        //     "ilmu_pengetahuan_alam" => $data['ilmu_pengetahuan_alam'],
        //     "bahasa_indonesia" => $data['bahasa_indonesia'],
        //     "test_membaca_al_quran" => $data['test_membaca_al_quran'],
        //     "status" => $data['status']
        // ];

        // Nilai::create($raw_data_nilai);
        // Policy::create($raw_data_policy);

        
        // Agen::create($input);
        return redirect('login')->with('flash_message', 'Berhasil mendaftar, silahkan login!');
    }
}
