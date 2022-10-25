@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.dataRanting.title_singular') }}:
                    {{ trans('cruds.dataRanting.fields.id') }}
                    {{ $dataRanting->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.dataRanting.fields.id') }}
                            </th>
                            <td>
                                {{ $dataRanting->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataRanting.fields.village') }}
                            </th>
                            <td>
                                @if($dataRanting->village)
                                    <span class="badge badge-relationship">{{ $dataRanting->village->village_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataRanting.fields.nama_ketua') }}
                            </th>
                            <td>
                                {{ $dataRanting->nama_ketua }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataRanting.fields.kontak_hp_wa') }}
                            </th>
                            <td>
                                {{ $dataRanting->kontak_hp_wa }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataRanting.fields.jumlah_anggota') }}
                            </th>
                            <td>
                                {{ $dataRanting->jumlah_anggota }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataRanting.fields.lampiran') }}
                            </th>
                            <td>
                                @foreach($dataRanting->lampiran as $key => $entry)
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
                @can('data_ranting_edit')
                    <a href="{{ route('admin.data-rantings.edit', $dataRanting) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.data-rantings.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection