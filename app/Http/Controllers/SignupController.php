<?php

namespace App\Http\Controllers;

use App\Models\Signup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignupController extends Controller
{
    // ===== Show All =====
    public function index()
    {
        $data = Signup::orderBy('id', 'asc')->paginate(10);
        return view('admin.signup.index', compact('data'));
    }

    // ===== Store (From Modal Form) =====
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        Signup::create([
            'full_name' => $request->full_name,
            'company' => $request->company,
            'position' => $request->position,
            'phone' => $request->phone,
            'email' => $request->email,
            'specialty' => $request->specialty,
            'heard_from' => $request->heard_from,
            'consent' => $request->has('consent') ? 1 : 0,
        ]);

        return back()->with('success', 'Form submitted successfully!');
    }

    // ===== Edit API (for AJAX modal) =====
    public function edit($id)
    {
        return response()->json(Signup::findOrFail($id));
    }

    // ===== Update =====
    public function update(Request $request, $id)
    {
        $signup = Signup::findOrFail($id);

        $signup->update($request->all());

        return back()->with('success', 'Record updated successfully!');
    }

    // ===== Delete =====
    public function destroy($id)
    {
        Signup::findOrFail($id)->delete();
        return back()->with('success', 'Record deleted successfully!');
    }
}
