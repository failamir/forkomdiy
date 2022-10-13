<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataDaerahRequest;
use App\Http\Requests\UpdateDataDaerahRequest;
use App\Http\Resources\Admin\DataDaerahResource;
use App\Models\DataDaerah;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataDaerahApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_daerah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataDaerahResource(DataDaerah::all());
    }

    public function store(StoreDataDaerahRequest $request)
    {
        $dataDaerah = DataDaerah::create($request->validated());

        return (new DataDaerahResource($dataDaerah))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DataDaerah $dataDaerah)
    {
        abort_if(Gate::denies('data_daerah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataDaerahResource($dataDaerah);
    }

    public function update(UpdateDataDaerahRequest $request, DataDaerah $dataDaerah)
    {
        $dataDaerah->update($request->validated());

        return (new DataDaerahResource($dataDaerah))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DataDaerah $dataDaerah)
    {
        abort_if(Gate::denies('data_daerah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataDaerah->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
