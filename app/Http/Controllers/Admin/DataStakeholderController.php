<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\DataStakeholder;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataStakeholderController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = DataStakeholder::class;
    }

    public function index()
    {
        abort_if(Gate::denies('data_stakeholder_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-stakeholder.index');
    }

    public function create()
    {
        abort_if(Gate::denies('data_stakeholder_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-stakeholder.create');
    }

    public function edit(DataStakeholder $dataStakeholder)
    {
        abort_if(Gate::denies('data_stakeholder_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-stakeholder.edit', compact('dataStakeholder'));
    }

    public function show(DataStakeholder $dataStakeholder)
    {
        abort_if(Gate::denies('data_stakeholder_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataStakeholder->load('owner');

        return view('admin.data-stakeholder.show', compact('dataStakeholder'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['data_stakeholder_create', 'data_stakeholder_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model                     = new DataStakeholder();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
