@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.dataStakeholder.title_singular') }}:
                    {{ trans('cruds.dataStakeholder.fields.id') }}
                    {{ $dataStakeholder->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('data-stakeholder.edit', [$dataStakeholder])
        </div>
    </div>
</div>
@endsection