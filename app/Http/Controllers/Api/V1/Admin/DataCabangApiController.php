<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreDataCabangRequest;
use App\Http\Requests\UpdateDataCabangRequest;
use App\Http\Resources\Admin\DataCabangResource;
use App\Models\DataCabang;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataCabangApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('data_cabang_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataCabangResource(DataCabang::with(['district', 'owner'])->get());
    }

    public function store(StoreDataCabangRequest $request)
    {
        $dataCabang = DataCabang::create($request->validated());

        foreach ($request->input('data_cabang_lampiran', []) as $file) {
            $dataCabang->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('data_cabang_lampiran');
        }

        return (new DataCabangResource($dataCabang))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DataCabang $dataCabang)
    {
        abort_if(Gate::denies('data_cabang_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataCabangResource($dataCabang->load(['district', 'owner']));
    }

    public function update(UpdateDataCabangRequest $request, DataCabang $dataCabang)
    {
        $dataCabang->update($request->validated());

        if (count($dataCabang->data_cabang_lampiran) > 0) {
            foreach ($dataCabang->data_cabang_lampiran as $media) {
                if (!in_array($media->file_name, $request->input('data_cabang_lampiran', []))) {
                    $media->delete();
                }
            }
        }
        $media = $dataCabang->data_cabang_lampiran->pluck('file_name')->toArray();
        foreach ($request->input('data_cabang_lampiran', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $dataCabang->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('data_cabang_lampiran');
            }
        }

        return (new DataCabangResource($dataCabang))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DataCabang $dataCabang)
    {
        abort_if(Gate::denies('data_cabang_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataCabang->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
