@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.dataKhusu.title_singular') }}:
                    {{ trans('cruds.dataKhusu.fields.id') }}
                    {{ $dataKhusu->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('data-khusu.edit', [$dataKhusu])
        </div>
    </div>
</div>
@endsection