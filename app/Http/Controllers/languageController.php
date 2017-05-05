<?php


namespace Dental\Http\Controllers;

use Dental\Http\Controllers\Controller;
use Dental\Http\Requests;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            //Session::set('applocale', $lang);
            Session::put('applocale', $lang);
        }
        return Redirect::back();
    }
}