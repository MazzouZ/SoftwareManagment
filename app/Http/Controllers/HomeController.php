<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::user()->hasRole('Admin'))
        $worked= DB::select(" SELECT jour,users.name,(SUM(total) / 3600) as nbr_hour 
                            FROM users,table_pointage 
                            WHERE users.id=table_pointage.user_id
                            GROUP BY jour,user_id 
                            ORDER BY jour");

      else $worked= DB::select(" SELECT jour,users.name,(SUM(total) / 3600) as nbr_hour 
                            FROM users,table_pointage 
                            WHERE users.id=table_pointage.user_id and users.name LIKE '".Auth::user()->name."'
                            GROUP BY jour,user_id 
                            ORDER BY jour LIMIT 7");


        return view('home')->with('worked',$worked);
    }
}
