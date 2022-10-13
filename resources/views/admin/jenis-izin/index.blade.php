@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.jenisIzin.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('jenis_izin_create')
                    <a class="btn btn-indigo" href="{{ route('admin.jenis-izins.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.jenisIzin.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('jenis-izin.index')

    </div>
</div>
@endsection