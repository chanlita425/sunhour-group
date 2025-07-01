<?php

namespace App\Http\Controllers;

use App\Models\Admin\Feature;
use App\Models\Admin\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeatureController extends Controller
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
    public function index(Request $request,$brand,$product,$model)
        {
            $query = Feature::query()
                ->where('model_id',$model);

            // Handle search
            if ($request->has('search') && $request->search !== '') {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%"); // Add more searchable fields as needed
                });
            }
            $perPage = $request->input('perPage', 10); // Default to 10 if not specified
            $validPerPage = in_array($perPage, [10, 20, 50]) ? $perPage : 10;
            $feature = $query->paginate($validPerPage)->appends($request->except('page'));
            $feature->getCollection()->transform(function ($item, $index) use ($feature) {
                $item->auto_number = $index + 1 + ($feature->currentPage() -1) * $feature->perPage();
                return $item;
            });
            $loading = $feature->isEmpty();
            $singleData = Models::query()->where('uuid', $model)->first();
            if ($feature->count() > 0) {
                $loading = false;
                return view('admin.models.details.features.index', compact('loading', 'feature','singleData'));
            }
                return view('admin.models.details.features.index', compact('loading', 'feature','singleData'));
        }

    /**
     * Store a newly created resource in storage.
     */
    // In your controller
// Store new record
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'description' => 'required',
            ],[
                'description.required' => 'Please input description',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }
            $data = $request->except('_token');

            Feature::create([
                'description' => $data['description'],
                'uuid' => $this->encodeIdToString(rand(0,9999)),
                'model_id' => $data['model_id'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Record created successfully',
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating record: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit($brandId, $productId, $modelId,$functionId)
    {
        $feature = Feature::query()
            ->where('uuid', $functionId)
            ->where('model_id', $modelId) // Assuming a 'brand_id' foreign key
            ->first();
        return response()->json([
            'success' => true,
            'data' => $feature
        ]);
    }
    // Update existing record
    public function update(Request $request, $brandId, $productId, $modelId,$functionId)
    {
        try {
            $validator = Validator::make($request->all(), [
                'description' => 'required',
            ],
                [
                    'description.required' => 'Please input description',
                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }
            $feature = Feature::query()
                ->where('uuid', $functionId)
                ->where('model_id', $modelId) // Assuming a 'brand_id' foreign key
                ->first();
            $data = $request->except('_token','_method');
            $feature->update([
                'uuid' => $feature->uuid,
                'description' => $data['description'],
                'model_id' => $data['model_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Record updated successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating record: ' . $e->getMessage()
            ], 500);
        }
    }

    // Delete record
    public function destroy($brandId, $productId, $modelId,$featureId)
    {
        try {
            $featureId = Feature::query()
                ->where('uuid', $featureId)
                ->where('model_id', $modelId) // Assuming a 'brand_id' foreign key
                ->first();

            if (!$featureId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Record not found'
                ], 404);
            }

            $featureId->delete();

            return response()->json([
                'success' => true,
                'message' => 'Record deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting record: ' . $e->getMessage()
            ], 500);
        }
    }
}
