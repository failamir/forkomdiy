@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.dataCabang.title_singular') }}:
                    {{ trans('cruds.dataCabang.fields.id') }}
                    {{ $dataCabang->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.dataCabang.fields.id') }}
                            </th>
                            <td>
                                {{ $dataCabang->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataCabang.fields.nama_cabang') }}
                            </th>
                            <td>
                                {{ $dataCabang->nama_cabang }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataCabang.fields.daerah') }}
                            </th>
                            <td>
                                @if($dataCabang->daerah)
                                    <span class="badge badge-relationship">{{ $dataCabang->daerah->nama_daerah ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('data_cabang_edit')
                    <a href="{{ route('admin.data-cabangs.edit', $dataCabang) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.data-cabangs.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection