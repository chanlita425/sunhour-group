<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Admin\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Http\Requests\ModelRequest;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Crypt;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    private function encodeIdToString($id, $length = 10)
    {
        $id = (int)$id;
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $saltLength = $length - strlen((string)$id) - 2;
        $salt = '';
        for ($i = 0; $i < max(4, $saltLength); $i++) {
            $salt .= $characters[rand(0, strlen($characters) - 1)];
        }
        $combined = $salt . '-' . $id;
        return base64_encode($combined);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,$brands,$product)
    {
        // Build the initial query for models by product_id
        $modelsByProductQuery = Category::query()->where('product_id', $product);

        // Check if any exist for product_id
        if ($modelsByProductQuery->exists()) {
            $query = $modelsByProductQuery;
            $isProductId = true;
        } else {
            // Fallback: Try by category_id
            $query = Product::query()->where('uuid', $product);
            $isProductId = false;
        }

        // Handle search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
                // Add more fields if needed
            });
        }

        // Handle items per page
        $perPage = $request->input('perPage', 10); // Default to 10 if not specified
        $validPerPage = in_array($perPage, [10, 20, 50]) ? $perPage : 10;

        // Paginate results
        $models = $query->orderBy('name', 'asc')->paginate($validPerPage)->appends($request->except('page'));

        // Add auto_number to each item
        $models->getCollection()->transform(function ($item, $index) use ($models) {
            $item->auto_number = $index + 1 + ($models->currentPage() - 1) * $models->perPage();
            return $item;
        });
        // Get product data only if $product is a product_id
       $singleData = null;
        if ($isProductId || !$isProductId) {
            $singleData = Product::query()
                ->where("uuid", $product)
                ->where('brand_id', $brands)
                ->first();
        }else{
            $singleData = Category::query()
                ->where("uuid", $product)
                ->where('product_id', $brands)
                ->first();
        }

        $models = $query->paginate($validPerPage)->appends($request->except('page'));
        $models->getCollection()->transform(function ($item, $index) use ($models) {
            $item->auto_number = $index + 1 + ($models->currentPage() -1) * $models->perPage();
            return $item;
        });
        $loading = $models->isEmpty();
        if ($models->count() > 0) {
            $loading = false;
            return view('admin.category.index', compact('loading', 'models','singleData'));
        }
        return view('admin.category.index', compact('loading','models','singleData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'product_id' => 'required',
            ], [
                'name.required' => 'Product name is required.',
                'name.string' => 'Product name must be a string.',
                'name.unique' => 'Product name does exist.',
                'product_id.required' => 'Product id is required.',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product name was exist.',
                    'errors' => $validator->errors()
                ], 422);
            }

            $data = $request->except(['_token','_method', 'path']);
            $image_url =null;
            if ($request->hasFile('path')) {
                $image_url = $request->file('path')->store('model/images', 'customize');
            }

             Category::create([
                'uuid' => $this->encodeIdToString(1),
                'name' => $data['name'],
                'slug' => Str::slug($request->name),
                'product_id' => $data['product_id'],
                'link' => $data['link'],
                'description' => $data['description'] ?? null,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Model Created Successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating product: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($brandId, $productId, $modelId)
    {
        $models = Category::query()
            ->where('uuid', $modelId)
            ->where('product_id', $productId) // Assuming a 'brand_id' foreign key
            ->first();
        return response()->json([
            'success' => true,
            'data' => $models
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$brandId, $productId, $modelId)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'product_id' => 'required',
            ], [
                'name.required' => 'Model name is required.',
                'name.string' => 'Model name must be a string.',
                'name.unique' => 'Model name does exist.',
                'product_id.required' => 'Model id is required.',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product name was exist.',
                    'errors' => $validator->errors()
                ], 422);
            }
            $model = Category::query()
                ->where('uuid', $modelId)
                ->where('product_id', $productId) // Assuming a 'brand_id' foreign key
                ->first();

            $data = $request->except(['_token', '_method']);
            // Update the existing brand instance instead of creating a new one
            $model->update([
                'name' => $data['name'],
                'slug' => Str::slug($request->name),
                'product_id' => $data['product_id'],
                'link' => $data['link'],
                'description' => $data['description'] ?? null,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Model Updated Successfully'
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating product: ' . $e->getMessage()
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($brandId, $productId, $modelId)
    {
        $model = Category::query()
            ->where('uuid', $modelId)
            ->where('product_id', $productId)
            ->first();
        try {
            if ($model->path) {
                @unlink(public_path($model->path));
            }
            $model->delete();

            return response()->json([
                'success' => true,
                'message' => 'Model deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete Model!'
            ], 500);
        }
    }
}
