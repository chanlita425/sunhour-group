<?php

namespace App\Http\Controllers;

use App\Models\Admin\ModelFunction;
use App\Models\Admin\Tecnology;
use Illuminate\Http\Request;

class TecnologyController extends Controller
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
        public function index(Request $request,$brand,$product,$model,$function)
        {
            $query = Tecnology::query()
            ->where('functions_id',$function);

            // Handle search
            if ($request->has('search') && $request->search !== '') {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            }

            $perPage = $request->input('perPage', 10);
            $validPerPage = in_array($perPage, [10, 20, 50]) ? $perPage : 10;
            $tech = $query->paginate($validPerPage)->appends($request->except('page'));
            $tech->getCollection()->transform(function ($item, $index) use ($tech) {
                $item->auto_number = $index + 1 + ($tech->currentPage() -1) * $tech->perPage();
                return $item;
            });
            $loading = $tech->isEmpty();
            $singleData = ModelFunction::query()->where('uuid', $function)->first();
            if ($tech->count() > 0) {
                $loading = false;
                return view('admin.models.functions.details.index', compact('loading', 'tech','singleData'));
            }
            return view('admin.models.functions.details.index', compact('loading', 'tech','singleData'));
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'functions_id' => 'required',
            'link' => 'required',
        ]);
        $data = $request->except(['_token','_method']);

        $post = Tecnology::create([
            'uuid' => $this->encodeIdToString(1),
            'name' => $data['name'],
            'functions_id' => $data['functions_id'],
            'link' => $data['link'],
        ]);

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Details Created Successfully'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Details Not Created Successfully!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function edit($brandId, $productId, $modelId,$functionId,$techId)
    {
        $tech = Tecnology::query()
            ->where('uuid', $techId)
            ->where('functions_id', $functionId) // Assuming a 'brand_id' foreign key
            ->firstOrFail();
        return response()->json([
            'success' => true,
            'data' => $tech
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$brandId, $productId, $modelId,$functionId,$techId)
    {
        $request->validate([
            'name' => 'required',
            'functions_id' => 'required',
            'link' => 'required',
        ]);

        $tech = Tecnology::query()
            ->where('uuid', $techId)
            ->where('functions_id', $functionId) // Assuming a 'brand_id' foreign key
            ->first();

        $data = $request->except(['_token', '_method']);
        // Update the existing brand instance instead of creating a new one
        $updated = $tech->update([
            'uuid' => $tech->uuid,
            'name' => $data['name'],
            'functions_id' => $data['functions_id'],
            'link' => $data['link'],
        ]);

        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'Technology Updated Successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Technology Not Updated Successfully'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($brandId, $productId, $modelId,$functionId,$techId)
    {
        $tech = Tecnology::query()
            ->where('uuid', $techId)
            ->where('functions_id', $functionId) // Assuming a 'brand_id' foreign key
            ->first();
        try {
            $tech->delete();

            return response()->json([
                'success' => true,
                'message' => 'Technology deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete technology!'
            ], 500);
        }
    }
}
