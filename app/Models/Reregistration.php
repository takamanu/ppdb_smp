<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reregistration extends Model
{
    use HasFactory;
    protected $table = 'reRegistration';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'ijazah',
        'surat_pernyataan_bermaterai',
        'surat_keterangan_siswa_aktif_sd_asal',
        'pasfoto',
        'akta_kelahiran',
        'kk'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
