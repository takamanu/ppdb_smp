<?php

namespace App\Http\Controllers\Auth;

use App\Models\Agen;
use App\Models\User;
use App\Models\Stock;
use App\Models\Produk;
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
    protected $redirectTo = '/agen';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
                'password' => Hash::make($data['password']),
                'avatar' => '/images/' . $avatarname,
            ]);
            
        } else {
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }
        
        $products = Produk::all();
        $idBaru = User::latest('id')->first();

        Datapokok::create([
            'user_id' => $idBaru->id,
            'policy_id' => $idBaru->id,
            'nama_lengkap' => $data['nama_lengkap'],
            'email' => $data['email'],
            'upload_file' => "apasih anj",
            'nisn' => $data['nisn'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'agama' => $data['agama'],
            'asal_sekolah' => $data['asal_sekolah'],
            'alamat_sekolah' => $data['alamat_sekolah'],
            'jumlah_hafalan' => 2,
            'nama_ayah' => $data['nama_ayah'],
            'pekerjaan_ayah' => $data['pekerjaan_ayah'],
            'penghasilan_ayah' => $data['penghasilan_ayah'],
            'pendidikan_terakir_ayah' => $data['pendidikan_terakir_ayah'],
            'no_wa_ayah' => $data['no_wa_ayah'],
            'nama_ibu' => $data['nama_ibu'],
            'pekerjaan_ibu' => $data['pekerjaan_ibu'],
            'penghasilan_ibu' => $data['penghasilan_ibu'],
            'pendidikan_terakir_ibu' => $data['pendidikan_terakir_ibu'],
            'no_wa_ibu' => $data['no_wa_ibu'],
            'nama_wali_siswa' => $data['nama_wali_siswa'],
            'hubungan_dengan_siswa' => $data['hubungan_dengan_siswa'],
            'alamat_wali_siswa' => $data['alamat_wali_siswa'],
            'pekerjaan_wali' => $data['pekerjaan_wali'],
            'penghasilan_wali' => $data['penghasilan_wali'],
            'pendidikan_terakir_wali' => $data['pendidikan_terakir_wali'],
            'no_wa_wali_siswa' => $data['no_wa_wali_siswa'],
            'motivasi' => 'apasih anj',
            'daftar_sekolah_lain' => 1,
            'nama_sekolahnya_jika_daftar' => 'apasih anj',
            'informasi_didapatkan_dari' => 'brosur',
        ]);
        
        foreach($products as $product) {
            $stock = [
                'produk_id' => $product->id,
                'user_id' => $idBaru->id,
                'jumlah_barang' => 0
            ];


            Stock::create($stock);
        }

        // Agen::create($input);
        return redirect('agen')->with('flash_message', 'Users Added!');
    }
}
