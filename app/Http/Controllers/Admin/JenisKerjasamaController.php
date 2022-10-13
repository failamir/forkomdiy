<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\JenisKerjasama;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JenisKerjasamaController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = JenisKerjasama::class;
    }

    public function index()
    {
        abort_if(Gate::denies('jenis_kerjasama_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jenis-kerjasama.index');
    }

    public function create()
    {
        abort_if(Gate::denies('jenis_kerjasama_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jenis-kerjasama.create');
    }

    public function edit(JenisKerjasama $jenisKerjasama)
    {
        abort_if(Gate::denies('jenis_kerjasama_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jenis-kerjasama.edit', compact('jenisKerjasama'));
    }

    public function show(JenisKerjasama $jenisKerjasama)
    {
        abort_if(Gate::denies('jenis_kerjasama_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jenis-kerjasama.show', compact('jenisKerjasama'));
    }
}
