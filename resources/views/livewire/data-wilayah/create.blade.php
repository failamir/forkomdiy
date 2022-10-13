<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('dataWilayah.nama_wilayah') ? 'invalid' : '' }}">
        <label class="form-label" for="nama_wilayah">{{ trans('cruds.dataWilayah.fields.nama_wilayah') }}</label>
        <input class="form-control" type="text" name="nama_wilayah" id="nama_wilayah" wire:model.defer="dataWilayah.nama_wilayah">
        <div class="validation-message">
            {{ $errors->first('dataWilayah.nama_wilayah') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataWilayah.fields.nama_wilayah_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataWilayah.daerah_id') ? 'invalid' : '' }}">
        <label class="form-label" for="daerah">{{ trans('cruds.dataWilayah.fields.daerah') }}</label>
        <x-select-list class="form-control" id="daerah" name="daerah" :options="$this->listsForFields['daerah']" wire:model="dataWilayah.daerah_id" />
        <div class="validation-message">
            {{ $errors->first('dataWilayah.daerah_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataWilayah.fields.daerah_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.data-wilayahs.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>