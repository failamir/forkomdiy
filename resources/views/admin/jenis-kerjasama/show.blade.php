@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.jenisKerjasama.title_singular') }}:
                    {{ trans('cruds.jenisKerjasama.fields.id') }}
                    {{ $jenisKerjasama->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.jenisKerjasama.fields.id') }}
                            </th>
                            <td>
                                {{ $jenisKerjasama->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.jenisKerjasama.fields.nama_jenis') }}
                            </th>
                            <td>
                                {{ $jenisKerjasama->nama_jenis }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('jenis_kerjasama_edit')
                    <a href="{{ route('admin.jenis-kerjasamas.edit', $jenisKerjasama) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.jenis-kerjasamas.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection