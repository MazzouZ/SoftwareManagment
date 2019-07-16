<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Conge;

class congeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
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
            'justification' => 'required'
        ]);

    $test=$this->verifier_duree($request->input('date_fin'),$request->input('date_debut'));

    if ($request->input('date_debut') < $request->input('date_fin'))
        {
            $conge = new Conge();
            $conge->date_debut = $request->input('date_debut');
            $conge->date_fin = $request->input('date_fin');
            $conge->user_id=Auth::User()->id;

            if ($test==false)
                $conge->etat = "Refusé";
            else
                $conge->etat = "En cours de Vérification";

            $conge->nbr_jour=$this->getNbrDays($request->input('date_fin'),$request->input('date_debut'));

            if($request->hasFile('justification'))
                $conge->justification= $request->justification->store('justifications','public');
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

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'date_debut' => 'required',
            'date_fin' => 'required',
            // 'justification' => 'required'
        ]);

        $test=$this->verifier_duree($request->input('date_fin'),$request->input('date_debut'));

        if ($request->input('date_debut') < $request->input('date_fin')) {

            $conge=Conge::find($id);
            $conge->date_debut = $request->input('date_debut');
            $conge->date_fin = $request->input('date_fin');
            if ($test==false)
                $conge->etat = "Refusé";
            else
                $conge->etat = "En cours de Vérification";
            $conge->nbr_jour=$this->getNbrDays($request->input('date_fin'),$request->input('date_debut'));
            $conge->save();
        }
        else return redirect('/conges/create');


        return redirect('/conges/')->with('success', 'Votre congé est Modifiée avec succèes');
    }
//    ---------------------------------------------------------------------------------------
    public function destroy($id)
    {
        Conge::find($id)->delete();
        return redirect('/conges/')->with('success', 'Votre congé est Supprimer avec succèes');    
    }
    //-------------------------------------------------------------------------------
    public function accepter_conge($id)
    {
        $conge = Conge::find($id);
        $conge->etat="Congé accepter";
        $conge->save();
        return $this->index();
    }
 //---------------------------------------------------------------------------
    public function Refuser_conge($id)
    {
        $conge = Conge::find($id);
        $conge->etat="Refusé";
        $conge->save();
        return $this->index();
    }
    public function rapport()
    {
        $conges = Conge::where('user_id',Auth::user()->id)->orderBy('id','asc')->paginate(5);
//         dd($conges);
        return view('conges.rapport')->with('conges', $conges);
    }
}
