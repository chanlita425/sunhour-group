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
        $brand = Brand::get();
        // SEO metadata for listing page (not a single brand)
        SEOTools::setTitle('Brands');
        SEOTools::setDescription('Explore all our top-quality brands including water pumps, filters, faucets, and more at SunHour Group.');
        SEOTools::opengraph()->setUrl(route('brands.all'));
        SEOTools::setCanonical(route('brands.all'));
        // SEOTools::metatags()->addMeta('keywords', 'brands, water pump, faucet, heat pump, SunHour Group');
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@SunHourGroup');
        // SEOTools::opengraph()->addImage("https://www.toto.com/en/neorestcollections/images/p_mainv_sp.jpg", ['height' => 630, 'width' => 1200]);
        // SEOTools::jsonLd()->addImage("https://www.toto.com/en/neorestcollections/images/p_mainv_sp.jpg", ['height' => 630, 'width' => 1200]);
        // SEOTools::twitter()->addImage("https://www.toto.com/en/neorestcollections/images/p_mainv_sp.jpg", ['height' => 630, 'width' => 1200]);

        return view('frontends.brands.index', compact('brand'));
    }

    public function show($brand)
    {
        $brands = Brand::query()->where('slug', $brand)->firstOrFail();
        $product = Product::query()
            ->where('brand_id', $brands->uuid)
            ->get();
        // ✅ Extract all images from $model->link
        $images = $product->pluck('link')->filter()->map(function ($link) {
            return ($link); // adjust if needed
        })->toArray();


        // Set SEO meta tags
        // SEOTools::setTitle($brands->name);
        // SEOTools::setDescription('Explore all products under ' . $brands->name . ' brand, including water pumps, filters, faucets, and more at SunHour Group.');
        // SEOTools::opengraph()->setUrl(route('brands-client.show', $brand));
        // SEOTools::setCanonical(route('brands-client.show', $brand));
        // SEOTools::metatags()->addMeta('keywords', $brands->name . ', water pump, faucet, heat pump, SunHour Group');
        // SEOTools::opengraph()->addProperty('type', 'website');
        // SEOTools::twitter()->setSite('@SunHourGroup');
        // // ✅ Add multiple images to OpenGraph & JSON-LD
        // foreach ($images as $img) {
        //     SEOTools::opengraph()->addImage($img, ['height' => 630, 'width' => 1200]);
        //     SEOTools::jsonLd()->addImage($img, ['height' => 630, 'width' => 1200]);
        //     SEOTools::twitter()->addImage($img, ['height' => 630, 'width' => 1200]);
        // }
        return view('frontends.brands.show', compact('brands', 'product'));
    }

    public function category($brand, $product)
    {
        $brands = Brand::query()->where('slug', $brand)->first();
        $products = Product::query()->where('slug', $product)->first();
        $category = Category::query()->where('product_id', $products->uuid)->get();


        // ✅ Extract all images
        $images = $category->pluck('link')->filter()->map(function ($link) {
            return ($link); // adjust if needed
        })->toArray();
        //         // Set SEO meta tags
        // SEOTools::setTitle($products->name);
        // SEOTools::setDescription('Discover categories and detailed specifications for ' . $products->name . ' by ' . $brands->name . '. High-quality water systems, filters, and more.');
        // SEOTools::opengraph()->setUrl(route('category.show', [$brand, $product]));
        // SEOTools::setCanonical(route('category.show', [$brand, $product]));
        // SEOTools::metatags()->addMeta('keywords', $products->name . ', ' . $brands->name . ', water system, tiles, solar water, accessories');
        // SEOTools::opengraph()->addProperty('type', 'product.group');
        // SEOTools::twitter()->setSite('@SunHourGroup');
        // // ✅ Add multiple images to OpenGraph & JSON-LD
        // foreach ($images as $img) {
        //     SEOTools::opengraph()->addImage($img, ['height' => 630, 'width' => 1200]);
        //     SEOTools::jsonLd()->addImage($img, ['height' => 630, 'width' => 1200]);
        //     SEOTools::twitter()->addImage($img, ['height' => 630, 'width' => 1200]);
        // }
        return view('frontends.details', compact('products', 'brands', 'category'));
    }



    public function model($brand, $product)
    {

        $brands = Brand::where('slug', $brand)->firstOrFail();
        $category = Category::where('slug', $product)->first();
        $products = $category
            ? $category
            : Product::where('slug', $product)->firstOrFail();

        $query = Models::query()->where('product_id', $products->uuid);
        $model = $query->get();


        // dd($model);


        // ✅ Extract all images from $model->link
        $images = $model->pluck('link')->filter()->map(function ($link) {
            return ($link); // adjust if needed
        })->toArray();

        // // ✅ SEO
        // SEOTools::setTitle($products->name);
        // SEOTools::setDescription("Explore available models of {$products->name} by {$brands->name}, with high-performance water systems and home tech.");
        // SEOTools::opengraph()->setUrl(route('brands-client.model', [$brand, $product]));
        // SEOTools::setCanonical(route('brands-client.model', [$brand, $product]));
        // SEOTools::metatags()->addMeta('keywords', "{$products->name}, {$brands->name}, water heater, solar pump, filter, tiles");

        // // ✅ Add multiple images to OpenGraph & JSON-LD
        // foreach ($images as $img) {
        //     SEOTools::opengraph()->addImage($img, ['height' => 630, 'width' => 1200]);
        //     SEOTools::jsonLd()->addImage($img, ['height' => 630, 'width' => 1200]);
        //     SEOTools::twitter()->addImage($img, ['height' => 630, 'width' => 1200]);
        // }

        return view('frontends.brands.ModelClient.index', compact('products', 'brands', 'model', 'category'));
    }

    public function model_category($brand, $product, $categories)
    {

        $brands = Brand::where('slug', $brand)->firstOrFail();
        $category = Category::where('slug', $categories)->first();
        $products = $category
            ? $category
            : Product::where('slug', $product)->firstOrFail();

        $query = Models::query()
            ->where('category_id', $category->uuid);
        $model = $query->get();




        // ✅ Extract all images from $model->link
        $images = $model->pluck('link')->filter()->map(function ($link) {
            return ($link); // adjust if needed
        })->toArray();

        // // ✅ SEO
        // SEOTools::setTitle($products->name);
        // SEOTools::setDescription("Explore available models of {$products->name} by {$brands->name}, with high-performance water systems and home tech.");
        // SEOTools::opengraph()->setUrl(route('brands-client.model', [$brand, $product]));
        // SEOTools::setCanonical(route('brands-client.model', [$brand, $product]));
        // SEOTools::metatags()->addMeta('keywords', "{$products->name}, {$brands->name}, water heater, solar pump, filter, tiles");

        // // ✅ Add multiple images to OpenGraph & JSON-LD
        // foreach ($images as $img) {
        //     SEOTools::opengraph()->addImage($img, ['height' => 630, 'width' => 1200]);
        //     SEOTools::jsonLd()->addImage($img, ['height' => 630, 'width' => 1200]);
        //     SEOTools::twitter()->addImage($img, ['height' => 630, 'width' => 1200]);
        // }

        return view('frontends.brands.ModelClient.index', compact('products', 'categories', 'brands', 'model', 'category'));
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
            ->first();


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
