<?php
use App\Http\Controllers\FAQsController;
use App\Http\Controllers\Frontend\FAQsFController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FunctionController;
use App\Http\Controllers\ArticleBackendController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DailyCleanController;
use App\Http\Controllers\DeepCleanController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\FileDownloadController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\BrandsController;
use App\Http\Controllers\Frontend\CareerController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\PartnershipController;
use App\Http\Controllers\LocalLangController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ModelsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShowRoomController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\TecnologyController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\SitemapController;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Admin\Brand;
use App\Models\Admin\Product;
use App\Models\Admin\Models;
use App\Models\Article;
use Artesaos\SEOTools\Facades\SEOTools;

// Route to change language
Route::get('locale/{locale}', [LocalLangController::class, 'setLocale'])->name('locale');

// Public routes with guest middleware
Route::get('/', [HomeController::class, 'HomePage'])->name('home');
// Grouped routes
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => 'en|km|cn'],
    'middleware' => \App\Http\Middleware\SetLanguage::class], function () {

        Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');
        Route::get('/partnerships', [PartnershipController::class, 'index'])->name('partnerships.index');
        Route::get('/career', [CareerController::class, 'index'])->name('career.index');
        Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
        Route::get('/faqs_f', [FAQsFController::class, 'faqs'])->name('faqs');
        Route::get('/articles', [ArticleController::class, 'article'])->name('articles');
        Route::get('/articles/{slug}', [ArticleController::class, 'articleShow'])->name('articles.show');
});
Route::get('/models', [SearchController::class, 'index'])->name('search.index');
Route::get('/all/brands', [BrandsController::class, 'index'])->name('brands.all');
Route::get('/{skug}/product', [BrandsController::class, 'show'])->name('brands-client.show');
Route::get('/{brands}/{products}/category', [BrandsController::class, 'category'])->name('category.show');
Route::get('/{brands}/{products}/model', [BrandsController::class, 'model'])->name('brands-client.model');
Route::get('/{brands}/{products}/{category}/model', [BrandsController::class, 'model_category'])->name('brands-client.model_category');
Route::get('/{brands}/{products}/{models}/details', [BrandsController::class, 'model_details'])->name('brands-client.model-details');


// Submit form
Route::post('/signup/store', [SignupController::class, 'store'])->name('signup.store');
//  CRUD
Route::prefix('admin')->group(function () {
    Route::get('/signups', [SignupController::class, 'index'])->name('signup.index');
    Route::post('/signups/update/{id}', [SignupController::class, 'update'])->name('signup.update');
    Route::delete('/signups/delete/{id}', [SignupController::class, 'destroy'])->name('signup.delete');
});

// Auth routes
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('guest.jwt')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth.jwt')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth.jwt')->name('logout');

// Protected admin routes
Route::group(['middleware' => 'auth.jwt', 'prefix' => 'admin'], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('{brands}/products', ProductController::class);
    Route::resource('{brands}/{products}/models', ModelsController::class);
    Route::resource('{brands}/{products}/categories', CategoryController::class);
    Route::resource('{brands}/{products}/{models}/functions', FunctionController::class);
    Route::resource('{brands}/{products}/{models}/{functions}/tech-details', TecnologyController::class);
    Route::resource('{brands}/{products}/{models}/daily-cleans', DailyCleanController::class);
    Route::resource('{brands}/{products}/{models}/deep-cleans', DeepCleanController::class);
    Route::resource('{brands}/{products}/{models}/show-rooms', ShowRoomController::class);
    Route::resource('{brands}/{products}/{models}/awards', AwardController::class);
    Route::resource('{brands}/{products}/{models}/features', FeatureController::class);
    Route::resource('{brands}/{products}/{models}/spaces', SpaceController::class);
    Route::resource('{brands}/{products}/{models}/medias', MediaController::class);
    Route::resource('{brands}/{products}/{models}/downloads', FileDownloadController::class);
    // This single line defines: index, store, show, update, and destroy (DELETE)
    Route::resource('/faqs', FAQsController::class);
   // This generates: GET /admin/article/{article}/edit which is what your fetch is hitting.
    Route::resource('/article', ArticleBackendController::class);
});

Route::post('/send-mail', [MailController::class, 'sendMail'])->name('send.mail');


Route::get('/generate-sitemap', function () {
    $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
    $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    $sitemap .= '<url><loc>https://sunhourgroup.com.kh/</loc></url>';
    $sitemap .= '</urlset>';
    $sitemap = Sitemap::create();

    // Add home
    $sitemap->add(
        Url::create('/')
            ->setPriority(1.0)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
    );

    foreach (Brand::all() as $brand) {
    // Brand page
    $sitemap->add(
        Url::create(route('brands-client.show', [
                'locale' => app()->getLocale(),
                'skug' => $brand->skug
            ]))
        ->setPriority(0.8)
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
    );

    foreach ($brand->products as $product) {
        if ($product->status === 1) {
            $sitemap->add(
                Url::create(route('category.show', [
                    'locale' => app()->getLocale(),
                    'brands' => $brand->slug,
                    'products' => $product->slug
                ]))
                ->setPriority(0.7)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            );
        } else {
            $sitemap->add(
                Url::create(route('brands-client.model', [
                    'locale' => app()->getLocale(),
                    'brands' => $brand->slug,
                    'products' => $product->slug
                ]))
                ->setPriority(0.6)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        }

        foreach ($product->models as $model) {
            $sitemap->add(
                Url::create(route('brands-client.model-details', [
                    'locale' => app()->getLocale(),
                    'brands' => $brand->slug,
                    'products' => $product->slug,
                    'models' => $model->uuid
                ]))
                ->setPriority(0.5)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        }
    }
}


    $sitemap->writeToFile(public_path('sitemap.xml'));
    return '✅ Sitemap generated at /public/sitemap.xml';
});

Route::get('/sitemap.xml', function () {
    $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
    $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    $sitemap .= '<url><loc>https://sunhourgroup.com.kh/</loc></url>';
    $sitemap .= '</urlset>';
    $path = public_path('sitemap.xml');
    return response()->file($path, [
        'Content-Type' => 'application/xml',
    ]);
});


//For SEO, Google needs each language URL explicitly.
Route::get('/sitemap', [SitemapController::class, 'index']);
