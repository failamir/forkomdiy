@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.jenisIzin.title_singular') }}:
                    {{ trans('cruds.jenisIzin.fields.id') }}
                    {{ $jenisIzin->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('jenis-izin.edit', [$jenisIzin])
        </div>
    </div>
</div>
@endsection