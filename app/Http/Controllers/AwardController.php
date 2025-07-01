<?php

namespace App\Http\Controllers;

use App\Models\Admin\Award;
use App\Models\Admin\Models;
use Illuminate\Http\Request;

class AwardController extends Controller
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
            $query = Award::query()
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
            $award = $query->paginate($validPerPage)->appends($request->except('page'));
            $award->getCollection()->transform(function ($item, $index) use ($award) {
                $item->auto_number = $index + 1 + ($award->currentPage() -1) * $award->perPage();
                return $item;
            });
            $loading = $award->isEmpty();
            $singleData = Models::query()->where('uuid', $model)->first();
            if ($award->count() > 0) {
                $loading = false;
                return view('admin.models.details.Award.index', compact('loading', 'award','singleData'));
            }

                return view('admin.models.details.Award.index', compact('loading', 'award','singleData'));
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'path' => 'required',
            'model_id' => 'required',
        ]);

        $data = $request->except('_token');
        try {
            $post = Award::create([
                'uuid' => $this->encodeIdToString(rand(0,9999)),
                'path' => $data['path'],
                'model_id' => $data['model_id'],
            ]);
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Awards Successfully',
                ]);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Awards Failed',
                ]);
            }
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($brandId,$productId,$modelId, $AwardId)
    {
        $award = Award::query()
            ->where('uuid', $AwardId)
            ->where('model_id', $modelId)
            ->firstOrFail();
        return response()->json([
            'success' => true,
            'message' => 'File Downloaded Successfully',
            'data' => $award,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $brandId,$productId,$modelId, $AwardId)
    {
        $request->validate([
            'path' => 'required',
            'model_id' => 'required',
        ]);
        try {
            $award = Award::query()
                ->where('uuid', $AwardId)
                ->where('model_id', $modelId)
                ->firstOrFail();
            $data = $request->except('_token','_method');

             $update = $award->update([
                'uuid' => $award->uuid,
                 'path' => $data['path'],
                'model_id' => $data['model_id'],
            ]);
            if ($update) {
                return response()->json([
                    'success' => true,
                    'message' => 'Award Updated Successfully',
                ]);
            } else{
                return response()->json([
                    'success' => false,
                    'message' => 'Award Updated Failed',
                ]);
            }
        }catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($brandId,$productId,$modelId, $AwardId)
    {
        try {
            $award = Award::query()
                ->where('uuid', $AwardId)
                ->where('model_id', $modelId)
                ->firstOrFail();
            $award->delete();
            return response()->json([
                'success' => true,
                'message' => 'Award Deleted Successfully',
            ]);
        }catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
