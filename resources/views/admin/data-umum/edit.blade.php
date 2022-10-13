@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.dataUmum.title_singular') }}:
                    {{ trans('cruds.dataUmum.fields.id') }}
                    {{ $dataUmum->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('data-umum.edit', [$dataUmum])
        </div>
    </div>
</div>
@endsection