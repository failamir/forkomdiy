@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.province.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('province_create')
                    <a class="btn btn-indigo" href="{{ route('admin.provinces.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.province.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('province.index')

    </div>
</div>
@endsection