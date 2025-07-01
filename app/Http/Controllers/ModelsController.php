<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Admin\Brand;
use Illuminate\Support\Str;
use App\Models\Admin\Models;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Http\Requests\ModelRequest;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Crypt;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Validator;

class ModelsController extends Controller
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
    public function index(Request $request, $brands, $product)
    {
        // Check if $product is a product_id
        $isProductId = Models::query()->where('category_id', $product)->exists();

        // dd($isProductId);
        // Build query accordingly
        if ($isProductId) {
            $query = Models::query()->where('category_id', $product);
        } else {
            $query = Models::query()->where('product_id', $product);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        $perPage = $request->input('perPage', 10);
        $validPerPage = in_array($perPage, [10, 20, 50]) ? $perPage : 10;

        $models = $query->orderBy('name', 'asc')->paginate($validPerPage)->appends($request->except('page'));

        $models->getCollection()->transform(function ($item, $index) use ($models) {
            $item->auto_number = $index + 1 + ($models->currentPage() - 1) * $models->perPage();
            return $item;
        });

        // Defensive: always check for null in Blade
        $singleData = null;
        if ($isProductId) {
            // It's a product
            $singleData = Category::query()
                ->where("uuid", $product)
                ->where('product_id', $brands)
                ->first();
        } else {
            // It's a category
            $singleData = Product::query()
                ->where("uuid", $product)
                ->where('brand_id', $brands)
                ->first();
        }

        $modelsEmpty = $models->isEmpty();

        return view('admin.models.index', [
            'loading' => $modelsEmpty,
            'models' => $models,
            'singleData' => $singleData,
            'isProductId' => $isProductId
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
           $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'product_id' => 'required_without:category_id',
                'category_id' => 'required_without:product_id',
            ], [
                'name.required' => 'Product name is required.',
                'name.string' => 'Product name must be a string.',
                'product_id.required_without' => 'Product id is required unless category id is present.',
                'category_id.required_without' => 'Category id is required unless product id is present.',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Add record failed.',
                    'errors' => $validator->errors()
                ], 422);
            }

            $data = $request->except(['_token','_method']);

            Models::create([
                'uuid' => $this->encodeIdToString(1),
                'name' => $data['name'],
                'product_id' => $data['product_id'] ?? null,
                'category_id' => $data['category_id'] ?? null,
                'link' => $data['link']
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
    public function edit($brandOrCategoryId, $productIdOrCategoryId, $modelId)
    {
        // Try product context first
        $model = Models::query()
            ->where('uuid', $modelId)
            ->where('product_id', $productIdOrCategoryId)
            ->first();

        // If not found, try category context
        if (!$model) {
            $model = Models::query()
                ->where('uuid', $modelId)
                ->where('category_id', $productIdOrCategoryId)
                ->first();
        }

        if (!$model) {
            return response()->json([
                'success' => false,
                'message' => 'Model not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $model
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $brandOrCategoryId, $productOrCategoryId, $modelId)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'product_id' => 'required_without:category_id',
                'category_id' => 'required_without:product_id',
            ], [
                'name.required' => 'Model name is required.',
                'product_id.required_without' => 'Product id is required unless category id is present.',
                'category_id.required_without' => 'Category id is required unless product id is present.',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed.',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Try to find by product_id, then by category_id
            $model = Models::query()
                ->where('uuid', $modelId)
                ->where(function ($query) use ($productOrCategoryId) {
                    $query->where('product_id', $productOrCategoryId)
                        ->orWhere('category_id', $productOrCategoryId);
                })
                ->first();

            if (!$model) {
                return response()->json([
                    'success' => false,
                    'message' => 'Model not found.'
                ], 404);
            }

            $data = $request->except(['_token', '_method']);

            $model->update([
                'name' => $data['name'],
                'product_id' => $data['product_id'] ?? null,
                'category_id' => $data['category_id'] ?? null,
                'link' => $data['link'] ?? null
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Model Updated Successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating model: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($brandOrCategoryId, $productOrCategoryId, $modelId)
    {
        // Try to find by product_id, then by category_id
        $model = Models::query()
            ->where('uuid', $modelId)
            ->where(function($query) use ($productOrCategoryId) {
                $query->where('product_id', $productOrCategoryId)
                    ->orWhere('category_id', $productOrCategoryId);
            })
            ->first();

        if (!$model) {
            return response()->json([
                'success' => false,
                'message' => 'Model not found.'
            ], 404);
        }

        try {
            if (!empty($model->path) && file_exists(public_path($model->path))) {
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
                'message' => 'Failed to delete Model! Error: ' . $e->getMessage()
            ], 500);
        }
    }
}
