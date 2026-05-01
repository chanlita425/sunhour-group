<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOTools;

class PartnershipController extends Controller
{
    public function index()
    {
         $locale = app()->getLocale();
        SEOTools::setTitle('Partnerships | ');
        SEOTools::setDescription('Explore all our top-quality brands including water pumps, សំភារៈប្រើនៅទីសាធារណៈ, Bath Tub Cambodia,  Water Purifier, filters, faucets, and more at SunHour Group.');
        SEOTools::opengraph()->setUrl(route('partnerships.index', ['locale' => $locale]));
        SEOTools::setCanonical(route('partnerships.index', ['locale' => $locale]));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@SunHourGroup');
        return view('frontends.partnerships.index');
    }
}
