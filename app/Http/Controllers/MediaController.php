<?php

namespace App\Http\Controllers;

use App\Models\Admin\Media;
use App\Models\Admin\Models;
use Illuminate\Http\Request;

class MediaController extends Controller
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
        $query = Media::query()
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
        $media = $query->paginate($validPerPage)->appends($request->except('page'));

        $loading = $media->isEmpty();
        $singleData = Models::query()->where('uuid', $model)->first();
        if ($media->count() > 0) {
            $loading = false;
            return view('admin.models.details.media.index', compact('loading', 'media','singleData'));
        }
        return view('admin.models.details.media.index', compact('loading', 'media','singleData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'model_id' => 'required'
        ]);

        $data = $request->except(['_token','_method']);
        try {
            Media::create([
                'uuid' => $this->encodeIdToString(rand(0,9999)),
                'name' => $data['name'],
                'link' => $data['link'],
                'model_id' => $data['model_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Video added successfully',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($brandId,$productId,$modelId,$dcId)
    {
        try {
            $query = Media::query()
                ->where('uuid', $dcId)
                ->where('model_id', $modelId)
                ->first();
            return response()->json([
                'success' => true,
                'data' => $query,
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $brandId,$productId,$modelId,$dcId)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'model_id' => 'required'
        ]);

        $data = $request->except(['_token','_method']);
        try {
            $query = Media::query()
                ->where('uuid', $dcId)
                ->where('model_id', $modelId)
                ->first();

            $query->update([
                'uuid' => $query->uuid,
                'name' => $data['name'],
                'link' => $data['link'],
                'model_id' => $data['model_id'],
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Video updated successfully',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($brandId,$productId,$modelId,$media)
    {
        try {
            $query = Media::query()
                ->where('uuid', $media)
                ->where('model_id', $modelId)
                ->first();
            $query->delete();
            return response()->json([
                'success' => true,
                'message' => 'Video deleted successfully',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ]);
        }
    }
}
