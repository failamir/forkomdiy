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
    <div class="form-group {{ $errors->has('dataStakeholder.daerah_id') ? 'invalid' : '' }}">
        <label class="form-label" for="daerah">{{ trans('cruds.dataStakeholder.fields.daerah') }}</label>
        <x-select-list class="form-control" id="daerah" name="daerah" :options="$this->listsForFields['daerah']" wire:model="dataStakeholder.daerah_id" />
        <div class="validation-message">
            {{ $errors->first('dataStakeholder.daerah_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataStakeholder.fields.daerah_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataStakeholder.kontak_di_lembaga_id') ? 'invalid' : '' }}">
        <label class="form-label" for="kontak_di_lembaga">{{ trans('cruds.dataStakeholder.fields.kontak_di_lembaga') }}</label>
        <x-select-list class="form-control" id="kontak_di_lembaga" name="kontak_di_lembaga" :options="$this->listsForFields['kontak_di_lembaga']" wire:model="dataStakeholder.kontak_di_lembaga_id" />
        <div class="validation-message">
            {{ $errors->first('dataStakeholder.kontak_di_lembaga_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataStakeholder.fields.kontak_di_lembaga_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataStakeholder.kontak_di_stakeholder_id') ? 'invalid' : '' }}">
        <label class="form-label" for="kontak_di_stakeholder">{{ trans('cruds.dataStakeholder.fields.kontak_di_stakeholder') }}</label>
        <x-select-list class="form-control" id="kontak_di_stakeholder" name="kontak_di_stakeholder" :options="$this->listsForFields['kontak_di_stakeholder']" wire:model="dataStakeholder.kontak_di_stakeholder_id" />
        <div class="validation-message">
            {{ $errors->first('dataStakeholder.kontak_di_stakeholder_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataStakeholder.fields.kontak_di_stakeholder_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataStakeholder.jenis_kerjasama_id') ? 'invalid' : '' }}">
        <label class="form-label" for="jenis_kerjasama">{{ trans('cruds.dataStakeholder.fields.jenis_kerjasama') }}</label>
        <x-select-list class="form-control" id="jenis_kerjasama" name="jenis_kerjasama" :options="$this->listsForFields['jenis_kerjasama']" wire:model="dataStakeholder.jenis_kerjasama_id" />
        <div class="validation-message">
            {{ $errors->first('dataStakeholder.jenis_kerjasama_id') }}
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
        <label class="form-label">{{ trans('cruds.dataStakeholder.fields.lama_kerjasama') }}</label>
        <select class="form-control" wire:model="dataStakeholder.lama_kerjasama">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['lama_kerjasama'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('dataStakeholder.lama_kerjasama') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataStakeholder.fields.lama_kerjasama_helper') }}
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