<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
        //return view('welcome');
    }

    public function auth(Request $request)
    {

        $credentials = [
            'name' => $request->input('username'),
            'password' => $request->input('password')
        ];

        $remember = $request->input('remember');

        if (!Auth::attempt($credentials, $remember)) {
            return response()->json("Username and password doesn't match", 403);
        }

        return response()->json(Auth::user(), 201);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json(['success' => true], 201);
    }

}
