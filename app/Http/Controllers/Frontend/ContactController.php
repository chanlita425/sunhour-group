<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOTools;

class ContactController extends Controller
{
    public function index()
    {
         $locale = app()->getLocale();
        SEOTools::setTitle('Contact Us | ');
        SEOTools::setDescription('Explore all our top-quality brands including water pumps, សំភារៈប្រើនៅទីសាធារណៈ, Water Purifier, filters, faucets, and more at SunHour Group.');
        SEOTools::opengraph()->setUrl(route('contact.index', ['locale' => $locale]));
        SEOTools::setCanonical(route('contact.index', ['locale' => $locale]));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@SunHourGroup');
        
        return view('frontends.contact.index');
    }
}
