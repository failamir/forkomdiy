<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreDataUmumRequest;
use App\Http\Requests\UpdateDataUmumRequest;
use App\Http\Resources\Admin\DataUmumResource;
use App\Models\DataUmum;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataUmumApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('data_umum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataUmumResource(DataUmum::with(['ketua', 'perizinan', 'province', 'owner'])->get());
    }

    public function store(StoreDataUmumRequest $request)
    {
        $dataUmum = DataUmum::create($request->validated());

        foreach ($request->input('data_umum_lampiran', []) as $file) {
            $dataUmum->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('data_umum_lampiran');
        }

        return (new DataUmumResource($dataUmum))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DataUmum $dataUmum)
    {
        abort_if(Gate::denies('data_umum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataUmumResource($dataUmum->load(['ketua', 'perizinan', 'province', 'owner']));
    }

    public function update(UpdateDataUmumRequest $request, DataUmum $dataUmum)
    {
        $dataUmum->update($request->validated());

        if (count($dataUmum->data_umum_lampiran) > 0) {
            foreach ($dataUmum->data_umum_lampiran as $media) {
                if (!in_array($media->file_name, $request->input('data_umum_lampiran', []))) {
                    $media->delete();
                }
            }
        }
        $media = $dataUmum->data_umum_lampiran->pluck('file_name')->toArray();
        foreach ($request->input('data_umum_lampiran', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $dataUmum->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('data_umum_lampiran');
            }
        }

        return (new DataUmumResource($dataUmum))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DataUmum $dataUmum)
    {
        abort_if(Gate::denies('data_umum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataUmum->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
