<?php

namespace Database\Seeders;

use App\Models\Config;
use App\Models\User; // Import the User model
use App\Models\Datapokok;
use App\Models\Stock;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Policy;
use App\Models\Nilai;
use App\Models\Registration;
use App\Models\Reregistration;
use App\Models\Testresult;
use Carbon\Carbon; // Import the Carbon class
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
// use PSpell\Config;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

     
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Fauzan Ali',
            'email' => 'fauzanali@email.com',
            'role' => 0,
            'password' => bcrypt('password')
        ]);

        Datapokok::create([
            'user_id' => 1,
            // 'policy_id' => 1,
            'nama_lengkap' => "Fauzan Ali Vijsma",
            'email' => "Email",
            'upload_file' => "Upload file",
            'nisn' => "1261788090",
            'jenis_kelamin' => "laki",
            'tempat_lahir' => "Tangerang",
            'tanggal_lahir' => Carbon::now()->toDateTimeString(),
            'agama' => "Islam",
            'asal_sekolah' => "SMAN 34 Tangerang",
            'alamat_sekolah' => "Jl. Menuju Kebahagiaan",
            'jumlah_hafalan' => 2,
            'alamat' => "Jl. Menuju Kebahagiaan",
            'nama_ayah' => "Alexis Jumanto",
            'pekerjaan_ayah' => "Software Engineer",
            'penghasilan_ayah' => 3,
            'pendidikan_terakir_ayah' => "s1",
            'no_wa_ayah' => "087836467333",
            'nama_ibu' => "Susi Sumanti",
            'pekerjaan_ibu' => "Ibu Rumah Tangga",
            'penghasilan_ibu' => 3,
            'pendidikan_terakir_ibu' => "sd",
            'no_wa_ibu' => "0930748326464",
            'nama_wali_siswa' => "Cumanti Cumanto",
            'hubungan_dengan_siswa' => "Bapak Tiri",
            'alamat_wali_siswa' => "Jl. Kirefg dsgdys",
            'pekerjaan_wali' => "Software Engineer",
            'penghasilan_wali' => 4,
            'pendidikan_terakir_wali' => "s3",
            'no_wa_wali_siswa' => "003724893724264",
            'motivasi' => 'Menjadi superman',
            'daftar_sekolah_lain' => 1,
            'nama_sekolahnya_jika_daftar' => 'SMPN 3748 Mars',
            'informasi_didapatkan_dari' => 'brosur',
            'alamat' => 'alamat'
        ]);

        Policy::create([
            'datapokok_id' => 1,
            'perjanjian1' => "ya",
            'perjanjian2' => "ya",
            'perjanjian3' => "ya",
            'perjanjian4' => "ya"

        ]);

        Nilai::create([
            "datapokok_id" => 1,
            "matematika" => "50",
            "ilmu_pengetahuan_alam" => "50",
            "bahasa_indonesia" => "50",
            "test_membaca_al_quran" => "50",
            "status" => "Lulus"
        ]);

        Config::create([
            'pendaftaran_akun_ppdb_start'   => '2023-02-01 00:00:00',
            'pendaftaran_akun_ppdb_due'     => '2023-02-15 23:59:59',
            'pengumpulan_berkas_start'      => '2023-02-20 08:00:00',
            'pengumpulan_berkas_due'        => '2023-03-05 23:59:59',
            'test_akademik_start'           => '2023-03-10 08:00:00',
            'test_akademik_due'             => '2023-03-20 23:59:59',
            'test_baca_al_quran_start'      => '2023-03-25 08:00:00',
            'test_baca_al_quran_due'        => '2023-04-05 23:59:59',
            'test_wawancara_start'          => '2023-04-10 08:00:00',
            'test_wawancara_due'            => '2023-04-20 23:59:59',
            'pendaftaran_ulang_start'       => '2023-05-01 08:00:00',
            'pendaftaran_ulang_due'         => '2023-05-15 23:59:59',
            'pengumuman'                    => 0,
            'redirect_wa'                   => 'web.whatsapp.com',
            'nominal_pembayaran'            => '100000',
            'midtrans_merchant_id' => 'G580749628',
            'midtrans_client_key' => 'SB-Mid-client-0E_ucsMNs8bQWClM',
            'midtrans_server_key' => 'SB-Mid-server-AHwHYyPOXtAfyedpZ6CxHh5u',
            'order_id_midtrans'  => 11,
        ]);
        

        
    }
}
