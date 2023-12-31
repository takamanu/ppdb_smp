<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',
    ];

    public $sortable = ['name', 'email', 'password'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function transaksi() {
        return $this->hasMany(Transaksi::class);
    }

    public function stock() {
        return $this->hasMany(Stock::class);
    }

    public function datapokok() {
        return $this->hasOne(Datapokok::class);
    }

    public function registrasi_ulang() {
        return $this->hasOne(RegistrasiUlang::class);
    }
    
    // public function nilai() {
    //     return $this->hasOne(Testresult::class);
    // }

    public function payment() {
        return $this->hasMany(Payment::class);
    }
}
