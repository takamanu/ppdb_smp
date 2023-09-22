<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datapokok extends Model
{
    use HasFactory;

    protected $table = 'datapokok';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'policy_id',
        'email', 'upload_file', 'nama_lengkap','nisn','jenis_kelamin','tempat_lahir','tanggal_lahir',
        'agama','asal_sekolah','alamat_sekolah','jumlah_hafalan','nama_ayah','pekerjaan_ayah','penghasilan_ayah',
        'pendidikan_terakir_ayah','no_wa_ayah','nama_ibu','pekerjaan_ibu','penghasilan_ibu','pendidikan_terakir_ibu',
        'no_wa_ibu','nama_wali_siswa','hubungan_dengan_siswa','alamat_wali_siswa','pekerjaan_wali','penghasilan_wali',
        'pendidikan_terakir_wali','no_wa_wali_siswa','motivasi','daftar_sekolah_lain','nama_sekolahnya_jika_daftar',
        'informasi_didapatkan_dari'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function policy(){
        return $this->hasOne(Policy::class);
    }

}
