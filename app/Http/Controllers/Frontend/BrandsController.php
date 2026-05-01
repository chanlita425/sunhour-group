<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Award;
use App\Models\Admin\DailyClean;
use App\Models\Admin\DeepClean;
use App\Models\Admin\Feature;
use App\Models\Admin\FileDownload;
use App\Models\Admin\Media;
use App\Models\Admin\ModelFunction;
use App\Models\Admin\Tecnology;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Admin\Brand;
use App\Models\Admin\Product;
use App\Models\Admin\Models;
use App\Models\Admin\Space;
use Artesaos\SEOTools\Facades\SEOTools;

class BrandsController extends Controller
{
    public function index()
    {
        $brand = Brand::all();

        // ---- English + Khmer combined title ----
        $brandNames = $brand->pluck('name')->join(', ');

        // SEO metadata
        SEOTools::setTitle(__('message.brand') . ' | ');
        SEOTools::setDescription(
            "Discover {$brandNames} Water Purifier, Bath Tub Cambodia, Water Purified ,Water Pump, Faucet Cambodia, Water Filter Cambodia,Tiles Cambodia, Building Material, Accessories Cambodia,Toto bathroom, Water Filter Cambodia, Heat Pump, Toto faucet, Water Dispenser Cambodia, Water Machine Cambodia,Toto faucet,Heat Pump,Water Dispenser Cambodia,Water Filter Cambodia, Water Heating System, Bathroom Equipment in Cambodia’s high-quality water heating systems. From energy-saving heat pumps and solar water solutions to home shower units and storage water heaters, we have the perfect hot water solution for every home."
        );
        // Canonical & Social Meta
        $locale = app()->getLocale();
        SEOTools::opengraph()->setUrl(route('brands.all', ['locale' => $locale]));
        SEOTools::metatags()->setKeywords(config('seotools.meta.defaults.keywords'));
        SEOTools::setCanonical(route('brands.all', ['locale' => $locale]));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@SunHourGroup');

        return view('frontends.brands.index', compact('brand'));
    }



    public function show($brand)
    {
        // Get the brand by slug
        $brands = Brand::where('slug', $brand)->firstOrFail();

        // Get all products for this brand
        $product = Product::where('brand_id', $brands->uuid)->get();

        // Extract all product images for Open Graph
        $images = $product->pluck('link')->filter()->toArray();

        //  Dynamic SEO
        // $title = $brands->name . " Cambodia | " . __('message.product') . " - ";
        $title =  __('message.product') . " - ";
        $description = $brands->description ?? "Discover {$brands->name}, Bath Tub Cambodia, Water Purifier, Faucet Cambodia, Water Purified ,Water Pump, Water Filter Cambodia,Tiles Cambodia, Building Material, Accessories Cambodia,Toto bathroom, Water Filter Cambodia, Heat Pump, Toto faucet, Water Dispenser Cambodia, Water Machine Cambodia,Toto faucet,Heat Pump,Water Dispenser Cambodia, Water Filter Cambodia, Bathroom Equipment, Water Heating System in Cambodia’s high-quality water heating systems. From energy-saving heat pumps and solar water solutions to home shower units and storage water heaters, we have the perfect hot water solution for every home.";
         $locale = app()->getLocale();
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::opengraph()->setUrl(route('brands-client.show', [$brands->slug, 'locale' => $locale]));
        SEOTools::setCanonical(route('brands-client.show', [$brands->slug,'locale' => $locale]));
        SEOTools::opengraph()->addImages($images); // optional Open Graph images
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@SunHourGroup');

        return view('frontends.brands.show', compact('brands', 'product'));
    }

    // public function category($brand, $product)
    // {
    //     $brands = Brand::query()->where('slug', $brand)->first();
    //     $products = Product::query()->where('slug', $product)->first();
    //     $category = Category::query()->where('product_id', $products->uuid)->get();


    //     // ✅ Extract all images
    //     $images = $category->pluck('link')->filter()->map(function ($link) {
    //         return ($link); // adjust if needed
    //     })->toArray();

    //     return view('frontends.details', compact('products', 'brands', 'category'));
    // }

    public function category($brand, $product)
    {
        // Get the brand and product
        $brands = Brand::where('slug', $brand)->firstOrFail();
        $products = Product::where('slug', $product)
            ->where('brand_id', $brands->uuid)
            ->firstOrFail();

        // Get categories for this product
        $category = Category::where('product_id', $products->uuid)->get();

        // Extract all images for Open Graph
        $images = $category->pluck('link')->filter()->toArray();

        // ✅ Dynamic SEO
        //     $title = "{$brands->name} Cambodia | "
        //    . (session()->get('locale') == 'en' ? $products->name : $products->name_khmer)
        //    . " - ";

            $title = (session()->get('locale') == 'en' ? $products->name : $products->name_khmer) . " - ";

        $description = $products->description ?? "{$brands->name} Cambodia offers premium {$products->name}, Bathroom Equipment, Bath Tub Cambodia, Faucet Cambodia, Water Purifier, Water Purified ,Water Pump, Water Filter Cambodia,Tiles Cambodia, Building Material, Accessories Cambodia, Toto bathroom, Water Filter Cambodia, Heat Pump, Toto faucet, Water Dispenser Cambodia, Water Machine Cambodia, Toto faucet, Heat Pump, Water Dispenser Cambodia, Bathroom Equipment, Water Filter Cambodia, Water Heating System water machines, សំភារៈប្រើនៅទីសាធារណៈ,and safe hydration solutions in Phnom Penh.";
        $locale = app()->getLocale();
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::opengraph()->setUrl(route('category.show', [$brand, $product, 'locale' => $locale]));
        SEOTools::setCanonical(route('category.show', [$brand, $product, 'locale' => $locale]));
        SEOTools::opengraph()->addImages($images); // optional Open Graph images
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@SunHourGroup');

        return view('frontends.details', compact('brands', 'products', 'category'));
    }



    // public function model($brand, $product)
    // {

    //     $brands = Brand::where('slug', $brand)->firstOrFail();
    //     $category = Category::where('slug', $product)->first();
    //     $products = $category
    //         ? $category
    //         : Product::where('slug', $product)->firstOrFail();

    //     $query = Models::query()->where('product_id', $products->uuid);
    //     $model = $query->get();

    //     // ✅ Extract all images from $model->link
    //     $images = $model->pluck('link')->filter()->map(function ($link) {
    //         return ($link); // adjust if needed
    //     })->toArray();

    //     return view('frontends.brands.ModelClient.index', compact('products', 'brands', 'model', 'category'));
    // }

    public function model($brand, $product)
    {
        // Get the brand
        $brands = Brand::where('slug', $brand)->firstOrFail();

        // Get the category or product
        $category = Category::where('slug', $product)->first(); 
        $products = $category
            ? $category
            : Product::where('slug', $product)->firstOrFail();

        // Get all models for this product
        $model = Models::where('product_id', $products->uuid)->get();

        // Extract all images from models
        $images = $model->pluck('link')->filter()->toArray();

        // ✅ Dynamic SEO
        // $title = "{$brands->name} Cambodia | "
        //     . (session()->get('locale') == 'en' ? $products->name : $products->name_khmer)
        //     . " - ";

        $title = (session()->get('locale') == 'en' ? $products->name : $products->name_khmer) . " - ";
        $description = $products->description ?? "{$brands->name} Cambodia offers premium {$products->name}, Bath Tub Cambodia, សំភារៈប្រើនៅទីសាធារណៈ,Faucet Cambodia, Water Purifier, Water Purified ,Water Pump, Water Filter Cambodia,Tiles Cambodia, Building Material, Accessories Cambodia,Toto bathroom, Water Filter Cambodia, Heat Pump, Toto faucet, Water Dispenser Cambodia, Water Machine Cambodia,Toto faucet, Heat Pump, Bathroom Equipment, Water Dispenser Cambodia, Water Filter Cambodia, Water Heating System and safe hydration solutions in Phnom Penh.";
        $locale = app()->getLocale();
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::opengraph()->setUrl(route('brands-client.model', [$brand, $product, 'locale' => $locale]));
        SEOTools::setCanonical(route('brands-client.model', [$brand, $product, 'locale' => $locale]));
        SEOTools::opengraph()->addImages($images); // optional Open Graph images
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@SunHourGroup');

        return view('frontends.brands.ModelClient.index', compact('products', 'brands', 'model', 'category'));
    }

    // public function model_category($brand, $product, $categories)
    // {

    //     $brands = Brand::where('slug', $brand)->firstOrFail();
    //     $category = Category::where('slug', $categories)->first();
    //     $products = $category
    //         ? $category
    //         : Product::where('slug', $product)->firstOrFail();

    //     $query = Models::query()
    //         ->where('category_id', $category->uuid);
    //     $model = $query->get();

    //     // ✅ Extract all images from $model->link
    //     $images = $model->pluck('link')->filter()->map(function ($link) {
    //         return ($link); // adjust if needed
    //     })->toArray();

    //     return view('frontends.brands.ModelClient.index', compact('products', 'categories', 'brands', 'model', 'category'));
    // }


    public function model_category($brand, $product, $categories)
    {
        // Get the brand
        $brands = Brand::where('slug', $brand)->firstOrFail();

        // Get the category
        $category = Category::where('slug', $categories)->firstOrFail();

        // Determine the product (either from category or fallback)
        $products = $category
            ? $category
            : Product::where('slug', $product)->firstOrFail();

        // Get all models for this category
        $model = Models::where('category_id', $category->uuid)->get();

        // Extract images from models for Open Graph
        $images = $model->pluck('link')->filter()->toArray();

        // ✅ Dynamic SEO
        // $title = "{$brands->name} Camobodia | {$category->name} Models | {$products->name} | - ";
        $title = "{$category->name} Models | {$products->name} | - ";
        $description = $category->description ?? "Explore all models in {$category->name} for {$products->name} by {$brands->name} ,សំភារៈប្រើនៅទីសាធារណៈ, Bath Tub Cambodia, Water Purifier, Water Purified ,Water Pump, Water Filter Cambodia,Tiles Cambodia, Building Material, Accessories Cambodia,Toto bathroom, Water Filter Cambodia, Heat Pump, Toto faucet, Water Dispenser Cambodia, Water Machine Cambodia, Bathroom Equipment, Toto faucet,Heat Pump,Water Dispenser Cambodia,Water Filter Cambodia, Water Heating System at Sun Hour Group.";
        $locale = app()->getLocale();
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::opengraph()->setUrl(route('brands-client.model_category', [$brand, $products, $categories, 'locale' => $locale]));
        SEOTools::setCanonical(route('brands-client.model_category', [$brand, $products, $categories, 'locale' => $locale]));
        SEOTools::opengraph()->addImages($images);
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@SunHourGroup');

        return view('frontends.brands.ModelClient.index', compact('products', 'category', 'brands', 'model'));
    }

    public function model_details($brand, $products, $model)
    {
        $category = Category::query()->where('slug', $products)->first();

        if (!$category) {
            $product = Product::query()->where('slug', $products)->first();

            if (!$product) {
                abort(404, 'Product not found.');
            }
            $category = Category::query()->where('product_id', $product->uuid)->first();
        }


        $models = Models::query()
            ->where('uuid', $model)
            // ->where('slug', $products)
            // ->first();
            ->firstOrFail(); // Use firstOrFail for a clear 404 if not found


        $functions = ModelFunction::query()->where('model_id', $models->uuid)
            ->get();
        $tech = Tecnology::query()->get();
        $fileDownloads = FileDownload::query()->where('model_id', $models->uuid)
            ->get();
        $awards = Award::query()->where('model_id', $models->uuid)
            ->get();
        $medias = Media::query()->where('model_id', $models->uuid)->first();
        $features = Feature::query()->where('model_id', $models->uuid)
            ->get();
        $spaces = Space::query()
            ->where('model_id', $models->uuid)
            ->get();
        $daily = DailyClean::query()->where('model_id', $models->uuid)->first();
        $deep = DeepClean::query()->where('model_id', $models->uuid)->first();
        return view('frontends.brands.ModelClient.ModelDetail.index', compact('models', 'brand', 'functions', 'daily', 'deep', 'spaces', 'fileDownloads', 'medias', 'features', 'tech', 'awards'));
    }
}
