<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::whereHas('state', function ($query) {
            $query->whereId(request()->input('id_regency', 0));
        })->pluck('province_name', 'id');

        return response()->json($cities);
    }
}
