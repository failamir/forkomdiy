<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Village;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VillageController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = Village::class;
    }

    public function index()
    {
        abort_if(Gate::denies('village_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.village.index');
    }

    public function create()
    {
        abort_if(Gate::denies('village_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.village.create');
    }

    public function edit(Village $village)
    {
        abort_if(Gate::denies('village_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.village.edit', compact('village'));
    }

    public function show(Village $village)
    {
        abort_if(Gate::denies('village_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $village->load('owner');

        return view('admin.village.show', compact('village'));
    }
}
