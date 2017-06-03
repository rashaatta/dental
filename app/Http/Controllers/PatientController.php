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
            ->join('corporation', 'corporation.id', '=', 'patient.corporation_id')
            ->select(DB::raw(' corporation.en_name as corporation_enname,corporation.ar_name as corporation_arname  ,patient.*'))
            ->orderBy('name', 'asc')->get();

        return response()->json($patients, 201);
        // return view('patient.index', array('patients' => $arr));
    }

    public function add()
    {
        $corps = DB::table('corporation')->get();

        return $corps;
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
        $id = request('id');
        if ($id > 0) {//update
            $this->edit($request);

        } else {//add
            $this->create($request);
        }

    }


}
