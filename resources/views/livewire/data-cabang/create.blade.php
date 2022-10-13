<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('dataCabang.nama_cabang') ? 'invalid' : '' }}">
        <label class="form-label" for="nama_cabang">{{ trans('cruds.dataCabang.fields.nama_cabang') }}</label>
        <input class="form-control" type="text" name="nama_cabang" id="nama_cabang" wire:model.defer="dataCabang.nama_cabang">
        <div class="validation-message">
            {{ $errors->first('dataCabang.nama_cabang') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataCabang.fields.nama_cabang_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataCabang.daerah_id') ? 'invalid' : '' }}">
        <label class="form-label" for="daerah">{{ trans('cruds.dataCabang.fields.daerah') }}</label>
        <x-select-list class="form-control" id="daerah" name="daerah" :options="$this->listsForFields['daerah']" wire:model="dataCabang.daerah_id" />
        <div class="validation-message">
            {{ $errors->first('dataCabang.daerah_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataCabang.fields.daerah_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.data-cabangs.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>