<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use App\StaffWorkDays;
use App\WorkDays;
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
            ->join('staff_work_days', 'staff.id', '=', 'staff_work_days.staff_id')
            ->join('work_days', 'work_days.id', '=', 'staff_work_days.work_day_id')
            ->select(DB::raw('group_concat(work_days.en_value separator ", ") as en_days,group_concat(work_days.ar_value separator ", ") as ar_days,staff.*'))
            ->groupBy('staff.id')
            ->orderBy('name', 'asc')->offset(0)->limit(10)->get();
        return view('staff.index', compact('staff'));
    }

    public function add()
    {
        $specialty = DB::table('specialties')->get();
        $days = DB::table('work_days')->get();
        $arr = array('specialty' => $specialty, 'days' => $days);

        return view('staff.add', $arr);
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

        $staff = Staff::with('work_days')->find($id);

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
        $staff->work_days()->detach();

        $s = new WorkDays();
        $s->id = 7;
        $staff->work_days()->attach($s);

        return redirect('/staff');
    }

    public function update($id)
    {
        $staff = DB::table('staff')->where('id', $id)->first();
        $specialty = DB::table('specialties')->get();
        $swd = DB::table('staff_work_days')->where('staff_id', $id)->pluck('work_day_id');

        $days = DB::table('work_days')->get();

        $arr = array('staff' => $staff, 'swd' => $swd, 'specialty' => $specialty, 'days' => $days);

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
            'salary' => ['required'],

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

    public function fillData()
    {
        factory(Staff::class, 100)->create();
//        factory(WorkDays::class, 7)->create();
        factory(StaffWorkDays::class, 100)->create();
    }
}
