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

        $dataDaerah->load('regency', 'owner');

        return view('admin.data-daerah.show', compact('dataDaerah'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['data_daerah_create', 'data_daerah_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model                     = new DataDaerah();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
