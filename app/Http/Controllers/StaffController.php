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
        $swd = DB::table('work_days')
            ->leftJoin('staff_work_days as sd', function ($join) {
                $join->on('sd.work_days_id', '=', 'work_days.id')
                    ->where('sd.staff_id', '=', -1);
            })
            ->get();
        $arr = array('specialty' => $specialty, 'days' => $swd);

        return response()->json($arr, 201);
    }

    public function edit(Request $request)
    {
        $id = request('id');

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
//        $staff->entry_time = request('entry_time');
//        $staff->exit_time = request('exit_time');

//        $staff->work_days()->detach();
//        for ($i = 1; $i <= 7; $i++) {
//            if (request($i)) {
//                $s = WorkDays::find($i);
//                $staff->work_days()->attach($s);
//            }
//        }
        $staff->save();

        //return redirect('/staff');
        return response()->json($staff->id, 201);
    }

    static $staffid = 0;

    public function update($id)
    {
        static::$staffid = $id;
        $staff = DB::table('staff')->where('id', $id)->first();
        $specialty = DB::table('specialties')->get();

        $swd = DB::table('work_days')
            ->leftJoin('staff_work_days as sd', function ($join) {
                $join->on('sd.work_days_id', '=', 'work_days.id')
                    ->where('sd.staff_id', '=', static::$staffid);
            })->get();

        $arr = array('staff' => $staff, 'days' => $swd, 'specialty' => $specialty);

        return response()->json($arr, 201);
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
//        $staff->entry_time = request('entry_time');
//        $staff->exit_time = request('exit_time');

        $staff->save();

        // return redirect('/staff');
        return response()->json($staff->id, 201);
    }


    public function saveStaff(Request $request)
    {
        $id = request('id');
        if($id >0){//update
            $this->edit($request);

        }else{//add
            $this->create($request);
        }

    }

}
