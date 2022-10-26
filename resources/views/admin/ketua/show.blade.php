@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.ketua.title_singular') }}:
                    {{ trans('cruds.ketua.fields.id') }}
                    {{ $ketua->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.ketua.fields.id') }}
                            </th>
                            <td>
                                {{ $ketua->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ketua.fields.ketua') }}
                            </th>
                            <td>
                                @if($ketua->ketua)
                                    <span class="badge badge-relationship">{{ $ketua->ketua->contact_first_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ketua.fields.name') }}
                            </th>
                            <td>
                                {{ $ketua->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ketua.fields.periode') }}
                            </th>
                            <td>
                                {{ $ketua->periode }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('ketua_edit')
                    <a href="{{ route('admin.ketuas.edit', $ketua) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.ketuas.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection