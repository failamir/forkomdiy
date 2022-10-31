@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.dataCabang.title_singular') }}:
                    {{ trans('cruds.dataCabang.fields.id') }}
                    {{ $dataCabang->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.dataCabang.fields.id') }}
                            </th>
                            <td>
                                {{ $dataCabang->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataCabang.fields.district') }}
                            </th>
                            <td>
                                @if($dataCabang->district)
                                    <span class="badge badge-relationship">{{ $dataCabang->district->district_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataCabang.fields.nama_ketua') }}
                            </th>
                            <td>
                                {{ $dataCabang->nama_ketua }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataCabang.fields.kontak_hp_wa') }}
                            </th>
                            <td>
                                {{ $dataCabang->kontak_hp_wa }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataCabang.fields.jumlah_anggota') }}
                            </th>
                            <td>
                                {{ $dataCabang->jumlah_anggota }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataCabang.fields.lampiran') }}
                            </th>
                            <td>
                                @foreach($dataCabang->lampiran as $key => $entry)
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
                    <a href="/admin/data-rantings/1"> Depok    </a>
                </table>
            </div>
            <div class="form-group">
                @can('data_cabang_edit')
                    <a href="{{ route('admin.data-cabangs.edit', $dataCabang) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.data-cabangs.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection