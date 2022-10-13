@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.dataKhusu.title_singular') }}:
                    {{ trans('cruds.dataKhusu.fields.id') }}
                    {{ $dataKhusu->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.dataKhusu.fields.id') }}
                            </th>
                            <td>
                                {{ $dataKhusu->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataKhusu.fields.nama_daerah') }}
                            </th>
                            <td>
                                {{ $dataKhusu->nama_daerah }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataKhusu.fields.data_daerah') }}
                            </th>
                            <td>
                                @if($dataKhusu->dataDaerah)
                                    <span class="badge badge-relationship">{{ $dataKhusu->dataDaerah->nama_daerah ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataKhusu.fields.jumlah_anggota_daerah') }}
                            </th>
                            <td>
                                {{ $dataKhusu->jumlah_anggota_daerah }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataKhusu.fields.nama_cabang') }}
                            </th>
                            <td>
                                {{ $dataKhusu->nama_cabang }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataKhusu.fields.jumlah_anggota_cabang') }}
                            </th>
                            <td>
                                {{ $dataKhusu->jumlah_anggota_cabang }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataKhusu.fields.data_cabang') }}
                            </th>
                            <td>
                                @if($dataKhusu->dataCabang)
                                    <span class="badge badge-relationship">{{ $dataKhusu->dataCabang->nama_cabang ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataKhusu.fields.nama_sub_wilayah') }}
                            </th>
                            <td>
                                {{ $dataKhusu->nama_sub_wilayah }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataKhusu.fields.jumlah_anggota_sub_wilayah') }}
                            </th>
                            <td>
                                {{ $dataKhusu->jumlah_anggota_sub_wilayah }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataKhusu.fields.data_sub_wilayah_lain') }}
                            </th>
                            <td>
                                @if($dataKhusu->dataSubWilayahLain)
                                    <span class="badge badge-relationship">{{ $dataKhusu->dataSubWilayahLain->nama_wilayah ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('data_khusu_edit')
                    <a href="{{ route('admin.data-khusus.edit', $dataKhusu) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.data-khusus.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection