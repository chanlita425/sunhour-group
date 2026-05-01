<?php

namespace App\Http\Controllers;

use App\Models\FAQs;
use Illuminate\Http\Request;

class FAQsController extends Controller
{
    public function index()
    {
        $data = FAQs::orderBy('id')->paginate(30);
        return view('admin.faqs.index', compact('data'));
    }

    public function store(Request $request)
    {
        $faq = FAQs::create([
            'q_english' => $request->q_english,
            'a_english' => $request->a_english,
            'q_khmer'   => $request->q_khmer,
            'a_khmer'   => $request->a_khmer,
            'q_china'   => $request->q_china,
            'a_china'   => $request->a_china,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'FAQ created successfully!',
            'data' => $faq
        ]);
    }

    public function show($id)
    {
        $faq = FAQs::find($id);

        if (!$faq) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found!'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $faq
        ]);
    }

    public function update(Request $request, $id)
    {
        $faq = FAQs::find($id);

        if (!$faq) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found!'
            ]);
        }

        $faq->update([
            'q_english' => $request->q_english,
            'a_english' => $request->a_english,
            'q_khmer'   => $request->q_khmer,
            'a_khmer'   => $request->a_khmer,
            'q_china'   => $request->q_china,
            'a_china'   => $request->a_china,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'FAQ updated successfully!',
            'data' => $faq
        ]);
    }

    public function destroy($id)
    {
        $faq = FAQs::find($id);

        if (!$faq) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found!'
            ]);
        }

        $faq->delete();

        return response()->json([
            'success' => true,
            'message' => 'FAQ deleted successfully!'
        ]);
    }
}
