<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FAQs;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class FAQsFController extends Controller
{
    public function faqs(){
        // Fetch all records, ordered by creation date or a custom order field
        $faqs = FAQs::orderBy('created_at')->get();

        SEOTools::setTitle("Faqs" . ' | ');
        SEOTools::setDescription(
            "Discover Water Purifier, Bath Tub Cambodia, Water Purified ,Water Pump, Faucet Cambodia, Water Filter Cambodia,Tiles Cambodia, Building Material, Accessories Cambodia,Toto bathroom, Water Filter Cambodia, Heat Pump, Toto faucet, Water Dispenser Cambodia, Water Machine Cambodia,Toto faucet,Heat Pump,Water Dispenser Cambodia,Water Filter Cambodia, Water Heating System, Bathroom Equipment, ការ៉ូ, ក្បាលរូមីណេ, ម៉ូទ័របូមទឹក, បង្គន់អនាម័យ, ម៉ាសុីនទឹកក្តៅទឹកត្រជាក់ in Cambodia’s high-quality water heating systems. From energy-saving heat pumps and solar water solutions to home shower units and storage water heaters, we have the perfect hot water solution for every home."
        );
        $locale = app()->getLocale();
        SEOTools::opengraph()->setUrl(route('brands.all', ['locale' => $locale]));
        SEOTools::metatags()->setKeywords(config('seotools.meta.defaults.keywords'));
        SEOTools::setCanonical(route('brands.all', ['locale' => $locale]));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@SunHourGroup');
        return view('frontends.FAQs.index',compact('faqs'));
    }
}
