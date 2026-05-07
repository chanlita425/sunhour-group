<?php

namespace App\Http\Controllers;

use App\Models\Admin\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BrandController extends Controller
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
    public function index(Request $request)
    {
        // Start with a query builder instance
        $query = Brand::query();
        $user = auth()->user();

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
        $data = $query->paginate($validPerPage)->appends($request->except('page'));
        $data->getCollection()->transform(function ($item, $index) use ($data) {
            $item->auto_number = $index + 1 + ($data->currentPage() - 1) * $data->perPage();
            return $item;
        });
        $loading = $data->isEmpty();

        return view('admin.brands.index', compact('loading', 'data', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logoSvg' => 'required|string',
        ]);

        $post = Brand::create([
            'uuid' => $this->encodeIdToString(1),
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'logoSvg' => $request->logoSvg,
            'description' => $request->description ?? null,
        ]);

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Brand Created Successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Brand Not Created Successfully'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return response()->json([
            'success' => true,
            'data' => $brand
        ]);
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logoSvg' => 'required|string',
        ]);

        // Update the existing brand instance instead of creating a new one
        $updated = $brand->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'logoSvg' => $request->logoSvg,
            'description' => $request->description ?? null,
        ]);

        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'Brand Updated Successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Brand Not Updated Successfully'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        try {
            $brand->delete();

            return response()->json([
                'success' => true,
                'message' => 'Brand deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete brand'
            ], 500);
        }
    }
}
