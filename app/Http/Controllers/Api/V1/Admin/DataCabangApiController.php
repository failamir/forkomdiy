<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataCabangRequest;
use App\Http\Requests\UpdateDataCabangRequest;
use App\Http\Resources\Admin\DataCabangResource;
use App\Models\DataCabang;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataCabangApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_cabang_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataCabangResource(DataCabang::with(['daerah'])->get());
    }

    public function store(StoreDataCabangRequest $request)
    {
        $dataCabang = DataCabang::create($request->validated());

        return (new DataCabangResource($dataCabang))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DataCabang $dataCabang)
    {
        abort_if(Gate::denies('data_cabang_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataCabangResource($dataCabang->load(['daerah']));
    }

    public function update(UpdateDataCabangRequest $request, DataCabang $dataCabang)
    {
        $dataCabang->update($request->validated());

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
