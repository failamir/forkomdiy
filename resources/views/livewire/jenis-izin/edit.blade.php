<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('jenisIzin.nama_jenis') ? 'invalid' : '' }}">
        <label class="form-label" for="nama_jenis">{{ trans('cruds.jenisIzin.fields.nama_jenis') }}</label>
        <input class="form-control" type="text" name="nama_jenis" id="nama_jenis" wire:model.defer="jenisIzin.nama_jenis">
        <div class="validation-message">
            {{ $errors->first('jenisIzin.nama_jenis') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.jenisIzin.fields.nama_jenis_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.jenis-izins.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>