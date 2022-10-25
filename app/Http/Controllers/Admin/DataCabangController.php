<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\DataCabang;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataCabangController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = DataCabang::class;
    }

    public function index()
    {
        abort_if(Gate::denies('data_cabang_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-cabang.index');
    }

    public function create()
    {
        abort_if(Gate::denies('data_cabang_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-cabang.create');
    }

    public function edit(DataCabang $dataCabang)
    {
        abort_if(Gate::denies('data_cabang_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.data-cabang.edit', compact('dataCabang'));
    }

    public function show(DataCabang $dataCabang)
    {
        abort_if(Gate::denies('data_cabang_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataCabang->load('district', 'owner');

        return view('admin.data-cabang.show', compact('dataCabang'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['data_cabang_create', 'data_cabang_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model                     = new DataCabang();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
