<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ketua;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KetuaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ketua_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ketua.index');
    }

    public function create()
    {
        abort_if(Gate::denies('ketua_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ketua.create');
    }

    public function edit(Ketua $ketua)
    {
        abort_if(Gate::denies('ketua_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ketua.edit', compact('ketua'));
    }

    public function show(Ketua $ketua)
    {
        abort_if(Gate::denies('ketua_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ketua->load('ketua');

        return view('admin.ketua.show', compact('ketua'));
    }
}
