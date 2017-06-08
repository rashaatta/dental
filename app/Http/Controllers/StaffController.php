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
            ->orderBy('name', 'asc')->limit(20)->get();

        return $staff;
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

        return $arr;
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
        // $staff->entry_time = request('entry_time');
        // $staff->exit_time = request('exit_time');

//        $staff->work_days()->detach();
//        for ($i = 1; $i <= 7; $i++) {
//            if (request($i)) {
//                $s = WorkDays::find($i);
//                $staff->work_days()->attach($s);
//            }
//        }
        $staff->save();

        return redirect('/staff');
    }

    static $staffid = 0;

    public function update($id)
    {
        static::$staffid = $id;
        $staff = DB::table('staff')->where('id', $id)->first();
        $swd = DB::table('work_days')
            ->leftJoin('staff_work_days as sd', function ($join) {
                $join->on('sd.work_days_id', '=', 'work_days.id')
                    ->where('sd.staff_id', '=', static::$staffid);
            })->select(DB::raw('work_days.id,work_days.en_value,work_days.ar_value, work_days_id, TIME_FORMAT(entry_time, "%h:%m %p") as entry_time, TIME_FORMAT(exit_time, "%h:%m %p") as exit_time'))
            ->orderBy('id', 'asc')
            ->get();

        $arr = array('staff' => $staff, 'days' => $swd);

        return $arr;
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
        //$staff->entry_time = request('entry_time');
        // $staff->exit_time = request('exit_time');

        $staff->save();


        return redirect('/staff');
    }

    public function saveStaff(Request $request)
    {

        $checkedboxes = $request->input('boxes');

        $staff = $request->input('staff');
        if ($staff['id'] != '') { // update existing staff
            $mystaff = Staff::find($staff['id']);
            $mystaff->name = $staff['name'];
            $mystaff->mobile = $staff['mobile'];
            $mystaff->telephone = $staff['telephone'];
            $mystaff->specialty_id = $staff['specialty_id'];
            $mystaff->salary = $staff['salary'];
            $mystaff->percent = $staff['percent'];
            $mystaff->session_duration = $staff['session_duration'];
            $mystaff->address = $staff['address'];
            $mystaff->user_id = $staff['user_id'];

            $mystaff->save();

            DB::table('staff_work_days')->where('staff_id', '=', $staff['id'])->delete();

            $wrkdays = $request->input('work-days');
//            var_dump($checkedboxes);
//            exit(0);
            for ($i = 0; $i < 7; $i++) {// 7 days
                if ($checkedboxes[$i+1] == 'true') {// $checkedboxes has 8 elements
                    $wd = new StaffWorkDays();
                    $wd->staff_id = $staff['id'];
                    $wd->work_days_id = $wrkdays[$i]['id'];
                    $wd->entry_time = $this->getFormattedTime($wrkdays[$i]['entry_time']);

                    $wd->exit_time = $this->getFormattedTime($wrkdays[$i]['exit_time']);
                    $wd->save();
                }
            }

        }

        return (['success' => true]);
    }

    private function getFormattedTime($time)
    {
        $h = substr($time, 0, 2);
        $m = substr($time, 3, 2);
        $a = substr($time, 6, 2);
        if ($a === 'PM' and $h !== '12'){
            $h = (int)$h;
            $h += 12;
        }
        return strftime('%H:%M:%S', mktime($h, $m, 0));
    }

}
