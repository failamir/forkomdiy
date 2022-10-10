@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.perizinan.title_singular') }}:
                    {{ trans('cruds.perizinan.fields.id') }}
                    {{ $perizinan->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('perizinan.edit', [$perizinan])
        </div>
    </div>
</div>
@endsection