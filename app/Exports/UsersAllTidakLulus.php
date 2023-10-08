<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class UsersAllTidakLulus implements FromView
{
    public function view(): View
    {
        $users = DB::table('users')
            ->join('payments', 'users.id', '=', 'payments.user_id')
            ->join('registration', 'users.id', '=', 'registration.user_id')
            ->join('testresult', 'registration.id', '=', 'testresult.datapokok_id')
            ->select('users.*', 'payments.*','registration.nisn','testresult.status')
            ->where('users.role',1)
            ->where('payments.status_payment',2)
            ->where('payments.status',2)
            ->where('testresult.status','Tidak Lulus')
            ->get();
        $lulus = "Tidak Lulus";
        return view('agen.allsiswabayar', [
            'agen' => $users,
            'lulus' => $lulus
        ]);
    }
}
