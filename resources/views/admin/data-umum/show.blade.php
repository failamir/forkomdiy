@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.dataUmum.title_singular') }}:
                    {{ trans('cruds.dataUmum.fields.id') }}
                    {{ $dataUmum->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.dataUmum.fields.id') }}
                            </th>
                            <td>
                                {{ $dataUmum->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataUmum.fields.nama_lembaga') }}
                            </th>
                            <td>
                                {{ $dataUmum->nama_lembaga }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataUmum.fields.ketua') }}
                            </th>
                            <td>
                                @if($dataUmum->ketua)
                                    <span class="badge badge-relationship">{{ $dataUmum->ketua->nama_stakeholder ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataUmum.fields.sekretariat_wilayah') }}
                            </th>
                            <td>
                                {{ $dataUmum->sekretariat_wilayah }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataUmum.fields.website') }}
                            </th>
                            <td>
                                {{ $dataUmum->website }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataUmum.fields.email') }}
                            </th>
                            <td>
                                {{ $dataUmum->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataUmum.fields.telp') }}
                            </th>
                            <td>
                                {{ $dataUmum->telp }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataUmum.fields.whats_app') }}
                            </th>
                            <td>
                                {{ $dataUmum->whats_app }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataUmum.fields.lingkup_kegiatan') }}
                            </th>
                            <td>
                                {{ $dataUmum->lingkup_kegiatan }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataUmum.fields.perizinan') }}
                            </th>
                            <td>
                                @if($dataUmum->perizinan)
                                    <span class="badge badge-relationship">{{ $dataUmum->perizinan->nama_izin ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataUmum.fields.jumlah_anggota') }}
                            </th>
                            <td>
                                {{ $dataUmum->jumlah_anggota }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataUmum.fields.lampiran') }}
                            </th>
                            <td>
                                @foreach($dataUmum->lampiran as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dataUmum.fields.province') }}
                            </th>
                            <td>
                                @if($dataUmum->province)
                                    <span class="badge badge-relationship">{{ $dataUmum->province->province_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('data_umum_edit')
                    <a href="{{ route('admin.data-umums.edit', $dataUmum) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.data-umums.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection