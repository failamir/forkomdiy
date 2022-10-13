<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\DataUmum;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataUmumController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = DataUmum::class;
    }

    public function index()
    {
        abort_if(Gate::denies('data_umum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-umum.index');
    }

    public function create()
    {
        abort_if(Gate::denies('data_umum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-umum.create');
    }

    public function edit(DataUmum $dataUmum)
    {
        abort_if(Gate::denies('data_umum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-umum.edit', compact('dataUmum'));
    }

    public function show(DataUmum $dataUmum)
    {
        abort_if(Gate::denies('data_umum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataUmum->load('ketua', 'perizinan');

        return view('admin.data-umum.show', compact('dataUmum'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['data_umum_create', 'data_umum_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model                     = new DataUmum();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
