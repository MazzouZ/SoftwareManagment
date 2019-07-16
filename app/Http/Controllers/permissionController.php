<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class permissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $permissions = Permission::orderBy('id','asc')->paginate(5);
        // dd($permissions);
        return view('permissions.index')->with('permissions', $permissions);
    }
}
