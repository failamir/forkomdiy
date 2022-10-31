<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Village;

class StateController extends Controller
{
    public function index()
    {
        $states = State::whereHas('country', function ($query) {
            $query->whereId(request()->input('id_province', 0));
        })->pluck('name', 'id');

        return response()->json($states);
    }

    public function villages()
    {
        $villages = Village::whereHas('city', function ($query) {
            $query->whereId(request()->input('id_district', 0));
        })->pluck('name', 'id');
        // $villages = Village::where('id_district', request()->input('id_district'))
        // ->get();

        return response()->json($villages);
    }
}
