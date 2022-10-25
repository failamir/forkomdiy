<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Regency;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegencyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('regency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.regency.index');
    }

    public function create()
    {
        abort_if(Gate::denies('regency_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.regency.create');
    }

    public function edit(Regency $regency)
    {
        abort_if(Gate::denies('regency_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.regency.edit', compact('regency'));
    }

    public function show(Regency $regency)
    {
        abort_if(Gate::denies('regency_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.regency.show', compact('regency'));
    }
}
