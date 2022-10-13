<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\DataKhusu;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataKhusuController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = DataKhusu::class;
    }

    public function index()
    {
        abort_if(Gate::denies('data_khusu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-khusu.index');
    }

    public function create()
    {
        abort_if(Gate::denies('data_khusu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-khusu.create');
    }

    public function edit(DataKhusu $dataKhusu)
    {
        abort_if(Gate::denies('data_khusu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-khusu.edit', compact('dataKhusu'));
    }

    public function show(DataKhusu $dataKhusu)
    {
        abort_if(Gate::denies('data_khusu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataKhusu->load('dataDaerah', 'dataCabang', 'dataSubWilayahLain');

        return view('admin.data-khusu.show', compact('dataKhusu'));
    }
}
