@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.dataDaerah.title_singular') }}:
                    {{ trans('cruds.dataDaerah.fields.id') }}
                    {{ $dataDaerah->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('data-daerah.edit', [$dataDaerah])
        </div>
    </div>
</div>
@endsection