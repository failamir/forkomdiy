<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('dataCabang.district_id') ? 'invalid' : '' }}">
        <label class="form-label" for="district">{{ trans('cruds.dataCabang.fields.district') }}</label>
        <x-select-list class="form-control" id="district" name="district" :options="$this->listsForFields['district']" wire:model="dataCabang.district_id" />
        <div class="validation-message">
            {{ $errors->first('dataCabang.district_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataCabang.fields.district_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataCabang.nama_ketua') ? 'invalid' : '' }}">
        <label class="form-label" for="nama_ketua">{{ trans('cruds.dataCabang.fields.nama_ketua') }}</label>
        <input class="form-control" type="text" name="nama_ketua" id="nama_ketua" wire:model.defer="dataCabang.nama_ketua">
        <div class="validation-message">
            {{ $errors->first('dataCabang.nama_ketua') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataCabang.fields.nama_ketua_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataCabang.kontak_hp_wa') ? 'invalid' : '' }}">
        <label class="form-label" for="kontak_hp_wa">{{ trans('cruds.dataCabang.fields.kontak_hp_wa') }}</label>
        <input class="form-control" type="text" name="kontak_hp_wa" id="kontak_hp_wa" wire:model.defer="dataCabang.kontak_hp_wa">
        <div class="validation-message">
            {{ $errors->first('dataCabang.kontak_hp_wa') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataCabang.fields.kontak_hp_wa_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataCabang.jumlah_anggota') ? 'invalid' : '' }}">
        <label class="form-label" for="jumlah_anggota">{{ trans('cruds.dataCabang.fields.jumlah_anggota') }}</label>
        <input class="form-control" type="number" name="jumlah_anggota" id="jumlah_anggota" wire:model.defer="dataCabang.jumlah_anggota" step="1">
        <div class="validation-message">
            {{ $errors->first('dataCabang.jumlah_anggota') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataCabang.fields.jumlah_anggota_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.data_cabang_lampiran') ? 'invalid' : '' }}">
        <label class="form-label" for="lampiran">{{ trans('cruds.dataCabang.fields.lampiran') }}</label>
        <x-dropzone id="lampiran" name="lampiran" action="{{ route('admin.data-cabangs.storeMedia') }}" collection-name="data_cabang_lampiran" max-file-size="20" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.data_cabang_lampiran') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataCabang.fields.lampiran_helper') }}
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