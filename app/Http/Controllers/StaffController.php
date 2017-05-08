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
        $staff = DB::table('staff')->orderBy('name', 'asc')->offset(0)->limit(10)->get();
        return view('staff.index', compact('staff'));
    }

    public function add()
    {
        return view('staff.add');
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'max:255', Rule::unique('staff')->ignore($id)],
            'mobile' => ['required', 'max:150', Rule::unique('staff')->ignore($id)],
            'specialty' => ['required', 'max:150',],
            'salary' => ['required',],
            'address' => ['required', 'max:300',],
        ]);

        DB::table('staff')->where('id', $id)->update([
            'name' => request('name'),
            'mobile' => request('mobile'),
            'telephone' => request('telephone'),
            'specialty' => request('specialty'),
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

        //$wd = DB::table('work_days')->where('staff_id', $id)->get();
        // $arr = array('staff' => $staff, 'wd' => $wd);

        return view('staff.edit', compact('staff'));
        // return view('staff.edit', $arr);
    }

    public function delete($id)
    {
        DB::table('staff')->where('id', $id)->delete();
        return redirect('/staff');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:255', 'unique:staff'],
            'mobile' => ['required', 'max:150', 'unique:staff'],
            'specialty' => ['required', 'max:150',],
            'salary' => ['required',],
            'address' => ['required', 'max:300',],
        ]);

        $staff = new Staff();
        $staff->name = request('name');
        $staff->mobile = request('mobile');
        $staff->telephone = request('telephone');
        $staff->specialty = request('specialty');
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
