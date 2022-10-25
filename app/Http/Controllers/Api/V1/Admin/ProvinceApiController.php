<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProvinceRequest;
use App\Http\Requests\UpdateProvinceRequest;
use App\Http\Resources\Admin\ProvinceResource;
use App\Models\Province;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProvinceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('province_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProvinceResource(Province::with(['owner'])->get());
    }

    public function store(StoreProvinceRequest $request)
    {
        $province = Province::create($request->validated());

        return (new ProvinceResource($province))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Province $province)
    {
        abort_if(Gate::denies('province_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProvinceResource($province->load(['owner']));
    }

    public function update(UpdateProvinceRequest $request, Province $province)
    {
        $province->update($request->validated());

        return (new ProvinceResource($province))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Province $province)
    {
        abort_if(Gate::denies('province_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $province->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
