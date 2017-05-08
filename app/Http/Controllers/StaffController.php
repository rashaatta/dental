<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Staff;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $staff = DB::table('staff')
            ->join('work_days', 'staff.id', '=', 'work_days.staff_id')
            ->select(DB::raw('group_concat(work_days.day_name separator ", ") as days,staff.*'))
            ->groupBy('staff.id')
            ->orderBy('name', 'asc')->offset(0)->limit(10)->get();
        return view('staff.index', compact('staff'));
    }

    public function add()
    {
        $specialty = DB::table('specialties')->get();
        return view('staff.add', compact('specialty'));
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'max:255', Rule::unique('staff')->ignore($id)],
            'address' => ['required', 'max:300',],
            'mobile' => ['required', 'max:150', Rule::unique('staff')->ignore($id)],
            'specialty_id' => ['required', 'max:150',],
            'salary' => ['required',],

        ]);

        DB::table('staff')->where('id', $id)->update([
            'name' => request('name'),
            'mobile' => request('mobile'),
            'telephone' => request('telephone'),
            'specialty_id' => request('specialty_id'),
            'salary' => request('salary'),
            'percent' => request('percent'),
            'session_duration' => request('session_duration'),
            'address' => request('address'),
            'entry_time' => request('entry_time'),
            'exit_time' => request('exit_time')
        ]);

        return redirect('/staff');
    }

    public function update($id)
    {
        $staff = DB::table('staff')->where('id', $id)->first();
        $specialty = DB::table('specialties')->get();

        $arr = array('staff' => $staff, 'specialty' => $specialty);

        //$wd = DB::table('work_days')->where('staff_id', $id)->get();
        // $arr = array('staff' => $staff, 'wd' => $wd);

        //return view('staff.edit', compact('staff'));
         return view('staff.edit', $arr);
    }


    public function destroy($id)
    {
        DB::table('staff')->where('id', $id)->delete();
        return redirect('/staff');
    }


    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:255', 'unique:staff'],
            'address' => ['required', 'max:300'],
            'mobile' => ['required', 'max:150', 'unique:staff'],
            'specialty_id' => ['required', 'max:150'],
            'salary' => ['required','max:10'],

        ]);

        $staff = new Staff();
        $staff->name = request('name');
        $staff->mobile = request('mobile');
        $staff->telephone = request('telephone');
        $staff->specialty_id = request('specialty_id');
        $staff->salary = request('salary');
        $staff->percent = request('percent');
        $staff->session_duration = request('session_duration');
        $staff->address = request('address');
        $staff->entry_time = request('entry_time');
        $staff->exit_time = request('exit_time');
        $staff->save();

        return redirect('/staff');
    }


}
