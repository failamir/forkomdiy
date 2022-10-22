<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('ketua.ketua_id') ? 'invalid' : '' }}">
        <label class="form-label" for="ketua">{{ trans('cruds.ketua.fields.ketua') }}</label>
        <x-select-list class="form-control" id="ketua" name="ketua" :options="$this->listsForFields['ketua']" wire:model="ketua.ketua_id" />
        <div class="validation-message">
            {{ $errors->first('ketua.ketua_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ketua.fields.ketua_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('ketua.periode') ? 'invalid' : '' }}">
        <label class="form-label" for="periode">{{ trans('cruds.ketua.fields.periode') }}</label>
        <input class="form-control" type="text" name="periode" id="periode" wire:model.defer="ketua.periode">
        <div class="validation-message">
            {{ $errors->first('ketua.periode') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ketua.fields.periode_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.ketuas.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>