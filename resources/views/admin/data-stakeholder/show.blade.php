@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.dataStakeholder.title_singular') }}:
                    {{ trans('cruds.dataStakeholder.fields.id') }}
                    {{ $dataStakeholder->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.dataStakeholder.fields.id') }}
                            </th>
                            <td>
                                {{ $dataStakeholder->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataStakeholder.fields.nama_stakeholder') }}
                            </th>
                            <td>
                                {{ $dataStakeholder->nama_stakeholder }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataStakeholder.fields.daerah') }}
                            </th>
                            <td>
                                @if($dataStakeholder->daerah)
                                    <span class="badge badge-relationship">{{ $dataStakeholder->daerah->nama_daerah ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataStakeholder.fields.kontak_di_lembaga') }}
                            </th>
                            <td>
                                @if($dataStakeholder->kontakDiLembaga)
                                    <span class="badge badge-relationship">{{ $dataStakeholder->kontakDiLembaga->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataStakeholder.fields.kontak_di_stakeholder') }}
                            </th>
                            <td>
                                @if($dataStakeholder->kontakDiStakeholder)
                                    <span class="badge badge-relationship">{{ $dataStakeholder->kontakDiStakeholder->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataStakeholder.fields.jenis_kerjasama') }}
                            </th>
                            <td>
                                @if($dataStakeholder->jenisKerjasama)
                                    <span class="badge badge-relationship">{{ $dataStakeholder->jenisKerjasama->nama_jenis ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataStakeholder.fields.jangkauan_kerjasama') }}
                            </th>
                            <td>
                                {{ $dataStakeholder->jangkauan_kerjasama }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataStakeholder.fields.lama_kerjasama') }}
                            </th>
                            <td>
                                {{ $dataStakeholder->lama_kerjasama_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataStakeholder.fields.lampiran') }}
                            </th>
                            <td>
                                @foreach($dataStakeholder->lampiran as $key => $entry)
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
                @can('data_stakeholder_edit')
                    <a href="{{ route('admin.data-stakeholders.edit', $dataStakeholder) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.data-stakeholders.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection