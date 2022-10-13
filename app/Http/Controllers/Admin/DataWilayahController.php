<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\DataWilayah;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataWilayahController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = DataWilayah::class;
    }

    public function index()
    {
        abort_if(Gate::denies('data_wilayah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-wilayah.index');
    }

    public function create()
    {
        abort_if(Gate::denies('data_wilayah_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-wilayah.create');
    }

    public function edit(DataWilayah $dataWilayah)
    {
        abort_if(Gate::denies('data_wilayah_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-wilayah.edit', compact('dataWilayah'));
    }

    public function show(DataWilayah $dataWilayah)
    {
        abort_if(Gate::denies('data_wilayah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataWilayah->load('daerah');

        return view('admin.data-wilayah.show', compact('dataWilayah'));
    }
}
