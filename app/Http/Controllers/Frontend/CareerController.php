<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOTools;

class CareerController extends Controller
{
    public function index()
    {
         $locale = app()->getLocale();
        SEOTools::setTitle('Career | ');
        SEOTools::setDescription('Explore all our top-quality brands including water pumps, ម៉ាសុីនទឹកក្តៅទឹកត្រជាក់, ម៉ូទ័របូមទឹក, Water Purifier, filters, faucets, and more at SunHour Group.');
        SEOTools::opengraph()->setUrl(route('career.index', ['locale' => $locale]));
        SEOTools::setCanonical(route('career.index',['locale' => $locale]));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@SunHourGroup');
        return view('frontends.career.index');
    }
}
