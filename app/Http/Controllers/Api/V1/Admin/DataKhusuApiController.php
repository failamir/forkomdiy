<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreDataKhusuRequest;
use App\Http\Requests\UpdateDataKhusuRequest;
use App\Http\Resources\Admin\DataKhusuResource;
use App\Models\DataKhusu;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataKhusuApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('data_khusu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataKhusuResource(DataKhusu::with(['regency', 'owner'])->get());
    }

    public function store(StoreDataKhusuRequest $request)
    {
        $dataKhusu = DataKhusu::create($request->validated());

        foreach ($request->input('data_khusu_lampiran', []) as $file) {
            $dataKhusu->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('data_khusu_lampiran');
        }

        return (new DataKhusuResource($dataKhusu))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DataKhusu $dataKhusu)
    {
        abort_if(Gate::denies('data_khusu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataKhusuResource($dataKhusu->load(['regency', 'owner']));
    }

    public function update(UpdateDataKhusuRequest $request, DataKhusu $dataKhusu)
    {
        $dataKhusu->update($request->validated());

        if (count($dataKhusu->data_khusu_lampiran) > 0) {
            foreach ($dataKhusu->data_khusu_lampiran as $media) {
                if (!in_array($media->file_name, $request->input('data_khusu_lampiran', []))) {
                    $media->delete();
                }
            }
        }
        $media = $dataKhusu->data_khusu_lampiran->pluck('file_name')->toArray();
        foreach ($request->input('data_khusu_lampiran', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $dataKhusu->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('data_khusu_lampiran');
            }
        }

        return (new DataKhusuResource($dataKhusu))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DataKhusu $dataKhusu)
    {
        abort_if(Gate::denies('data_khusu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataKhusu->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
