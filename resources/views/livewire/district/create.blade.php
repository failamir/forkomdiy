<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('district.id_regency') ? 'invalid' : '' }}">
        <label class="form-label" for="id_regency">{{ trans('cruds.district.fields.id_regency') }}</label>
        <input class="form-control" type="text" name="id_regency" id="id_regency" wire:model.defer="district.id_regency">
        <div class="validation-message">
            {{ $errors->first('district.id_regency') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.district.fields.id_regency_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('district.id_district') ? 'invalid' : '' }}">
        <label class="form-label" for="id_district">{{ trans('cruds.district.fields.id_district') }}</label>
        <input class="form-control" type="text" name="id_district" id="id_district" wire:model.defer="district.id_district">
        <div class="validation-message">
            {{ $errors->first('district.id_district') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.district.fields.id_district_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('district.district_name') ? 'invalid' : '' }}">
        <label class="form-label" for="district_name">{{ trans('cruds.district.fields.district_name') }}</label>
        <input class="form-control" type="text" name="district_name" id="district_name" wire:model.defer="district.district_name">
        <div class="validation-message">
            {{ $errors->first('district.district_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.district.fields.district_name_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.districts.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>