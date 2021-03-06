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
        $User->tel=$request->input('tel');
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

        if ( $request->input('password') != $request->input('confirm_password')){

            $user =User::find($id);
            $roles = Role::all();
            alert()->warning('mots de passes pas identiques');
            return view('users.edit',[ 'users'=>$user],[ 'roles'=>$roles]);
        }

    	$users =User::find($id);
    	$users->name=$request->input('name');
        $users->email=$request->input('email');

        $users->removeRole($users->getRoleNames()[0]);
        $users->assignRole($request->input('role'));

        if ( $request->input('password') != "null");
            $users->password=bcrypt($request->input('password'));

        if($request->hasFile('photo'))
                $users->photo=$request->photo->store('uploads','public');
        $users->tel=$request->input('tel');

//        -------------------------------------------------------------------------------
        $users->cin=$request->input('cin'             );
        $users->cnss=$request->input('cnss'            );
        $users->polite=$request->input('polite'          );
        $users->adress=$request->input('adress'          );
        $users->exit_date=$request->input('exit_date'       );
        $users->hiring_date=$request->input('hiring_date'     );
        $users->birth_date=$request->input('birth_date'      );
        $users->order_number=$request->input('order_number'    );
        $users->professions=$request->input('professions'     );
        $users->net_salary=$request->input('net_salary'      );
        $users->gross_salary=$request->input('gross_salary'    );
        $users->family_situation=$request->input('family_situation');
        $users->nbr_children=$request->input('nbr_children'    );
//        -------------------------------------------------------------------------------
    	$users->save();

    	return redirect('/users/')->with('success', 'employee modifier dans la base de données');
    }

    public function show(User $user)
    {
//        abort_unless(\Gate::allows('user_show'), 403);

        $user->load('roles');

        return view('users.show', compact('user'));
    }
    public function destroy(Request $request,$id)
    { 
    	$users = User::find($id);

        $users->delete();

    	return redirect('/users/')->with('success', 'employee supprimer de la base de données');
    }
    //--------------------------------------------------------------
    public function view_profile($id)
    {
        $users =User::find($id);
        $roles = Role::all();
        return view('users.profile',[ 'users'=>$users],[ 'roles'=>$roles]);
    }
    //--------------------------------------------------------------
    public function updateProfile(Request $request,$id)
    {

        if ( $request->input('password') != $request->input('confirm_password')){

            $user =User::find($id);
            alert()->warning('mots de passes pas identiques');
            return view('users.profile',[ 'users'=>$user]);
        }

        $user =User::find($id);
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        if ( $request->input('password') != "null");
          $user->password=bcrypt($request->input('password'));

        if($request->hasFile('photo'))
            $user->photo=$request->photo->store('uploads','public');
        $user->tel=$request->input('tel');

        $user->save();

        return view('users.profile',[ 'users'=>$user]);
    }


}
