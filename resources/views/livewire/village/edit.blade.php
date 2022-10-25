<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('village.id_district') ? 'invalid' : '' }}">
        <label class="form-label" for="id_district">{{ trans('cruds.village.fields.id_district') }}</label>
        <input class="form-control" type="text" name="id_district" id="id_district" wire:model.defer="village.id_district">
        <div class="validation-message">
            {{ $errors->first('village.id_district') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.village.fields.id_district_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('village.id_village') ? 'invalid' : '' }}">
        <label class="form-label" for="id_village">{{ trans('cruds.village.fields.id_village') }}</label>
        <input class="form-control" type="text" name="id_village" id="id_village" wire:model.defer="village.id_village">
        <div class="validation-message">
            {{ $errors->first('village.id_village') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.village.fields.id_village_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('village.village_name') ? 'invalid' : '' }}">
        <label class="form-label" for="village_name">{{ trans('cruds.village.fields.village_name') }}</label>
        <input class="form-control" type="text" name="village_name" id="village_name" wire:model.defer="village.village_name">
        <div class="validation-message">
            {{ $errors->first('village.village_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.village.fields.village_name_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.villages.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>