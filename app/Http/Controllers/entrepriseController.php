<?php

namespace App\Http\Controllers;

use App\Entreprise;
use Illuminate\Http\Request;

class entrepriseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return $this->edit(1);
    }
//----------------------------------------------------------------------------
    public function edit($id)
    {
        $E=Entreprise::find(1);
        return view('Entreprise.index')->with('E', $E);
    }
//---------------------------------------------------------------------------
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'logo' => 'required',
            'raison_sociale' => 'required',
            'tel' => 'required',
            'email' => 'required | email'

        ]);
        $E=Entreprise::find($id);

        if($request->hasFile('logo'))
            $E->logo=$request->logo->store('entreprise_logo','public');

        $E->raison_sociale = $request->input('raison_sociale');
        $E->tel = $request->input('tel');
        $E->email = $request->input('email');
        $E->save();

        return $this->index();

    }
    //-----------------------------------------

}
