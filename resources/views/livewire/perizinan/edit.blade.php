<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('perizinan.nama_izin') ? 'invalid' : '' }}">
        <label class="form-label" for="nama_izin">{{ trans('cruds.perizinan.fields.nama_izin') }}</label>
        <input class="form-control" type="text" name="nama_izin" id="nama_izin" wire:model.defer="perizinan.nama_izin">
        <div class="validation-message">
            {{ $errors->first('perizinan.nama_izin') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.perizinan.fields.nama_izin_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('perizinan.instansi_penerbit') ? 'invalid' : '' }}">
        <label class="form-label" for="instansi_penerbit">{{ trans('cruds.perizinan.fields.instansi_penerbit') }}</label>
        <input class="form-control" type="text" name="instansi_penerbit" id="instansi_penerbit" wire:model.defer="perizinan.instansi_penerbit">
        <div class="validation-message">
            {{ $errors->first('perizinan.instansi_penerbit') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.perizinan.fields.instansi_penerbit_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('perizinan.nomor_izin') ? 'invalid' : '' }}">
        <label class="form-label" for="nomor_izin">{{ trans('cruds.perizinan.fields.nomor_izin') }}</label>
        <input class="form-control" type="text" name="nomor_izin" id="nomor_izin" wire:model.defer="perizinan.nomor_izin">
        <div class="validation-message">
            {{ $errors->first('perizinan.nomor_izin') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.perizinan.fields.nomor_izin_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('perizinan.tanggal_dikeluarkan') ? 'invalid' : '' }}">
        <label class="form-label" for="tanggal_dikeluarkan">{{ trans('cruds.perizinan.fields.tanggal_dikeluarkan') }}</label>
        <x-date-picker class="form-control" wire:model="perizinan.tanggal_dikeluarkan" id="tanggal_dikeluarkan" name="tanggal_dikeluarkan" picker="date" />
        <div class="validation-message">
            {{ $errors->first('perizinan.tanggal_dikeluarkan') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.perizinan.fields.tanggal_dikeluarkan_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('perizinan.berlaku_sampai') ? 'invalid' : '' }}">
        <label class="form-label" for="berlaku_sampai">{{ trans('cruds.perizinan.fields.berlaku_sampai') }}</label>
        <input class="form-control" type="text" name="berlaku_sampai" id="berlaku_sampai" wire:model.defer="perizinan.berlaku_sampai">
        <div class="validation-message">
            {{ $errors->first('perizinan.berlaku_sampai') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.perizinan.fields.berlaku_sampai_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.perizinan_lampiran_file') ? 'invalid' : '' }}">
        <label class="form-label" for="lampiran_file">{{ trans('cruds.perizinan.fields.lampiran_file') }}</label>
        <x-dropzone id="lampiran_file" name="lampiran_file" action="{{ route('admin.perizinans.storeMedia') }}" collection-name="perizinan_lampiran_file" max-file-size="20" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.perizinan_lampiran_file') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.perizinan.fields.lampiran_file_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.perizinans.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>