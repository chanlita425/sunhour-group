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
use App\Models\FAQs;
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
            "Discover {$brandNames} Water Purifier and Water Filter Cambodia solutions for safe home drinking water. Sun Hour provides Purepro systems and water purified technology for residential and commercial use."
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

        // Per-brand custom SEO overrides
        $brandSeoOverrides = [
            'pure-pro' => [
                'title'       => "Water Filter Cambodia | Home Drinking & Industrial Water Treatment",
                'description' => "Find water filter solutions in Cambodia including home drinking water systems, water dispensers, and industrial water treatment. Clean, safe, and reliable water solutions.",
            ],
            'ariston' => [
                'title'       => "Water Heating System Cambodia | Storage, Instant & Heat Pump Solutions",
                'description' => "Discover water heating systems in Cambodia including storage water heaters, instantaneous heaters, and heat pumps. Reliable hot water solutions for homes, hotels, and buildings.",
            ],
            'toto' => [
                'title'       => "TOTO Brand Cambodia | Premium Bathroom Equipment & Sanitary",
                'description' => "Discover TOTO brand in Cambodia offering premium bathroom equipment, faucets, showers, and sanitary solutions for homes, hotels, and commercial projects.",
            ],
        ];

        if (isset($brandSeoOverrides[$brands->slug])) {
            $title       = $brandSeoOverrides[$brands->slug]['title'];
            $description = $brandSeoOverrides[$brands->slug]['description'];
        } else {
            $title       = __('message.product') . " - ";
            $description = $brands->description ?? "Discover {$brands->name}, Bath Tub Cambodia, Water Purifier, Faucet Cambodia, Water Purified ,Water Pump, Water Filter Cambodia,Tiles Cambodia, Building Material, Accessories Cambodia,Toto bathroom, Water Filter Cambodia, Heat Pump, Toto faucet, Water Dispenser Cambodia, Water Machine Cambodia,Toto faucet,Heat Pump,Water Dispenser Cambodia, Water Filter Cambodia, Bathroom Equipment, Water Heating System in Cambodia’s high-quality water heating systems. From energy-saving heat pumps and solar water solutions to home shower units and storage water heaters, we have the perfect hot water solution for every home.";
        }

        $locale = app()->getLocale();
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::opengraph()->setUrl(route('brands-client.show', [$brands->slug, 'locale' => $locale]));
        SEOTools::setCanonical(route('brands-client.show', [$brands->slug,'locale' => $locale]));
        SEOTools::opengraph()->addImages($images); // optional Open Graph images
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@SunHourGroup');

        // Brand-type FAQs only
        $faqs = FAQs::where('brand_id', $brands->uuid)
            ->where('faq_type', 'brand')
            ->get();

        // Map brand slug to navigation category lang key
        $navCategoryMap = [
            'toto'         => 'SanitaryWareFitting',
            'ariston'      => 'WaterHeaterSystem',
            'grund-fos'    => 'WaterPump',
            'pure-pro'     => 'WaterFilter',
            'rak-ceramics' => 'PorcelainTileCeramicTile',
        ];
        $navCategoryKey = $navCategoryMap[$brands->slug] ?? null;
        $navCategoryTitle = $navCategoryKey
            ? __('message.' . $navCategoryKey) . ' ' . __('message.product')
            : __('message.product');

        return view('frontends.brands.show', compact('brands', 'product', 'faqs', 'navCategoryTitle'));
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

        // Category-type FAQs: brand + product match, faq_type = 'category'
        $faqs = FAQs::where('brand_id', $brands->uuid)
            ->where('product_id', $products->uuid)
            ->where('faq_type', 'category')
            ->get();

        return view('frontends.details', compact('brands', 'products', 'category', 'faqs'));
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
        // $model = Models::where('product_id', $products->uuid)->get();
        $model = Models::where(
            'product_id',
            $category ? $category->product_id : $products->uuid
        )->get();

        // Extract all images from models
        $images = $model->pluck('link')->filter()->toArray();

        // ✅ Dynamic SEO
        // $title = "{$brands->name} Cambodia | "
        //     . (session()->get('locale') == 'en' ? $products->name : $products->name_khmer)
        //     . " - ";

        // $title = (session()->get('locale') == 'en' ? $products->name : $products->name_khmer) . " - ";
        // $description = $products->description ?? "{$brands->name} Cambodia offers premium {$products->name}, Bath Tub Cambodia, សំភារៈប្រើនៅទីសាធារណៈ,Faucet Cambodia, Water Purifier, Water Purified ,Water Pump, Water Filter Cambodia,Tiles Cambodia, Building Material, Accessories Cambodia,Toto bathroom, Water Filter Cambodia, Heat Pump, Toto faucet, Water Dispenser Cambodia, Water Machine Cambodia,Toto faucet, Heat Pump, Bathroom Equipment, Water Dispenser Cambodia, Water Filter Cambodia, Water Heating System and safe hydration solutions in Phnom Penh.";
    
        // Per-product custom SEO overrides
        $seoOverrides = [
            'storage-water-heater' => [
                'title'       => 'Storage Water Heater Cambodia | Hot Water System for Home & Building',
                'description' => 'Explore storage water heaters in Cambodia for reliable and consistent hot water supply. Ideal for homes, hotels, and commercial buildings in Phnom Penh and nationwide.',
            ],
            'water-transfer-system-cambodia' => [
                'title'       => "Water Transfer Cambodia | Pump System & Water Transfer Solutions",
                'description' => "Discover water transfer solutions in Cambodia including transfer pumps and booster systems for homes, buildings, and industrial projects. Reliable and efficient water flow systems.",
            ],
            'heat-pump-cambodia' => [
                'title'       => "Heat Pump Cambodia | Energy Efficient Hot Water System",
                'description' => "Discover heat pump systems in Cambodia for energy-efficient hot water solutions. Ideal for homes, hotels, and commercial buildings with reduced electricity consumption.",
            ],
            'bathroom-accessories-cambodia' => [
                'title'       => "Bathroom Accessories Cambodia | TOTO Shower & Bathroom Fixtures",
                'description' => "Discover bathroom accessories in Cambodia including TOTO shower sets, hand showers, and bathroom fixtures. Perfect for homes, hotels, and commercial projects.",
            ],
            'home-drinking-water-cambodia' => [
                'title'       => "Home Drinking Water Cambodia | Water Purifier & Drinking Water System",
                'description' => "Discover home drinking water systems in Cambodia including water purifiers, RO systems, and dispensers. Clean, safe, and reliable drinking water for homes and offices.",
            ],
            'toto-faucet' => [
                'title'       => "TOTO Faucet Cambodia | Premium Bathroom Faucet Solutions",
                'description' => "Explore TOTO faucets in Cambodia with modern design, durability, and water efficiency. Ideal for homes, hotels, and commercial bathroom projects.",
            ],
        ];

        $slug = $product; // URL slug
        if (isset($seoOverrides[$slug])) {
            $title       = $seoOverrides[$slug]['title'];
            $description = $seoOverrides[$slug]['description'];
        } else {
            $title       = (session()->get('locale') == 'en' ? $products->name : $products->name_khmer) . " - ";
            $description = $products->description ?? "{$brands->name} Cambodia offers premium {$products->name}, Bath Tub Cambodia, សំភារៈប្រើនៅទីសាធារណៈ,Faucet Cambodia, Water Purifier, Water Purified ,Water Pump, Water Filter Cambodia,Tiles Cambodia, Building Material, Accessories Cambodia,Toto bathroom, Water Filter Cambodia, Heat Pump, Toto faucet, Water Dispenser Cambodia, Water Machine Cambodia,Toto faucet, Heat Pump, Bathroom Equipment, Water Dispenser Cambodia, Water Filter Cambodia, Water Heating System and safe hydration solutions in Phnom Penh.";
        }

        // $locale = app()->getLocale();
        // SEOTools::setTitle($title);
        // SEOTools::setDescription($description);
        // SEOTools::opengraph()->setUrl(route('brands-client.model', [$brand, $product, 'locale' => $locale]));
        // SEOTools::setCanonical(route('brands-client.model', [$brand, $product, 'locale' => $locale]));

        $locale = app()->getLocale();
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);

        SEOTools::opengraph()->setUrl(route('brands-client.model', [
            'brands'   => $brand,
            'products' => $product,
            'locale'   => $locale,
        ]));

        SEOTools::setCanonical(route('brands-client.model', [
            'brands'   => $brand,
            'products' => $product,
            'locale'   => $locale,
        ]));

        SEOTools::opengraph()->addImages($images);
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@SunHourGroup');

        // Model-type FAQs: $products may be a Category — resolve the real product UUID
        $productUuidForFaq = $category ? $category->product_id : $products->uuid;

        if ($category) {
            // Prefer category-specific model FAQs; fall back to product-level model FAQs
            $faqs = FAQs::where('brand_id', $brands->uuid)
                ->where('product_id', $category->product_id)
                ->where('faq_type', 'model')
                ->where('category_id', $category->uuid)
                ->get();
            if ($faqs->isEmpty()) {
                $faqs = FAQs::where('brand_id', $brands->uuid)
                    ->where('product_id', $category->product_id)
                    ->where('faq_type', 'model')
                    ->whereNull('category_id')
                    ->get();
            }
        } else {
            $faqs = FAQs::where('brand_id', $brands->uuid)
                ->where('product_id', $productUuidForFaq)
                ->where('faq_type', 'model')
                ->whereNull('category_id')
                ->get();
        }

        return view('frontends.brands.ModelClient.index', compact('products', 'brands', 'model', 'category', 'faqs'));
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
        // $products = $category
        //     ? $category
        //     : Product::where('slug', $product)->firstOrFail();

        $products = Product::where('slug', $product)->firstOrFail();
        
        // Get all models for this category
        $model = Models::where('category_id', $category->uuid)->get();

        // Extract images from models for Open Graph
        $images = $model->pluck('link')->filter()->toArray();

        // Dynamic SEO
        // $title = "{$brands->name} Camobodia | {$category->name} Models | {$products->name} | - ";
        $title = "{$category->name} Models | {$products->name} | - ";
        $description = $category->description ?? "Explore all models in {$category->name} for {$products->name} by {$brands->name} ,សំភារៈប្រើនៅទីសាធារណៈ, Bath Tub Cambodia, Water Purifier, Water Purified ,Water Pump, Water Filter Cambodia,Tiles Cambodia, Building Material, Accessories Cambodia,Toto bathroom, Water Filter Cambodia, Heat Pump, Toto faucet, Water Dispenser Cambodia, Water Machine Cambodia, Bathroom Equipment, Toto faucet,Heat Pump,Water Dispenser Cambodia,Water Filter Cambodia, Water Heating System at Sun Hour Group.";
        $locale = app()->getLocale();
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);

        SEOTools::opengraph()->setUrl(route('brands-client.model_category', [
    'brands'   => $brand,
    'products' => $product,
    'category' => $categories,
]));

SEOTools::setCanonical(route('brands-client.model_category', [
    'brands'   => $brand,
    'products' => $product,
    'category' => $categories,
]));

        SEOTools::opengraph()->addImages($images);
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@SunHourGroup');

        // Model-type FAQs: prefer category-specific, fall back to product-level
        $faqs = FAQs::where('brand_id', $brands->uuid)
            ->where('product_id', $category->product_id)
            ->where('faq_type', 'model')
            ->where('category_id', $category->uuid)
            ->get();
        if ($faqs->isEmpty()) {
            $faqs = FAQs::where('brand_id', $brands->uuid)
                ->where('product_id', $category->product_id)
                ->where('faq_type', 'model')
                ->whereNull('category_id')
                ->get();
        }

        return view('frontends.brands.ModelClient.index', compact('products', 'category', 'brands', 'model', 'faqs'));
    }

    public function model_details($brand, $products, $model)
    {
        $category = Category::query()->where('slug', $products)->first();

        if (!$category) {
            $product = Product::query()->where('slug', $products)->first();

            if (!$product) {
                abort(404, 'Product not found.');
            }

            $category = Category::query()
                ->where('product_id', $product->uuid)
                ->first();
        }

        $models = Models::query()
            ->where('uuid', $model)
            ->firstOrFail();

        // SEO
        $this->setModelSeo($models, $brand);

        $functions = ModelFunction::query()
            ->where('model_id', $models->uuid)
            ->get();

        $tech = Tecnology::query()->get();

        $fileDownloads = FileDownload::query()
            ->where('model_id', $models->uuid)
            ->get();

        $awards = Award::query()
            ->where('model_id', $models->uuid)
            ->get();

        $medias = Media::query()
            ->where('model_id', $models->uuid)
            ->first();

        $features = Feature::query()
            ->where('model_id', $models->uuid)
            ->get();

        $spaces = Space::query()
            ->where('model_id', $models->uuid)
            ->get();

        $daily = DailyClean::query()
            ->where('model_id', $models->uuid)
            ->first();

        $deep = DeepClean::query()
            ->where('model_id', $models->uuid)
            ->first();

        return view(
            'frontends.brands.ModelClient.ModelDetail.index',
            compact(
                'models',
                'brand',
                'functions',
                'daily',
                'deep',
                'spaces',
                'fileDownloads',
                'medias',
                'features',
                'tech',
                'awards'
            )
        );
    }

    private function setModelSeo($models, $brand): void
    {
        $title = $models->name . ' Cambodia | ' . ucfirst($brand);

        $description = $models->description
            ?? $models->name . ' by Sun Hour Group Cambodia';

        $images = !empty($models->link)
            ? [asset($models->link)]
            : [];

        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());

        if (!empty($images)) {
            SEOTools::opengraph()->addImages($images);
        }

        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@SunHourGroup');
    }
}

