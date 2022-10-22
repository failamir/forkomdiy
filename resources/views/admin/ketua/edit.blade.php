@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.ketua.title_singular') }}:
                    {{ trans('cruds.ketua.fields.id') }}
                    {{ $ketua->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('ketua.edit', [$ketua])
        </div>
    </div>
</div>
@endsection