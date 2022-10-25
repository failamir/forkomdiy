@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.regency.title_singular') }}:
                    {{ trans('cruds.regency.fields.id') }}
                    {{ $regency->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.regency.fields.id') }}
                            </th>
                            <td>
                                {{ $regency->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.regency.fields.id_province') }}
                            </th>
                            <td>
                                {{ $regency->id_province }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.regency.fields.id_regency') }}
                            </th>
                            <td>
                                {{ $regency->id_regency }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.regency.fields.regency_name') }}
                            </th>
                            <td>
                                {{ $regency->regency_name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('regency_edit')
                    <a href="{{ route('admin.regencies.edit', $regency) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.regencies.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection