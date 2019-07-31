<?php

namespace App\Http\Controllers;

use App\Conge;
use App\Free_day;
use App\Pointage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PointageController extends Controller
{
   public function index_rapport()
   {

       $p=DB::select('SELECT users.name,SUM(nbr_jour) as somme_conge_mois,Substr(date_debut,1,7) as mois FROM users, conges WHERE conges.user_id=users.id GROUP BY mois,user_id');
       $worked=Pointage::all();
       return view('pointage.rapport',compact('p',$p),compact('ws',$worked));
   }
}
