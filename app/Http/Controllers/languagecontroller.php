<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class languagecontroller extends Controller
{
    public function changelanguage($langcode){

        App::setLocale($langcode);
        Session::put("lang_code", $langcode);
        return redirect()->back();
    }

}
