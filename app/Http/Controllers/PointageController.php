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

       $p=DB::select('SELECT users.name,SUM(nbr_jour) as somme_conge_mois,
                             Substr(date_debut,1,7) as mois,
                              GROUP_CONCAT(DATEDIFF(`date_fin`, `date_debut`) separator \' | \') AS DateDiff,
                               GROUP_CONCAT(nbr_jour separator \' | \') AS nombre_jour
                               FROM users, conges 
                               WHERE conges.user_id=users.id 
                               GROUP BY mois,user_id');

       $ws=DB::select('SELECT u.name,SUM(Tb_p.total) as seconds,
                             Substr(Tb_p.jour,1,7) as mois
                             FROM users u,table_pointage Tb_p 
                             WHERE u.id=Tb_p.user_id 
                             GROUP BY user_id,mois');
       return view('pointage.rapport',compact('p',$p),compact('ws',$ws));
   }
}
