<?php

namespace App\Http\Controllers;

use App\Free_day;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Conge;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class congeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //-------------------------------------

        //--------------------------------------------
        $role = Auth::user()->getRoleNames();
        if ($role[0] == "Admin")
            $conges = Conge::orderBy('id','asc')->paginate(5);

        else $conges = Conge::where('user_id',Auth::user()->id)->orderBy('id','asc')->paginate(5);
//         dd($conges);
        return view('conges.index')->with('conges', $conges);
    }
//----------------------------------------------------------------------------
    public function create()
    {
        return view('conges.create');
    }
//    ----------------------------------------------------------------------------------------------------------------
    public function verifier_duree($df,$ds){
        $mytime = date('Y-m-d');
        $test=true;
        $x=$this->getNbrDays($df,$ds);
        switch ($x) {
            case 0:
                $test=false;
                break;
            case 1 || 2:
                if ($this->getNbrDays($ds,$mytime) < 5)
                    $test=false;

                break;
            case 3 || 4:
                if ($this->getNbrDays($ds,$mytime) < 7)
                    $test=false;

                break;
            case 5 || 6 || 7 || 8 || 9 || 10:
                if ($this->getNbrDays($ds,$mytime) < 30)
                    $test=false;

                break;
            default:
                if ($this->getNbrDays($ds,$mytime) < 45)
                    $test=false;
        }
        return $test;
    }
//    -----------------------------------------------------------------------------------------------------------------------
    public function getNbrDays($date_fin,$date_debut)
    {
        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $date_fin);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $date_debut);
        $diff_in_days = $to->diffInDays($from);
        return $diff_in_days ;
    }
//-------------------------------------------------------------
    public function store(Request $request)
    {
        $this->validate($request, [
            'date_debut' => 'required',
            'date_fin' => 'required',
            'cause' => 'required'
        ]);

    $test=$this->verifier_duree($request->input('date_fin'),$request->input('date_debut'));

        if ($request->input('date_debut') < $request->input('date_fin'))
            {
                $conge = new Conge();
                $conge->date_debut = $request->input('date_debut');
                $conge->date_fin = $request->input('date_fin');
                $conge->user_id=Auth::User()->id;

                if ($test==false)
                    $conge->etat = "Refusé par système";
                else
                    $conge->etat = "Congé accepter par système";

                $conge->nbr_jour=$this->WorkingDaysNumber($request->input('date_debut'),$request->input('date_fin'));

                if($request->hasFile('justification'))
                    $conge->justification= $request->justification->store('justifications','public');

                $conge->cause=$request->input('cause');

                $conge->save();
            }
         else return redirect('/conges/create');

        return redirect('/conges/')->with('success', 'Votre congé est en cours de validaton');
    }
//-------------------------------------------------------------------------------
    public function edit($id)
    {
        $conges = Conge::find($id);
        return view('conges.edit', ['conges' => $conges]);
    }
    //---------------------------------------------------------------------------------------------------------

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'date_debut' => 'required',
            'date_fin' => 'required',
             'cause' => 'required'
        ]);

        $test=$this->verifier_duree($request->input('date_fin'),$request->input('date_debut'));

        if ($request->input('date_debut') < $request->input('date_fin')) {

            $conge=Conge::find($id);
            $conge->date_debut = $request->input('date_debut');
            $conge->date_fin = $request->input('date_fin');
            if ($test==false)
                $conge->etat = "Refusé par système";
            else
                $conge->etat = "Congé accepter par système";
            $conge->nbr_jour=$this->WorkingDaysNumber($request->input('date_debut'),$request->input('date_fin'));
            $conge->cause=$request->input('cause');
            $conge->save();
        }
        else return redirect('/conges/create');


        return redirect('/conges/')->with('success', 'Votre congé est Modifiée avec succèes');
    }
//    ---------------------------------------------------------------------------------------
    public function destroy($id)
    {
        $conge=Conge::find($id);
        $conge->delete();
        $user=User::find($conge->user_id);
        $user->nbr_jour_rester+=$conge->nbr_jour;
        $user->save();
        return redirect('/conges/')->with('success', 'Votre congé est Supprimer avec succèes');    
    }
    //-------------------------------------------------------------------------------
    public function accepter_conge($id)
    {
        $conge = Conge::find($id);
        $conge->etat_Admin="Accepter";
        $user=User::find($conge->user_id);
        $user->nbr_jour_rester-=$conge->nbr_jour;
        $user->save();
        $conge->save();
        return redirect('/conges/');
    }
 //---------------------------------------------------------------------------
    public function Refuser_conge($id)
    {
        $conge = Conge::find($id);
        $conge->etat_Admin="Refusé";
        $conge->save();
        return redirect('/conges/');
    }
//    --------------------------------------------
    public function rapport()
    {
        $years = DB::select('SELECT DISTINCT SUBSTR(`date_debut`, 1, 4) AS year FROM conges');
        $reports = DB::select('SELECT SUBSTR(`date_debut`, 1, 4)AS year, SUM(`nbr_jour`) as somme,`user_id` FROM conges where etat_Admin like \'Accepter\' GROUP BY year,`user_id`');

        $users=User::all();

        return view('conges.rapport')->with('years', $years)->with('reports',$reports)->with('users',$users);
    }
    //---------------------------------------------------------------------------------------------------------

    public function filterByYear($year){

        $years = DB::select('SELECT DISTINCT SUBSTR(`date_debut`, 1, 4) AS year FROM conges');

        $conges=Conge::Where('date_debut','like',$year.'%')->where('etat_Admin','Accepter')->get();

        return view('conges.rapport')->with('conges', $conges)->with('years', $years);
    }
    //---------------------------------------------------------------------------------------------------------
    public function WorkingDaysNumber($startDate, $endDate)
    {
        $start = Carbon::createFromFormat('Y-m-d',$startDate);
        $end = Carbon::createFromFormat('Y-m-d', $endDate);

        $holidays = Free_day::all();

        $nbrDays = $start->diffInDaysFiltered(function (Carbon $date) use ($holidays){
            foreach ($holidays as $H)
                if ($H->day == $date->toDateString())
                    return false;
            return !$date->isWeekend();
        }, $end);
        return $nbrDays;
    }
}
