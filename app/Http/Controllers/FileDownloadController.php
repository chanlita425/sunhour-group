<?php

namespace App\Http\Controllers;

use App\Models\Admin\FileDownload;
use App\Models\Admin\Models;
use Illuminate\Http\Request;

class FileDownloadController extends Controller
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
            $query = FileDownload::query()
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
            $fdownload = $query->paginate($validPerPage)->appends($request->except('page'));
            $fdownload->getCollection()->transform(function ($item, $index) use ($fdownload) {
                $item->auto_number = $index + 1 + ($fdownload->currentPage() -1) * $fdownload->perPage();
                return $item;
            });
            $loading = $fdownload->isEmpty();
            $singleData = Models::query()->where('uuid', $model)->first();
            if ($fdownload->count() > 0) {
                $loading = false;
                return view('admin.models.details.downloads.index', compact('loading', 'fdownload','singleData'));
            }

                return view('admin.models.details.downloads.index', compact('loading', 'fdownload','singleData'));
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|string',
            'path' => 'required',
            'icon' => 'required',
            'model_id' => 'required',
        ]);

        $data = $request->except('_token');
        try {
            $post = FileDownload::create([
                'uuid' => $this->encodeIdToString(rand(0,9999)),
                'name' => $data['name'],
                'path' => $data['path'],
                'icon' => $data['icon'],
                'model_id' => $data['model_id'],
            ]);
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'File Downloaded Successfully',
                ]);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'File Downloaded Failed',
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
    public function edit($brandId,$productId,$modelId, $fileDownloadId)
    {
        $file = FileDownload::query()
            ->where('uuid', $fileDownloadId)
            ->where('model_id', $modelId)
            ->firstOrFail();
        return response()->json([
            'success' => true,
            'message' => 'File Downloaded Successfully',
            'data' => $file,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $brandId,$productId,$modelId, $fileDownloadId)
    {
        $request->validate([
            'name' => 'required|string',
            'path' => 'required',
            'icon' => 'required',
            'model_id' => 'required',
        ]);
        try {
            $file = FileDownload::query()
                ->where('uuid', $fileDownloadId)
                ->where('model_id', $modelId)
                ->firstOrFail();
            $data = $request->except('_token','_method');

             $update = $file->update([
                'uuid' => $file->uuid,
                'name' => $data['name'],
                 'path' => $data['path'],
                 'icon' => $data['icon'],
                'model_id' => $data['model_id'],
            ]);
            if ($update) {
                return response()->json([
                    'success' => true,
                    'message' => 'File Updated Successfully',
                ]);
            } else{
                return response()->json([
                    'success' => false,
                    'message' => 'File Updated Failed',
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
    public function destroy($brandId,$productId,$modelId, $fileDownloadId)
    {
        try {
            $file = FileDownload::query()
                ->where('uuid', $fileDownloadId)
                ->where('model_id', $modelId)
                ->firstOrFail();
            $file->delete();
            return response()->json([
                'success' => true,
                'message' => 'File Deleted Successfully',
            ]);
        }catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
