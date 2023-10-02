<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class UsersAllLulus implements FromView
{
    public function view(): View
    {
        $users = DB::table('users')
                ->join('payments', 'users.id', '=', 'payments.user_id')
                ->join('datapokok', 'users.id', '=', 'datapokok.user_id')
                ->join('nilais', 'datapokok.id', '=', 'nilais.datapokok_id')
                ->select('users.*', 'payments.*','datapokok.nisn','nilais.status')
                ->where('users.role',1)
                ->where('payments.status_payment',2)
                ->where('payments.status',2)
                ->where('nilais.status','Lulus')
                ->get();
        $lulus = "Lulus";
        return view('agen.allsiswabayar', [
            'agen' => $users,
            'lulus' => $lulus
        ]);
    }
}
