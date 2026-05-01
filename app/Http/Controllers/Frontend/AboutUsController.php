<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function index()
    {
        $locale = app()->getLocale();
        SEOTools::setTitle('About Us | ');
        SEOTools::setDescription('Explore all our top-quality brands including water pumps, សំភារៈប្រើនៅទីសាធារណៈ, filters, Bath Tub Cambodia, Solar Water Heater, ការ៉ូ, ក្បាលរូមីណេ,faucets, and more at SunHour Group.');
        SEOTools::opengraph()->setUrl(route('about-us', ['locale' => $locale]));
        SEOTools::setCanonical(route('about-us', ['locale' => $locale]));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@SunHourGroup');
        return view('frontends.about-us');
    }
}
