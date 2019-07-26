<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearch extends Controller
{
    function index()
    {
        return view('conges.live_search');
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('conges')->join('users','conges.user_id','=','users.id')
                    ->where('cause', 'like', '%'.$query.'%')
                    ->orWhere('date_debut', 'like', '%'.$query.'%')
                    ->orWhere('etat_Admin', 'like', '%'.$query.'%')
                    ->orWhere('name', 'like', '%'.$query.'%')
                    ->orWhere('nbr_jour', 'like', '%'.$query.'%')
//                    ->orderBy('CustomerID', 'desc')
                    ->get();
            }
            else
            {
                $data = DB::table('conges')->join('users','conges.user_id','=','users.id')
                    ->orderBy('id')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
        <tr>
        <td>'.$row->name.'</td>
         <td>'.$row->cause.'</td>
         <td>'.$row->date_debut.'</td>
         <td>'.$row->date_fin.'</td>
         <td>'.$row->etat_Admin.'</td>
         <td>'.$row->nbr_jour.'</td>
        </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="6">Aucun congé n\'est trouvé</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
}