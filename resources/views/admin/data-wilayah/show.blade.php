@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.dataWilayah.title_singular') }}:
                    {{ trans('cruds.dataWilayah.fields.id') }}
                    {{ $dataWilayah->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.dataWilayah.fields.id') }}
                            </th>
                            <td>
                                {{ $dataWilayah->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataWilayah.fields.nama_wilayah') }}
                            </th>
                            <td>
                                {{ $dataWilayah->nama_wilayah }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataWilayah.fields.daerah') }}
                            </th>
                            <td>
                                @if($dataWilayah->daerah)
                                    <span class="badge badge-relationship">{{ $dataWilayah->daerah->nama_daerah ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('data_wilayah_edit')
                    <a href="{{ route('admin.data-wilayahs.edit', $dataWilayah) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.data-wilayahs.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection