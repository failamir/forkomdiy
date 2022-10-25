@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.village.title_singular') }}:
                    {{ trans('cruds.village.fields.id') }}
                    {{ $village->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.village.fields.id') }}
                            </th>
                            <td>
                                {{ $village->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.village.fields.id_district') }}
                            </th>
                            <td>
                                {{ $village->id_district }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.village.fields.id_village') }}
                            </th>
                            <td>
                                {{ $village->id_village }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.village.fields.village_name') }}
                            </th>
                            <td>
                                {{ $village->village_name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('village_edit')
                    <a href="{{ route('admin.villages.edit', $village) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.villages.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection