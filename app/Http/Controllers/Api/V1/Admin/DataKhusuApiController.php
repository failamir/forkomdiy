<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataKhusuRequest;
use App\Http\Requests\UpdateDataKhusuRequest;
use App\Http\Resources\Admin\DataKhusuResource;
use App\Models\DataKhusu;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataKhusuApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_khusu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataKhusuResource(DataKhusu::with(['dataDaerah', 'dataCabang', 'dataSubWilayahLain'])->get());
    }

    public function store(StoreDataKhusuRequest $request)
    {
        $dataKhusu = DataKhusu::create($request->validated());

        return (new DataKhusuResource($dataKhusu))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DataKhusu $dataKhusu)
    {
        abort_if(Gate::denies('data_khusu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataKhusuResource($dataKhusu->load(['dataDaerah', 'dataCabang', 'dataSubWilayahLain']));
    }

    public function update(UpdateDataKhusuRequest $request, DataKhusu $dataKhusu)
    {
        $dataKhusu->update($request->validated());

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
