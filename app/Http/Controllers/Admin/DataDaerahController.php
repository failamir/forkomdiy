<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\DataDaerah;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataDaerahController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = DataDaerah::class;
    }

    public function index()
    {
        abort_if(Gate::denies('data_daerah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-daerah.index');
    }

    public function create()
    {
        abort_if(Gate::denies('data_daerah_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-daerah.create');
    }

    public function edit(DataDaerah $dataDaerah)
    {
        abort_if(Gate::denies('data_daerah_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-daerah.edit', compact('dataDaerah'));
    }

    public function show(DataDaerah $dataDaerah)
    {
        abort_if(Gate::denies('data_daerah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-daerah.show', compact('dataDaerah'));
    }
}
