<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('regency.id_province') ? 'invalid' : '' }}">
        <label class="form-label" for="id_province">{{ trans('cruds.regency.fields.id_province') }}</label>
        <input class="form-control" type="text" name="id_province" id="id_province" wire:model.defer="regency.id_province">
        <div class="validation-message">
            {{ $errors->first('regency.id_province') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.regency.fields.id_province_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('regency.id_regency') ? 'invalid' : '' }}">
        <label class="form-label" for="id_regency">{{ trans('cruds.regency.fields.id_regency') }}</label>
        <input class="form-control" type="text" name="id_regency" id="id_regency" wire:model.defer="regency.id_regency">
        <div class="validation-message">
            {{ $errors->first('regency.id_regency') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.regency.fields.id_regency_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('regency.regency_name') ? 'invalid' : '' }}">
        <label class="form-label" for="regency_name">{{ trans('cruds.regency.fields.regency_name') }}</label>
        <input class="form-control" type="text" name="regency_name" id="regency_name" wire:model.defer="regency.regency_name">
        <div class="validation-message">
            {{ $errors->first('regency.regency_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.regency.fields.regency_name_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.regencies.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>