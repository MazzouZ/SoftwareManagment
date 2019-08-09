<?php

namespace App\Http\Controllers;

use App\Pointage;
use Illuminate\Http\Request;
use App\Exports\CsvExport;
use App\Imports\CsvImport;
use App\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CsvFile extends Controller
{

    public function index_status(){
//        $data = DB::table('conges')->join('users','conges.user_id','=','users.id')->SUBSTR(`date_debut`, 4, 7)->as('month')
//                                            ->sum('nbr_jour')->groupby('month')
//                                            ->orderBy('date_debut')
//                                            ->paginate(5);
    $data = DB::select('SELECT group_concat(conges.cause separator \', \') as cause,users.name,users.gross_salary,users.net_salary,SUM(nbr_jour) as somme_conge_mois,Substr(date_debut,1,7) as mois FROM users, conges WHERE conges.user_id=users.id GROUP BY mois,user_id');
        return view('conges.status',compact('data'));
    }
    //----------------------------------------------------------
    public function csv_export(){
        return Excel::download(new CsvExport(),'status_salaire.csv');
    }
    //-------------------------------------------------------------

    public function index_pointage(){
        $p=Pointage::orderBy('id')->paginate(50);
        return view('pointage.index',compact('p',$p));
    }


    //-----------------------------------
    public function csv_import()
    {
         if(request()->hasFile('file'))
           Excel::import(new CsvImport,request()->file('file'));
         else alert()->error('No csv File ','Imoprted');
         return back();
    }
}
