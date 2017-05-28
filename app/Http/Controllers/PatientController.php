<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use Illuminate\Support\Facades\DB;
use App\Corporation;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $patients = DB::table('patient')
            ->leftJoin('corporation', 'corporation.id', '=', 'patient.corporation_id')
            ->select(DB::raw(' corporation.name as corporation_name  ,patient.*'))
            ->orderBy('name', 'asc')->get();

        return response()->json($patients, 201);
        // return view('patient.index', array('patients' => $arr));
    }

    public function add()
    {
        $corp = DB::table('corporation')->get();

        return response()->json($corp, 201);
        //return view('patient.add');
    }

    public function update($id)
    {
        $patient = DB::table('patient')->where('id', $id)->first();
        //$arr = array('patient' => $patient);

        return response()->json($patient, 201);
        // return view('patient.edit');
    }

    public function destroy($id)
    {
        return redirect('/patient');
    }

    public function savePatient(Request $request)
    {

    }


}
