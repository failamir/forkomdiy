<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('dataDaerah.regency_id') ? 'invalid' : '' }}">
        <label class="form-label" for="regency">{{ trans('cruds.dataDaerah.fields.regency') }}</label>
        <x-select-list class="form-control" id="regency" name="regency" :options="$this->listsForFields['regency']" wire:model="dataDaerah.regency_id" />
        <div class="validation-message">
            {{ $errors->first('dataDaerah.regency_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataDaerah.fields.regency_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataDaerah.nama_ketua') ? 'invalid' : '' }}">
        <label class="form-label" for="nama_ketua">{{ trans('cruds.dataDaerah.fields.nama_ketua') }}</label>
        <input class="form-control" type="text" name="nama_ketua" id="nama_ketua" wire:model.defer="dataDaerah.nama_ketua">
        <div class="validation-message">
            {{ $errors->first('dataDaerah.nama_ketua') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataDaerah.fields.nama_ketua_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataDaerah.kontak_hp_wa') ? 'invalid' : '' }}">
        <label class="form-label" for="kontak_hp_wa">{{ trans('cruds.dataDaerah.fields.kontak_hp_wa') }}</label>
        <input class="form-control" type="text" name="kontak_hp_wa" id="kontak_hp_wa" wire:model.defer="dataDaerah.kontak_hp_wa">
        <div class="validation-message">
            {{ $errors->first('dataDaerah.kontak_hp_wa') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataDaerah.fields.kontak_hp_wa_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataDaerah.jumlah_anggota') ? 'invalid' : '' }}">
        <label class="form-label" for="jumlah_anggota">{{ trans('cruds.dataDaerah.fields.jumlah_anggota') }}</label>
        <input class="form-control" type="number" name="jumlah_anggota" id="jumlah_anggota" wire:model.defer="dataDaerah.jumlah_anggota" step="1">
        <div class="validation-message">
            {{ $errors->first('dataDaerah.jumlah_anggota') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataDaerah.fields.jumlah_anggota_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.data_daerah_lampiran') ? 'invalid' : '' }}">
        <label class="form-label" for="lampiran">{{ trans('cruds.dataDaerah.fields.lampiran') }}</label>
        <x-dropzone id="lampiran" name="lampiran" action="{{ route('admin.data-daerahs.storeMedia') }}" collection-name="data_daerah_lampiran" max-file-size="20" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.data_daerah_lampiran') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataDaerah.fields.lampiran_helper') }}
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