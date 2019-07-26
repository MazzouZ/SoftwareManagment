<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CsvExport;
use App\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CsvFile extends Controller
{

    public function index(){
//        $data = DB::table('conges')->join('users','conges.user_id','=','users.id')->SUBSTR(`date_debut`, 4, 7)->as('month')
//                                            ->sum('nbr_jour')->groupby('month')
//                                            ->orderBy('date_debut')
//                                            ->paginate(5);
    $data = DB::select('SELECT users.name,users.gross_salary,users.net_salary,SUM(nbr_jour) as somme_conge_mois,EXTRACT(MONTH FROM date_debut) as mois FROM users, conges WHERE conges.user_id=users.id GROUP BY mois,user_id');
        return view('conges.status',compact('data'));
    }
    public function csv_export(){
        return Excel::download(new CsvExport(),'status_salaire.csv');
    }
}
