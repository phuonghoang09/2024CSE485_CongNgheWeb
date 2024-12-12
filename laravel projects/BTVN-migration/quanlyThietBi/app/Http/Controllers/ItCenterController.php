<?php

namespace App\Http\Controllers;

use App\Models\ItCenter;

class ItCenterController extends Controller
{
    public function index()
    {
        $itCenters = ItCenter::with('devices')->get();
        return view('it_centers.index', compact('itCenters'));
    }
}
