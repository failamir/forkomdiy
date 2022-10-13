<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('dataDaerah.nama_daerah') ? 'invalid' : '' }}">
        <label class="form-label" for="nama_daerah">{{ trans('cruds.dataDaerah.fields.nama_daerah') }}</label>
        <input class="form-control" type="text" name="nama_daerah" id="nama_daerah" wire:model.defer="dataDaerah.nama_daerah">
        <div class="validation-message">
            {{ $errors->first('dataDaerah.nama_daerah') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataDaerah.fields.nama_daerah_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.data-daerahs.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>