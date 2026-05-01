<?php

namespace App\Http\Controllers;

use App\Models\Admin\Product;
use App\Models\Admin\Brand;
use App\Models\Admin\Models;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
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
    public function index(Request $request, $brand)
    {
        // Start with a query builder instance and eager load categories
        $query = Product::query()
            ->where('brand_id', $brand); // <--- eager load categories

        // Handle search
        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%"); // Add more searchable fields as needed
            });
        }

        // Handle items per page
        $perPage = $request->input('perPage', 10); // Default to 10 if not specified
        $validPerPage = in_array($perPage, [10, 20, 50]) ? $perPage : 10;

        // Get the paginated results
        $product = $query->paginate($validPerPage)->appends($request->except('page'));
        $product->getCollection()->transform(function ($item, $index) use ($product) {
            $item->auto_number = $index + 1 + ($product->currentPage() - 1) * $product->perPage();
            return $item;
        });

        $loading = $product->isEmpty();

        $singleData = Brand::query()
            ->where('uuid', $brand)
            ->firstOrFail();

        return view('admin.products.index', compact('loading', 'product', 'singleData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|unique:products,name',
                'name_khmer' => 'required|string|unique:products,name_khmer',
                'name_chinese' => 'required|string|unique:products,name_chinese'
            ], [
                'name.required' => 'Product name is required.',
                'name.string' => 'Product name must be a string.',
                'name.unique' => 'Product name does exist.',
                'name_khmer.required' => 'Product name is required.',
                'name_khmer.string' => 'Product name must be a string.',
                'name_khmer.unique' => 'Product name does exist.',
                'name_chinese.required' => 'Product name is required.',
                'name_chinese.string' => 'Product name must be a string.',
                'name_chinese.unique' => 'Product name does exist.',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product name was exist.',
                    'errors' => $validator->errors()
                ], 422);
            }

            $data = $request->except(['_token', '_method']);

            Product::create([
                'uuid' => $this->encodeIdToString(rand(0, 999999)),
                'name' => $data['name'],
                'name_khmer' => $data['name_khmer'],
                'name_chinese' => $data['name_chinese'],
                'slug' => Str::slug($request->name),
                'status' => $data['status'],
                'link' => $data['link'],
                'brand_id' => $data['brand_id'],
                'description' => $data['description'] ?? null,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Product Created Successfully'
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
    public function edit($brandId, $productId)
    {
        $product = Product::query()
            ->where('uuid', $productId)
            ->where('brand_id', $brandId) // Assuming a 'brand_id' foreign key
            ->first();
        return response()->json([
            'success' => true,
            'data' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $brandId, $productId)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'name_khmer' => 'required|string',
                'name_chinese' => 'required|string'
            ], [
                'name.required' => 'Product name is required.',
                'name.string' => 'Product name must be a string.',
                'name_khmer.required' => 'Product name is required.',
                'name_khmer.string' => 'Product name must be a string.',
                'name_chinese.required' => 'Product name is required.',
                'name_chinese.string' => 'Product name must be a string.',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product name was exist.',
                    'errors' => $validator->errors()
                ], 422);
            }

            $product = Product::query()
                ->where('uuid', $productId)
                ->where('brand_id', $brandId) // Assuming a 'brand_id' foreign key
                ->first();
            $data = $request->except(['_token', '_method']);
            // Update the existing brand instance instead of creating a new one
            $product->update([
                'name' => $data['name'],
                'name_khmer' => $data['name_khmer'],
                'name_chinese' => $data['name_chinese'],
                'slug' => Str::slug($request->name),
                'status' => $data['status'],
                'link' => $data['link'],
                'brand_id' => $data['brand_id'],
                'description' => $data['description'] ?? null,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Product Updated Successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating product: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($brandId, $productId)
    {
        $product = Product::query()
            ->where('uuid', $productId)
            ->where('brand_id', $brandId) // Assuming a 'brand_id' foreign key
            ->first();
        try {
            $product->delete();

            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete product!'
            ], 500);
        }
    }
}
