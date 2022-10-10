<form wire:submit.prevent="submit" class="pt-3">

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
    <div class="form-group {{ $errors->has('dataStakeholder.kontak_di_stakeholder') ? 'invalid' : '' }}">
        <label class="form-label" for="kontak_di_stakeholder">{{ trans('cruds.dataStakeholder.fields.kontak_di_stakeholder') }}</label>
        <input class="form-control" type="text" name="kontak_di_stakeholder" id="kontak_di_stakeholder" wire:model.defer="dataStakeholder.kontak_di_stakeholder">
        <div class="validation-message">
            {{ $errors->first('dataStakeholder.kontak_di_stakeholder') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataStakeholder.fields.kontak_di_stakeholder_helper') }}
        </div>
    </div>
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
    <div class="form-group {{ $errors->has('dataStakeholder.lama_kerjasama') ? 'invalid' : '' }}">
        <label class="form-label" for="lama_kerjasama">{{ trans('cruds.dataStakeholder.fields.lama_kerjasama') }}</label>
        <input class="form-control" type="text" name="lama_kerjasama" id="lama_kerjasama" wire:model.defer="dataStakeholder.lama_kerjasama">
        <div class="validation-message">
            {{ $errors->first('dataStakeholder.lama_kerjasama') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataStakeholder.fields.lama_kerjasama_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.data_stakeholder_lampiran') ? 'invalid' : '' }}">
        <label class="form-label" for="lampiran">{{ trans('cruds.dataStakeholder.fields.lampiran') }}</label>
        <x-dropzone id="lampiran" name="lampiran" action="{{ route('admin.data-stakeholders.storeMedia') }}" collection-name="data_stakeholder_lampiran" max-file-size="20" max-files="1" />
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