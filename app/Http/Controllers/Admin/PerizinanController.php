<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perizinan;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PerizinanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('perizinan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perizinan.index');
    }

    public function create()
    {
        abort_if(Gate::denies('perizinan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perizinan.create');
    }

    public function edit(Perizinan $perizinan)
    {
        abort_if(Gate::denies('perizinan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perizinan.edit', compact('perizinan'));
    }

    public function show(Perizinan $perizinan)
    {
        abort_if(Gate::denies('perizinan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perizinan.show', compact('perizinan'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['perizinan_create', 'perizinan_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model                     = new Perizinan();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
