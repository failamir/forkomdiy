@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.dataDaerah.title_singular') }}:
                    {{ trans('cruds.dataDaerah.fields.id') }}
                    {{ $dataDaerah->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.dataDaerah.fields.id') }}
                            </th>
                            <td>
                                {{ $dataDaerah->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataDaerah.fields.regency') }}
                            </th>
                            <td>
                                @if($dataDaerah->regency)
                                    <span class="badge badge-relationship">{{ $dataDaerah->regency->regency_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataDaerah.fields.nama_ketua') }}
                            </th>
                            <td>
                                {{ $dataDaerah->nama_ketua }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataDaerah.fields.kontak_hp_wa') }}
                            </th>
                            <td>
                                {{ $dataDaerah->kontak_hp_wa }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataDaerah.fields.jumlah_anggota') }}
                            </th>
                            <td>
                                {{ $dataDaerah->jumlah_anggota }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataDaerah.fields.lampiran') }}
                            </th>
                            <td>
                                @foreach($dataDaerah->lampiran as $key => $entry)
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

                <table class="table table-view">
                    <a href="/admin/data-cabangs/1"> Condong Catur    </a>
                </table>
            </div>
            <div class="form-group">
                @can('data_daerah_edit')
                    <a href="{{ route('admin.data-daerahs.edit', $dataDaerah) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.data-daerahs.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection