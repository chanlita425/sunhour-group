<?php

namespace App\Http\Controllers;

use App\Models\Admin\ShowRoom;
use Illuminate\Http\Request;

class ShowRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = 'HDJDJLD';
        $brand = 'TOTO';
        $product = 'Tolet';
        $detail = '1';
        
        $loading = false;
        if($model === ''){
            $loading = true;
        }

        return view('admin.models.ShowRoom.index', compact('loading','model','brand','product','detail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowRoom $showRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShowRoom $showRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShowRoom $showRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShowRoom $showRoom)
    {
        //
    }
}
