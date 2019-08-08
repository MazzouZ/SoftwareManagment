<?php

namespace App\Http\Controllers;

use App\Docs_administratif;
use App\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Docs_administratifController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $role = Auth::user()->getRoleNames();
        if ($role[0] == "Admin")
            $docs_administratifs = Docs_administratif::orderBy('id','asc')->paginate(10);

        else $docs_administratifs = Docs_administratif::where('user_id',Auth::user()->id)->orderBy('id','asc')->paginate(10);
//         dd($docs_administratifs);
        return view('docs_administratifs.index')->with('docs_administratifs', $docs_administratifs);
    }
    public function create()
    {
        return view('docs_administratifs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'commentaire' => 'required'
        ]);

            $docs_administratif = new Docs_administratif();
            $docs_administratif->titre = implode(',',$request->input('commentaire'));
            $docs_administratif->etat = "En attente";
            $docs_administratif->user_id=Auth::User()->id;
            $docs_administratif->save();


        return redirect('/docs_administratifs/')->with('success', 'Votre document est en cours de validaton');
    }
    //-------------------------------------------------
    public  function envoyer(Request $request){

        $doc=Docs_administratif::find($request->id);


//            $doc->fichier= $request->fichier->store('docs_administratifs','public');

        $doc->etat="Document reçue";
        $doc->date_recue=Date('y-m-d');
        $doc->save();
        return view('docs_administratifs.files.index')->with('doc',$doc);

    }
    //--------------------------------------------
    public function view_attestation_travail($id){

        $doc=Docs_administratif::find($id);
        $entreprise=Entreprise::all()->first();
    return view('docs_administratifs.files.attestation_travail')->with('doc',$doc)->with('entreprise',$entreprise);
    }
    public function view_attestation_stage($id){

        $doc=Docs_administratif::find($id);
        $entreprise=Entreprise::all()->first();
        return view('docs_administratifs.files.attestation_stage')->with('doc',$doc)->with('entreprise',$entreprise);
    }

    public function view_recue_solde_compte($id){
        $doc=Docs_administratif::find($id);
        $entreprise=Entreprise::all()->first();
        return view('docs_administratifs.files.Recu_solde_compte')->with('doc',$doc)->with('entreprise',$entreprise);
    }

    public function view_accuse_reception($id){
        $doc=Docs_administratif::find($id);
        $entreprise=Entreprise::all()->first();
        return view('docs_administratifs.files.accuse_reception')->with('doc',$doc)->with('entreprise',$entreprise);
    }
}
