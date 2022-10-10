@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.perizinan.title_singular') }}:
                    {{ trans('cruds.perizinan.fields.id') }}
                    {{ $perizinan->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.perizinan.fields.id') }}
                            </th>
                            <td>
                                {{ $perizinan->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.perizinan.fields.jenis_izin') }}
                            </th>
                            <td>
                                {{ $perizinan->jenis_izin }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.perizinan.fields.instansi_penerbit') }}
                            </th>
                            <td>
                                {{ $perizinan->instansi_penerbit }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.perizinan.fields.nomor_izin') }}
                            </th>
                            <td>
                                {{ $perizinan->nomor_izin }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.perizinan.fields.masa_berlaku') }}
                            </th>
                            <td>
                                {{ $perizinan->masa_berlaku }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.perizinan.fields.lampiran_file') }}
                            </th>
                            <td>
                                @foreach($perizinan->lampiran_file as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('perizinan_edit')
                    <a href="{{ route('admin.perizinans.edit', $perizinan) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.perizinans.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection