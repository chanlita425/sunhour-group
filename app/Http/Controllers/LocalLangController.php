<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalLangController extends Controller
{
    public function setLocale($locale)
    {
        if (in_array($locale, ['en','kh','cn'])){
            App::setLocale($locale);
            Session::put('locale', $locale);
        }
        return redirect()->back();
    }
}
