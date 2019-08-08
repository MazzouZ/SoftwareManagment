<?php

namespace App\Http\Controllers;

use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class roleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //        Role::create(['name' => 'Admin']);
        //        Role::create(['name' => 'Employee']);
        //        Role::create(['name' => 'Guest']);

        //          Permission::create(['name' => 'access_conge']);
        //          Permission::create(['name' => 'Demander_conge']);
        //          Permission::create(['name' => 'Modifier_conge']);
        //          Permission::create(['name' => 'Supprimer_conge']);
        //          Permission::create(['name' => 'access_user_mangement']);

        //Permission::create(['name' => 'access_free_day']);
//        Permission::create(['name' => 'access_entreprise']);
//        Permission::create(['name' => 'access_pointage']);
//        Permission::create(['name' => 'access_report']);
//        Permission::create(['name' => 'access_report_conge']);
//        Permission::create(['name' => 'access_status_salaire']);
//        Permission::create(['name' => 'import_pointage_data']);

        //          Permission::create(['name' => 'access_docs_administratifs']);
        //          Permission::create(['name' => 'Demander_docs_administratif']);

//                    Permission::create(['name' => 'Modifier_free_day']);
//                    Permission::create(['name' => 'Supprimer_free_day']);
//                    Permission::create(['name' => 'Ajouter_free_day']);


//                $employee_role=Role::findByName('Employee');
//                $Admin_role=Role::findByName('Admin');
        //        $guest_role=Role::findByName('Guest');
        //
        //
//                $Permissions=Permission::all();
        //        $access_permission=Permission::findByName('access_conge');
        //        $create_permission=Permission::findByName('Demander_conge');
        //        $modify_permission=Permission::findByName('Modifier_conge');
        //
//                 $Admin_role->syncPermissions($Permissions);
        //
        //        $employee_role->givePermissionTo($access_permission);
        //        $employee_role->givePermissionTo($create_permission);
        //        $employee_role->givePermissionTo($modify_permission);

//        $employee_role->givePermissionTo('access_docs_administratifs');
//        $employee_role->givePermissionTo('Demander_docs_administratif');

        $roles = Role::orderBy('id','asc')->paginate(5);
        // dd($roles);
        return view('roles.index')->with('roles', $roles);
    }



    public function create()
    {
        $permissions=Permission::all();
        return view('roles.create')->with('permissions',$permissions);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'role_name' => 'required',
        //  'permissions' => 'required',
            // 'justification' => 'required'
        ]);

        $role=new Role();
        $role=Role::create(['name' => $request->input('role_name')]);

        $perm=$request->input('permissions', []);
        if(isset($perm))
            $role->permissions()->sync($request->input('permissions', []));

//        $role->syncPermissions($request->input('permissions'));
        $role->save();

        return redirect('/roles/')->with('success', 'Votre role est ajouter avec succes');
    }
//    ----------------------------------------------------------------------------
    public function edit($id)
    {
        $role =Role::find($id);
        $permissions = Permission::all();
        return view('roles.edit',[ 'permissions'=>$permissions],[ 'role'=>$role]);


    }
    //-----------------------------------------------------
    public function update(Request $request,$id)
    {    $this->validate($request, [
        'role_name' => 'required',
    ]);
          $role =Role::find($id);
//            dd($role->permissions);

        $role->name=$request->input('role_name');
        $role->revokePermissionTo($role->permissions);
        $role->permissions()->sync($request->input('permissions', []));

        return redirect('/roles/')->with('success', 'Role modifier ');
    }
//---------------------------------------------------------------------------
    public function destroy($id)
    {
        role::find($id)->delete();

        return redirect('/roles/')->with('success', 'Votre role est Supprimer avec succèes');
    }
}
