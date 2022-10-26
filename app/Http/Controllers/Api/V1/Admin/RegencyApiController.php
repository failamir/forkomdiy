<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegencyRequest;
use App\Http\Requests\UpdateRegencyRequest;
use App\Http\Resources\Admin\RegencyResource;
use App\Models\Regency;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegencyApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('regency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RegencyResource(Regency::with(['owner'])->get());
    }

    public function store(StoreRegencyRequest $request)
    {
        $regency = Regency::create($request->validated());

        return (new RegencyResource($regency))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Regency $regency)
    {
        abort_if(Gate::denies('regency_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RegencyResource($regency->load(['owner']));
    }

    public function update(UpdateRegencyRequest $request, Regency $regency)
    {
        $regency->update($request->validated());

        return (new RegencyResource($regency))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Regency $regency)
    {
        abort_if(Gate::denies('regency_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regency->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
