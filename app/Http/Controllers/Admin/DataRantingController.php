<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataRanting;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataRantingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_ranting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-ranting.index');
    }

    public function create()
    {
        abort_if(Gate::denies('data_ranting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-ranting.create');
    }

    public function edit(DataRanting $dataRanting)
    {
        abort_if(Gate::denies('data_ranting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-ranting.edit', compact('dataRanting'));
    }

    public function show(DataRanting $dataRanting)
    {
        abort_if(Gate::denies('data_ranting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataRanting->load('village');

        return view('admin.data-ranting.show', compact('dataRanting'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['data_ranting_create', 'data_ranting_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model                     = new DataRanting();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
