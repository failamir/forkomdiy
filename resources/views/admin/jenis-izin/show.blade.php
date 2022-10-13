@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.jenisIzin.title_singular') }}:
                    {{ trans('cruds.jenisIzin.fields.id') }}
                    {{ $jenisIzin->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.jenisIzin.fields.id') }}
                            </th>
                            <td>
                                {{ $jenisIzin->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.jenisIzin.fields.nama_jenis') }}
                            </th>
                            <td>
                                {{ $jenisIzin->nama_jenis }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('jenis_izin_edit')
                    <a href="{{ route('admin.jenis-izins.edit', $jenisIzin) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.jenis-izins.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection