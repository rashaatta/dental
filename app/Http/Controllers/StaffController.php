<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Staff;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    //


    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $staff = DB::table('staff')->orderBy('name', 'asc')->offset(0)->limit(10)
        ->get();

        return view('staff.index', compact('staff'));
    }
}
