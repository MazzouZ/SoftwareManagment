<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Spatie\Permission\Models\Role;
use App\User;


use Auth;

class UserController extends Controller
{   public function __construct()
    {
        $this->middleware('auth');
    }




    //lister les User
    public function index()
    { $users =User::orderBy('id','asc')->paginate(5);

    	return view('users.index',['users'=>$users]);

    }
    //affiche le formulaire de creation d'un User
    public function create()
    { 

       //return view('users.create',['users'=>$users]);
        $roles = Role::all();
       return view('users.create', compact('roles'));
    }
    //enregister un User
    public function store(Request $request)
    {    $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required',
            'role' => 'required'
        ]);

    	$User = new User();
    	$User->name=$request->input('name');
        $User->email=$request->input('email');
        $User->password=bcrypt($request->input('password'));
        $User->assignRole($request->input('role'));

        if($request->hasFile('photo'))
            $User->photo=$request->photo->store('uploads','public');

    	$User->save();

    	return redirect('/users/')->with('success', 'employee ajouté à la base de données');
    }


    //permet de recuperer un User puis le mettre dans le formulaire
    public function edit($id)
    {
    	$users =User::find($id);
        $roles = Role::all();
    	return view('users.edit',[ 'users'=>$users],[ 'roles'=>$roles]);


    }
    //permet de modifier un User
    public function update(Request $request,$id)
    {    $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required',
            'role' => 'required'
        ]);

    	$users =User::find($id);
    	$users->name=$request->input('name');
        $users->email=$request->input('email');

        $users->removeRole($users->getRoleNames()[0]);
        $users->assignRole($request->input('role'));

        if ( $request->input('password') != "null");
            $users->password=bcrypt($request->input('password'));

        if($request->hasFile('photo'))
                $users->photo=$request->photo->store('uploads','public');
    	$users->save();

    	return redirect('/users/')->with('success', 'employee modifier dans la base de données');
    }
    //permet de supprimer un User
    public function destroy(Request $request,$id)
    { 
    	$users = User::find($id);

        $users->delete();

    	return redirect('/users/')->with('success', 'employee supprimer de la base de données');
    }
    
}
