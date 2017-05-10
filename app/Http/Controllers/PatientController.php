<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('patient.index');
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
