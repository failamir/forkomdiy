<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('perizinan.jenis_izin') ? 'invalid' : '' }}">
        <label class="form-label" for="jenis_izin">{{ trans('cruds.perizinan.fields.jenis_izin') }}</label>
        <input class="form-control" type="text" name="jenis_izin" id="jenis_izin" wire:model.defer="perizinan.jenis_izin">
        <div class="validation-message">
            {{ $errors->first('perizinan.jenis_izin') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.perizinan.fields.jenis_izin_helper') }}
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
    <div class="form-group {{ $errors->has('perizinan.masa_berlaku') ? 'invalid' : '' }}">
        <label class="form-label" for="masa_berlaku">{{ trans('cruds.perizinan.fields.masa_berlaku') }}</label>
        <x-date-picker class="form-control" wire:model="perizinan.masa_berlaku" id="masa_berlaku" name="masa_berlaku" picker="date" />
        <div class="validation-message">
            {{ $errors->first('perizinan.masa_berlaku') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.perizinan.fields.masa_berlaku_helper') }}
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