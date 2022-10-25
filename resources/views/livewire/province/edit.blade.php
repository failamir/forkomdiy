<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('province.id_province') ? 'invalid' : '' }}">
        <label class="form-label" for="id_province">{{ trans('cruds.province.fields.id_province') }}</label>
        <input class="form-control" type="text" name="id_province" id="id_province" wire:model.defer="province.id_province">
        <div class="validation-message">
            {{ $errors->first('province.id_province') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.province.fields.id_province_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('province.province_name') ? 'invalid' : '' }}">
        <label class="form-label" for="province_name">{{ trans('cruds.province.fields.province_name') }}</label>
        <input class="form-control" type="text" name="province_name" id="province_name" wire:model.defer="province.province_name">
        <div class="validation-message">
            {{ $errors->first('province.province_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.province.fields.province_name_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.provinces.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>