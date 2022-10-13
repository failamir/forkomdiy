<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataWilayahRequest;
use App\Http\Requests\UpdateDataWilayahRequest;
use App\Http\Resources\Admin\DataWilayahResource;
use App\Models\DataWilayah;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataWilayahApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_wilayah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataWilayahResource(DataWilayah::with(['daerah'])->get());
    }

    public function store(StoreDataWilayahRequest $request)
    {
        $dataWilayah = DataWilayah::create($request->validated());

        return (new DataWilayahResource($dataWilayah))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DataWilayah $dataWilayah)
    {
        abort_if(Gate::denies('data_wilayah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataWilayahResource($dataWilayah->load(['daerah']));
    }

    public function update(UpdateDataWilayahRequest $request, DataWilayah $dataWilayah)
    {
        $dataWilayah->update($request->validated());

        return (new DataWilayahResource($dataWilayah))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DataWilayah $dataWilayah)
    {
        abort_if(Gate::denies('data_wilayah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataWilayah->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
