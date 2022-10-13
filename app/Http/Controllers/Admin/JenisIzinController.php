<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisIzin;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JenisIzinController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jenis_izin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jenis-izin.index');
    }

    public function create()
    {
        abort_if(Gate::denies('jenis_izin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jenis-izin.create');
    }

    public function edit(JenisIzin $jenisIzin)
    {
        abort_if(Gate::denies('jenis_izin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jenis-izin.edit', compact('jenisIzin'));
    }

    public function show(JenisIzin $jenisIzin)
    {
        abort_if(Gate::denies('jenis_izin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jenis-izin.show', compact('jenisIzin'));
    }
}
