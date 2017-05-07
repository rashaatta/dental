<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Staff;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $staff = DB::table('staff')->orderBy('name', 'asc')->offset(0)->limit(10)
            ->get();

        return view('staff.index', compact('staff'));
    }

    public function edit($id)
    {
        DB::table('staff')->where('id', $id)->update(
            ['name' => request('name'),
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
//        dd($staff);
        return view('staff.edit', compact('staff'));
    }
}
