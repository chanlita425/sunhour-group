<?php

namespace App\Http\Controllers;

use App\Models\Admin\Brand;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function HomePage(){
        $brand = Brand::all();

        $brandNames = $brand->pluck('name')->join(', ');

        // SEO metadata
        SEOTools::setTitle(__('message.brand') . ' | ');
        SEOTools::setDescription(
            "Buy high quality water heater, storage water heater, water pump and water filter in Cambodia. Best price with installation service."
        );
        // Canonical & Social Meta
        SEOTools::opengraph()->setUrl(route('brands.all', ['locale' => app()->getLocale()]));
        SEOTools::metatags()->setKeywords(config('seotools.meta.defaults.keywords'));
        SEOTools::setCanonical(
        route('brands.all', ['locale' => app()->getLocale()])
        );
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@SunHourGroup');
            return view('frontends.home', compact('brand'));
    }
}
