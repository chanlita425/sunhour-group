<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ModelFunction;
use App\Models\Admin\Models;
use App\Models\Admin\Tecnology;
use Illuminate\Http\Request;

class FunctionController extends Controller
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
    public function index(Request $request,$brand,$product,$model)
    {
        $query = ModelFunction::query()
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
        $functions = $query->paginate($validPerPage)->appends($request->except('page'));
        $functions->getCollection()->transform(function ($item, $index) use ($functions) {
            $item->auto_number = $index + 1 + ($functions->currentPage() -1) * $functions->perPage();
            return $item;
        });
        $loading = $functions->isEmpty();
        $singleData = Models::query()->where('uuid', $model)->first();
        if ($functions->count() > 0) {
            $loading = false;
            return view('admin.models.functions.index', compact('loading', 'functions','singleData'));
        }
        return view('admin.models.functions.index', compact('loading', 'functions','singleData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'model_id' => 'required',
            'icon' => 'required',
        ]);
        $data = $request->except(['_token','_method']);

        $post = ModelFunction::create([
            'uuid' => $this->encodeIdToString(rand(0,999999)),
            'name' => $data['name'],
            'model_id' => $data['model_id'],
            'icon' => $data['icon'],
        ]);

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Function Created Successfully'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Function Not Created Successfully!'
            ]);
        }
    }

    public function edit($brandId, $productId, $modelId,$functionId)
    {
        $fun = ModelFunction::query()
            ->where('uuid', $functionId)
            ->where('model_id', $modelId) // Assuming a 'brand_id' foreign key
            ->first();
        return response()->json([
            'success' => true,
            'data' => $fun
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$brandId, $productId, $modelId,$functionId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $fun = ModelFunction::query()
            ->where('uuid', $functionId)
            ->where('model_id', $modelId) // Assuming a 'brand_id' foreign key
            ->first();

        $data = $request->except(['_token', '_method']);
        // Update the existing brand instance instead of creating a new one
        $updated = $fun->update([
            'name' => $data['name'],
            'model_id' => $data['model_id'],
            'icon' => $data['icon'],
        ]);

        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'Function Updated Successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Function Not Updated Successfully'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($brandId, $productId, $modelId,$functionId)
    {
        try {
            $fun = ModelFunction::query()
                ->where('uuid', $functionId)
                ->where('model_id', $modelId) // Assuming a 'brand_id' foreign key
                ->first();
            $fun->delete();

            return response()->json([
                'success' => true,
                'message' => 'Function deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete function!'
            ], 500);
        }
    }
}
