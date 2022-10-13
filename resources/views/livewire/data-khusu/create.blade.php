<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('dataKhusu.nama_daerah') ? 'invalid' : '' }}">
        <label class="form-label" for="nama_daerah">{{ trans('cruds.dataKhusu.fields.nama_daerah') }}</label>
        <input class="form-control" type="text" name="nama_daerah" id="nama_daerah" wire:model.defer="dataKhusu.nama_daerah">
        <div class="validation-message">
            {{ $errors->first('dataKhusu.nama_daerah') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataKhusu.fields.nama_daerah_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataKhusu.data_daerah_id') ? 'invalid' : '' }}">
        <label class="form-label" for="data_daerah">{{ trans('cruds.dataKhusu.fields.data_daerah') }}</label>
        <x-select-list class="form-control" id="data_daerah" name="data_daerah" :options="$this->listsForFields['data_daerah']" wire:model="dataKhusu.data_daerah_id" />
        <div class="validation-message">
            {{ $errors->first('dataKhusu.data_daerah_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataKhusu.fields.data_daerah_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataKhusu.jumlah_anggota_daerah') ? 'invalid' : '' }}">
        <label class="form-label" for="jumlah_anggota_daerah">{{ trans('cruds.dataKhusu.fields.jumlah_anggota_daerah') }}</label>
        <input class="form-control" type="number" name="jumlah_anggota_daerah" id="jumlah_anggota_daerah" wire:model.defer="dataKhusu.jumlah_anggota_daerah" step="1">
        <div class="validation-message">
            {{ $errors->first('dataKhusu.jumlah_anggota_daerah') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataKhusu.fields.jumlah_anggota_daerah_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataKhusu.nama_cabang') ? 'invalid' : '' }}">
        <label class="form-label" for="nama_cabang">{{ trans('cruds.dataKhusu.fields.nama_cabang') }}</label>
        <input class="form-control" type="text" name="nama_cabang" id="nama_cabang" wire:model.defer="dataKhusu.nama_cabang">
        <div class="validation-message">
            {{ $errors->first('dataKhusu.nama_cabang') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataKhusu.fields.nama_cabang_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataKhusu.jumlah_anggota_cabang') ? 'invalid' : '' }}">
        <label class="form-label" for="jumlah_anggota_cabang">{{ trans('cruds.dataKhusu.fields.jumlah_anggota_cabang') }}</label>
        <input class="form-control" type="number" name="jumlah_anggota_cabang" id="jumlah_anggota_cabang" wire:model.defer="dataKhusu.jumlah_anggota_cabang" step="1">
        <div class="validation-message">
            {{ $errors->first('dataKhusu.jumlah_anggota_cabang') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataKhusu.fields.jumlah_anggota_cabang_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataKhusu.data_cabang_id') ? 'invalid' : '' }}">
        <label class="form-label" for="data_cabang">{{ trans('cruds.dataKhusu.fields.data_cabang') }}</label>
        <x-select-list class="form-control" id="data_cabang" name="data_cabang" :options="$this->listsForFields['data_cabang']" wire:model="dataKhusu.data_cabang_id" />
        <div class="validation-message">
            {{ $errors->first('dataKhusu.data_cabang_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataKhusu.fields.data_cabang_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataKhusu.nama_sub_wilayah') ? 'invalid' : '' }}">
        <label class="form-label" for="nama_sub_wilayah">{{ trans('cruds.dataKhusu.fields.nama_sub_wilayah') }}</label>
        <input class="form-control" type="text" name="nama_sub_wilayah" id="nama_sub_wilayah" wire:model.defer="dataKhusu.nama_sub_wilayah">
        <div class="validation-message">
            {{ $errors->first('dataKhusu.nama_sub_wilayah') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataKhusu.fields.nama_sub_wilayah_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataKhusu.jumlah_anggota_sub_wilayah') ? 'invalid' : '' }}">
        <label class="form-label" for="jumlah_anggota_sub_wilayah">{{ trans('cruds.dataKhusu.fields.jumlah_anggota_sub_wilayah') }}</label>
        <input class="form-control" type="number" name="jumlah_anggota_sub_wilayah" id="jumlah_anggota_sub_wilayah" wire:model.defer="dataKhusu.jumlah_anggota_sub_wilayah" step="1">
        <div class="validation-message">
            {{ $errors->first('dataKhusu.jumlah_anggota_sub_wilayah') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataKhusu.fields.jumlah_anggota_sub_wilayah_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataKhusu.data_sub_wilayah_lain_id') ? 'invalid' : '' }}">
        <label class="form-label" for="data_sub_wilayah_lain">{{ trans('cruds.dataKhusu.fields.data_sub_wilayah_lain') }}</label>
        <x-select-list class="form-control" id="data_sub_wilayah_lain" name="data_sub_wilayah_lain" :options="$this->listsForFields['data_sub_wilayah_lain']" wire:model="dataKhusu.data_sub_wilayah_lain_id" />
        <div class="validation-message">
            {{ $errors->first('dataKhusu.data_sub_wilayah_lain_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataKhusu.fields.data_sub_wilayah_lain_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.data-khusus.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>