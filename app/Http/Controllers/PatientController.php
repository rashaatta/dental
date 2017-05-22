<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $arr = DB::table('patient')
            ->leftJoin('corporation', 'corporation.id', '=', 'patient.corporation_id')
            ->select(DB::raw(' corporation.name as corporation_name  ,patient.*'))
            ->orderBy('name', 'asc')->get();


        //->get();

        return view('patient.index', array('patients' => $arr));
    }

    public function add()
    {
        return view('patient.add');
    }

    public function update($id)
    {
        return view('patient.edit');
    }

    public function destroy($id)
    {
        return redirect('/patient');
    }
}
