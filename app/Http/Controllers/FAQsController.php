<?php

namespace App\Http\Controllers;

use App\Models\FAQs;
use App\Models\Admin\Brand;
use App\Models\Admin\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FAQsController extends Controller
{
    public function index(Request $request)
    {
        $query = FAQs::with(['brand', 'category', 'product'])->orderBy('id');

        if ($request->filled('filter_brand')) {
            $query->where('brand_id', $request->filter_brand);
        }

        if ($request->filled('filter_type')) {
            if ($request->filter_type === 'model') {
                $query->whereNotNull('product_id');
            } else {
                $query->whereNull('product_id');
            }
        }

        $data       = $query->paginate(30)->withQueryString();
        $brands     = Brand::orderBy('name')->get(['uuid', 'name']);
        $products   = Product::orderBy('name')->get(['uuid', 'name', 'brand_id']);
        $categories = Category::orderBy('name')->get(['uuid', 'name', 'product_id']);

        return view('admin.faqs.index', compact('data', 'brands', 'products', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id'  => 'required|string',
            'q_english' => 'required|string',
            'a_english' => 'required|string',
        ]);

        // Display logic: category_id set → category level, else → product level
        $faq = FAQs::create([
            'brand_id'    => $request->brand_id,
            'category_id' => $request->category_id ?: null,
            'product_id'  => $request->product_id  ?: null,
            'q_english'   => $request->q_english,
            'a_english'   => $request->a_english,
            'q_khmer'     => $request->q_khmer,
            'a_khmer'     => $request->a_khmer,
            'q_china'     => $request->q_china,
            'a_china'     => $request->a_china,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'FAQ created successfully!',
            'data'    => $faq,
        ]);
    }

    public function show($id)
    {
        $faq = FAQs::with(['brand', 'category', 'product'])->find($id);

        if (!$faq) {
            return response()->json(['success' => false, 'message' => 'Data not found!']);
        }

        return response()->json([
            'success' => true,
            'data'    => array_merge($faq->toArray(), [
                'display_level' => $faq->display_level,
            ]),
        ]);
    }

    public function update(Request $request, $id)
    {
        $faq = FAQs::find($id);

        if (!$faq) {
            return response()->json(['success' => false, 'message' => 'Data not found!']);
        }

        $request->validate([
            'brand_id'  => 'required|string',
            'q_english' => 'required|string',
            'a_english' => 'required|string',
        ]);

        $faq->update([
            'brand_id'    => $request->brand_id,
            'category_id' => $request->category_id ?: null,
            'product_id'  => $request->product_id  ?: null,
            'q_english'   => $request->q_english,
            'a_english'   => $request->a_english,
            'q_khmer'     => $request->q_khmer,
            'a_khmer'     => $request->a_khmer,
            'q_china'     => $request->q_china,
            'a_china'     => $request->a_china,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'FAQ updated successfully!',
            'data'    => $faq,
        ]);
    }

    public function destroy($id)
    {
        $faq = FAQs::find($id);

        if (!$faq) {
            return response()->json(['success' => false, 'message' => 'Data not found!']);
        }

        $faq->delete();

        return response()->json([
            'success' => true,
            'message' => 'FAQ deleted successfully!',
        ]);
    }
}
