<?php

namespace App\Http\Controllers;

use App\Specialty;
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
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $staff = DB::table('staff')
            ->leftJoin('staff_work_days', 'staff.id', '=', 'staff_work_days.staff_id')
            ->leftJoin('work_days', 'work_days.id', '=', 'staff_work_days.work_days_id')
            ->join('specialties', 'staff.specialty_id', '=', 'specialties.id')
            ->select(DB::raw('group_concat(work_days.en_value separator ", ") as en_days,
                group_concat(work_days.ar_value separator ", ") as ar_days,
                specialties.en_value as en_specialty, specialties.ar_value as ar_specialty  ,staff.*'))
            ->groupBy('staff.id')
            ->orderBy('name', 'asc')->get();

        return response()->json($staff, 201);
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
            'salary' => ['required',],
            'specialty_id' => ['required', 'max:150',],

        ]);

        $staff = Staff::find($id);

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
        for ($i = 1; $i <= 7; $i++) {
            if (request($i)) {
                $s = WorkDays::find($i);
                $staff->work_days()->attach($s);
            }
        }
        $staff->save();

        return redirect('/staff');
    }

    public function update($id)
    {
        $staff = DB::table('staff')->where('id', $id)->first();
        $specialty = DB::table('specialties')->get();
        $swd = DB::table('staff_work_days')->where('staff_id', $id)->pluck('work_days_id');

        $days = DB::table('work_days')->get();

        $arr = array('staff' => $staff, 'swd' => $swd, 'specialty' => $specialty, 'days' => $days);

        return view('staff.edit', $arr);
    }

    public function destroy()
    {
        DB::table('staff')->where('id', request('doctor-delete-id'))->delete();
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
        factory(Specialty::class, 10)->create();
//        factory(Staff::class, 100)->create();
//        for ($i = 0; $i < 7; $i++)
//            factory(WorkDays::class)->create();

        factory(StaffWorkDays::class, 100)->create();
    }
}
