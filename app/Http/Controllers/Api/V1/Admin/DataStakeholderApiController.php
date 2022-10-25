<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreDataStakeholderRequest;
use App\Http\Requests\UpdateDataStakeholderRequest;
use App\Http\Resources\Admin\DataStakeholderResource;
use App\Models\DataStakeholder;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataStakeholderApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('data_stakeholder_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataStakeholderResource(DataStakeholder::with(['owner'])->get());
    }

    public function store(StoreDataStakeholderRequest $request)
    {
        $dataStakeholder = DataStakeholder::create($request->validated());

        foreach ($request->input('data_stakeholder_lampiran', []) as $file) {
            $dataStakeholder->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('data_stakeholder_lampiran');
        }

        return (new DataStakeholderResource($dataStakeholder))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DataStakeholder $dataStakeholder)
    {
        abort_if(Gate::denies('data_stakeholder_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataStakeholderResource($dataStakeholder->load(['owner']));
    }

    public function update(UpdateDataStakeholderRequest $request, DataStakeholder $dataStakeholder)
    {
        $dataStakeholder->update($request->validated());

        if (count($dataStakeholder->data_stakeholder_lampiran) > 0) {
            foreach ($dataStakeholder->data_stakeholder_lampiran as $media) {
                if (!in_array($media->file_name, $request->input('data_stakeholder_lampiran', []))) {
                    $media->delete();
                }
            }
        }
        $media = $dataStakeholder->data_stakeholder_lampiran->pluck('file_name')->toArray();
        foreach ($request->input('data_stakeholder_lampiran', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $dataStakeholder->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('data_stakeholder_lampiran');
            }
        }

        return (new DataStakeholderResource($dataStakeholder))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DataStakeholder $dataStakeholder)
    {
        abort_if(Gate::denies('data_stakeholder_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataStakeholder->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
