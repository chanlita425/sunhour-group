<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    public function index()
    {
        return view('frontends.partnerships.index');
    }
}
