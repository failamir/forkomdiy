@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.province.title_singular') }}:
                    {{ trans('cruds.province.fields.id') }}
                    {{ $province->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.province.fields.id') }}
                            </th>
                            <td>
                                {{ $province->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.province.fields.id_province') }}
                            </th>
                            <td>
                                {{ $province->id_province }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.province.fields.province_name') }}
                            </th>
                            <td>
                                {{ $province->province_name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('province_edit')
                    <a href="{{ route('admin.provinces.edit', $province) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.provinces.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection