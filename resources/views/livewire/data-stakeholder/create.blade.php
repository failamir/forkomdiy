<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('dataStakeholder.jenis_kerjasama') ? 'invalid' : '' }}">
        <label class="form-label" for="jenis_kerjasama">{{ trans('cruds.dataStakeholder.fields.jenis_kerjasama') }}</label>
        <input class="form-control" type="text" name="jenis_kerjasama" id="jenis_kerjasama" wire:model.defer="dataStakeholder.jenis_kerjasama">
        <div class="validation-message">
            {{ $errors->first('dataStakeholder.jenis_kerjasama') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataStakeholder.fields.jenis_kerjasama_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataStakeholder.frekuensi_kerjasama') ? 'invalid' : '' }}">
        <label class="form-label" for="frekuensi_kerjasama">{{ trans('cruds.dataStakeholder.fields.frekuensi_kerjasama') }}</label>
        <input class="form-control" type="text" name="frekuensi_kerjasama" id="frekuensi_kerjasama" wire:model.defer="dataStakeholder.frekuensi_kerjasama">
        <div class="validation-message">
            {{ $errors->first('dataStakeholder.frekuensi_kerjasama') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataStakeholder.fields.frekuensi_kerjasama_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataStakeholder.mulai_kerjasama') ? 'invalid' : '' }}">
        <label class="form-label" for="mulai_kerjasama">{{ trans('cruds.dataStakeholder.fields.mulai_kerjasama') }}</label>
        <x-date-picker class="form-control" wire:model="dataStakeholder.mulai_kerjasama" id="mulai_kerjasama" name="mulai_kerjasama" picker="date" />
        <div class="validation-message">
            {{ $errors->first('dataStakeholder.mulai_kerjasama') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataStakeholder.fields.mulai_kerjasama_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataStakeholder.nama_lembaga_kerjasama') ? 'invalid' : '' }}">
        <label class="form-label" for="nama_lembaga_kerjasama">{{ trans('cruds.dataStakeholder.fields.nama_lembaga_kerjasama') }}</label>
        <input class="form-control" type="text" name="nama_lembaga_kerjasama" id="nama_lembaga_kerjasama" wire:model.defer="dataStakeholder.nama_lembaga_kerjasama">
        <div class="validation-message">
            {{ $errors->first('dataStakeholder.nama_lembaga_kerjasama') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataStakeholder.fields.nama_lembaga_kerjasama_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataStakeholder.nama_stakeholder') ? 'invalid' : '' }}">
        <label class="form-label" for="nama_stakeholder">{{ trans('cruds.dataStakeholder.fields.nama_stakeholder') }}</label>
        <input class="form-control" type="text" name="nama_stakeholder" id="nama_stakeholder" wire:model.defer="dataStakeholder.nama_stakeholder">
        <div class="validation-message">
            {{ $errors->first('dataStakeholder.nama_stakeholder') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataStakeholder.fields.nama_stakeholder_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataStakeholder.no_hp_wa_stakeholder') ? 'invalid' : '' }}">
        <label class="form-label" for="no_hp_wa_stakeholder">{{ trans('cruds.dataStakeholder.fields.no_hp_wa_stakeholder') }}</label>
        <input class="form-control" type="text" name="no_hp_wa_stakeholder" id="no_hp_wa_stakeholder" wire:model.defer="dataStakeholder.no_hp_wa_stakeholder">
        <div class="validation-message">
            {{ $errors->first('dataStakeholder.no_hp_wa_stakeholder') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataStakeholder.fields.no_hp_wa_stakeholder_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataStakeholder.kontak_di_lembaga') ? 'invalid' : '' }}">
        <label class="form-label" for="kontak_di_lembaga">{{ trans('cruds.dataStakeholder.fields.kontak_di_lembaga') }}</label>
        <input class="form-control" type="text" name="kontak_di_lembaga" id="kontak_di_lembaga" wire:model.defer="dataStakeholder.kontak_di_lembaga">
        <div class="validation-message">
            {{ $errors->first('dataStakeholder.kontak_di_lembaga') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataStakeholder.fields.kontak_di_lembaga_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataStakeholder.no_hp_wa_lembaga') ? 'invalid' : '' }}">
        <label class="form-label" for="no_hp_wa_lembaga">{{ trans('cruds.dataStakeholder.fields.no_hp_wa_lembaga') }}</label>
        <input class="form-control" type="text" name="no_hp_wa_lembaga" id="no_hp_wa_lembaga" wire:model.defer="dataStakeholder.no_hp_wa_lembaga">
        <div class="validation-message">
            {{ $errors->first('dataStakeholder.no_hp_wa_lembaga') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataStakeholder.fields.no_hp_wa_lembaga_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataStakeholder.jangkauan_kerjasama') ? 'invalid' : '' }}">
        <label class="form-label" for="jangkauan_kerjasama">{{ trans('cruds.dataStakeholder.fields.jangkauan_kerjasama') }}</label>
        <input class="form-control" type="text" name="jangkauan_kerjasama" id="jangkauan_kerjasama" wire:model.defer="dataStakeholder.jangkauan_kerjasama">
        <div class="validation-message">
            {{ $errors->first('dataStakeholder.jangkauan_kerjasama') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataStakeholder.fields.jangkauan_kerjasama_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.data_stakeholder_lampiran') ? 'invalid' : '' }}">
        <label class="form-label" for="lampiran">{{ trans('cruds.dataStakeholder.fields.lampiran') }}</label>
        <x-dropzone id="lampiran" name="lampiran" action="{{ route('admin.data-stakeholders.storeMedia') }}" collection-name="data_stakeholder_lampiran" max-file-size="52" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.data_stakeholder_lampiran') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataStakeholder.fields.lampiran_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.data-stakeholders.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>