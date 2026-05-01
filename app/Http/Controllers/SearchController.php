<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Category;
use App\Models\Admin\Brand;
use App\Models\Admin\Models;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        try {
            $search = trim($request->input('search'));
            $product = $request->input('product');
            $brand = $request->input('brand');

            // Initialize products as null
            $products = null;
            $brands = null;
            $singleModel = null;

            // Log search parameters
            Log::info('Search parameters:', [
                'search' => $search,
                'product' => $product,
                'brand' => $brand
            ]);

            // Handle empty search
            if (empty($search)) {
                return view('search.index', [
                    'model' => collect()->paginate(10),
                    'search' => null,
                    'products' => null,
                    'singleModel' => null,
                    'brands' => null,
                    'error' => 'Please enter a search term'
                ]);
            }

            //Try to get models by product_id, with search if provided
            $modelQuery = Models::query()
                ->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            // $modelQuery = Models::with(['products.brands'])
            //     ->where(function ($q) use ($search) {
            //         $q->where('name', 'like', "%{$search}%");
            // });

            $model = $modelQuery->paginate(10); // Add pagination with 10 items per page
            
            // Log search results
            Log::info('Initial search results count: ' . $model->total());

            // If not found, fallback: Find by category_id and order by name desc, with search if provided
            if ($model->isEmpty()) {
                $model = Models::query()
                    ->where(function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })
                    ->orderBy('name', 'desc')
                    ->paginate(10); // Add pagination with 10 items per page

                Log::info('Fallback search results count: ' . $model->total());
            }

            // Only get single model if we have results
            if ($model->isNotEmpty()) {
                $singleModel = $model->first();
                
                try {
                    if ($singleModel && $singleModel->products) {
                        // Get brand info
                        $brands = Brand::where('uuid', $singleModel->products->brands->uuid)->first();

                        // Determine if $product is a category or a product
                        $category = Category::where('product_id', $singleModel->products->uuid)->first();
                        if ($category) {
                            $products = $category;
                        } else {
                            $products = Product::where('uuid', $singleModel->products->uuid)->first();
                        }
                    }
                } catch (\Exception $e) {
                    Log::error('Error loading relationships: ' . $e->getMessage());
                    // Continue without the relationships
                }
            }

            return view('search.index', compact(
                'model',
                'search',
                'products',
                'singleModel',
                'brands'
            ));

        } catch (\Exception $e) {
            Log::error('Search error: ' . $e->getMessage());
            
            // Create an empty paginated collection
            $emptyCollection = collect();
            $page = request()->get('page', 1);
            $perPage = 10;
            
            $paginatedCollection = new LengthAwarePaginator(
                $emptyCollection,
                $emptyCollection->count(),
                $perPage,
                $page,
                ['path' => request()->url(), 'query' => request()->query()]
            );

            return view('search.index', [
                'products' => null,
                'brands' => null,
                'model' => $paginatedCollection,
                'search' => $search,
                'singleModel' => null,
                'error' => 'An error occurred while performing the search.'
            ]);
        }
    }
}