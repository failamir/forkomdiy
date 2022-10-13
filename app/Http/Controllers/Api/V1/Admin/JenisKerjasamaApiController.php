<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJenisKerjasamaRequest;
use App\Http\Requests\UpdateJenisKerjasamaRequest;
use App\Http\Resources\Admin\JenisKerjasamaResource;
use App\Models\JenisKerjasama;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JenisKerjasamaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jenis_kerjasama_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JenisKerjasamaResource(JenisKerjasama::all());
    }

    public function store(StoreJenisKerjasamaRequest $request)
    {
        $jenisKerjasama = JenisKerjasama::create($request->validated());

        return (new JenisKerjasamaResource($jenisKerjasama))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(JenisKerjasama $jenisKerjasama)
    {
        abort_if(Gate::denies('jenis_kerjasama_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JenisKerjasamaResource($jenisKerjasama);
    }

    public function update(UpdateJenisKerjasamaRequest $request, JenisKerjasama $jenisKerjasama)
    {
        $jenisKerjasama->update($request->validated());

        return (new JenisKerjasamaResource($jenisKerjasama))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(JenisKerjasama $jenisKerjasama)
    {
        abort_if(Gate::denies('jenis_kerjasama_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jenisKerjasama->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
