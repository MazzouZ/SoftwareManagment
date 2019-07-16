<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Free_day;
use Illuminate\Support\Facades\Auth;

class free_daysController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $free_days=Free_day::orderBy('id','asc')->paginate(5);
        return view('free_days.index')->with('free_days', $free_days);
    }
//----------------------------------------------------------------------------
    public function create()
    {
        return view('free_days.create');
    }
//    ----------------------------------------------------------------------------------------------------------------

    public function store(Request $request)
    {
        $this->validate($request, [
            'day' => 'required',
            'description' => 'required'
        ]);
            $free_day = new Free_day();
            $free_day->day = $request->input('day');
            $free_day->description = $request->input('description');
            $free_day->save();

        return redirect('/free_days/');
    }
//-------------------------------------------------------------------------------
    public function edit($id)
    {
        $free_day = Free_day::find($id);
        return view('free_days.edit', ['free_day' => $free_day]);
    }
//---------------------------------------------------------------------------
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'day' => 'required',
            'description' => 'required'
        ]);
            $free_day=Free_day::find($id);
            $free_day->day = $request->input('day');
            $free_day->description = $request->input('description');
            $free_day->save();

        return redirect('/free_days/');

    }
//    ---------------------------------------------------------------------------------------
    public function destroy($id)
    {
        Free_day::find($id)->delete();
        return redirect('/free_days/');
    }
}
