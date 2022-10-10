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

        return new DataStakeholderResource(DataStakeholder::all());
    }

    public function store(StoreDataStakeholderRequest $request)
    {
        $dataStakeholder = DataStakeholder::create($request->validated());

        if ($request->input('data_stakeholder_lampiran', false)) {
            $dataStakeholder->addMedia(storage_path('tmp/uploads/' . basename($request->input('data_stakeholder_lampiran'))))->toMediaCollection('data_stakeholder_lampiran');
        }

        return (new DataStakeholderResource($dataStakeholder))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DataStakeholder $dataStakeholder)
    {
        abort_if(Gate::denies('data_stakeholder_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataStakeholderResource($dataStakeholder);
    }

    public function update(UpdateDataStakeholderRequest $request, DataStakeholder $dataStakeholder)
    {
        $dataStakeholder->update($request->validated());

        if ($request->input('data_stakeholder_lampiran', false)) {
            if (!$dataStakeholder->data_stakeholder_lampiran || $request->input('data_stakeholder_lampiran') !== $dataStakeholder->data_stakeholder_lampiran->file_name) {
                if ($dataStakeholder->data_stakeholder_lampiran) {
                    $dataStakeholder->data_stakeholder_lampiran->delete();
                }
                $dataStakeholder->addMedia(storage_path('tmp/uploads/' . basename($request->input('data_stakeholder_lampiran'))))->toMediaCollection('data_stakeholder_lampiran');
            }
        } elseif ($dataStakeholder->data_stakeholder_lampiran) {
            $dataStakeholder->data_stakeholder_lampiran->delete();
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
