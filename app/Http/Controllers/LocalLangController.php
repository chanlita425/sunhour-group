<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalLangController extends Controller
{
//     public function setLocale($locale)
//     {
//         if (in_array($locale, ['en','kh','cn'])){
//             App::setLocale($locale);
//             Session::put('locale', $locale);
//         }
//         return redirect()->back(); 
//     }
     public function setLocale($locale)
    {
       if (!in_array($locale, ['en', 'km', 'cn'])) {
            abort(404);
        } 

        session(['locale' => $locale]);
   
        // Chinese → fallback URL language
        // if ($locale === 'cn') {
        //     $fallbackLocale = 'en'; // or 'km'
        //     return redirect()->to('/' . $fallbackLocale);
        // }

        return redirect()->back();
    }
}
