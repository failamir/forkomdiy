<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('dataUmum.nama_lembaga') ? 'invalid' : '' }}">
        <label class="form-label" for="nama_lembaga">{{ trans('cruds.dataUmum.fields.nama_lembaga') }}</label>
        <input class="form-control" type="text" name="nama_lembaga" id="nama_lembaga" wire:model.defer="dataUmum.nama_lembaga">
        <div class="validation-message">
            {{ $errors->first('dataUmum.nama_lembaga') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataUmum.fields.nama_lembaga_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataUmum.ketua_id') ? 'invalid' : '' }}">
        <label class="form-label" for="ketua">{{ trans('cruds.dataUmum.fields.ketua') }}</label>
        <x-select-list class="form-control" id="ketua" name="ketua" :options="$this->listsForFields['ketua']" wire:model="dataUmum.ketua_id" />
        <div class="validation-message">
            {{ $errors->first('dataUmum.ketua_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataUmum.fields.ketua_helper') }}
        </div>
        Jika belum ada di list, Tambah <button type="button" onclick="myFunction()">-> disini</button>
        
    </div>
    <div id="myDIV" style="display: none;" class="drop-shadow-lg">
        <hr>
        <div class="form-group {{ $errors->has('dataUmum.ketua_name') ? 'invalid' : '' }}">
            <label class="form-label" for="ketua_name">{{ trans('cruds.dataUmum.fields.ketua_name') }}</label>
            <input class="form-control" type="text" name="ketua_name" id="ketua_name" wire:model.defer="dataUmum.ketua_name">
            <div class="validation-message">
                {{ $errors->first('dataUmum.ketua_name') }}
            </div>
            {{-- <div class="help-block">
                {{ trans('cruds.dataUmum.fields.ketua_name') }}
            </div> --}}
        </div>
        <div class="form-group {{ $errors->has('dataUmum.ketua_id') ? 'invalid' : '' }}">
            <label class="form-label" for="periode">{{ trans('cruds.dataUmum.fields.periode') }}</label>
            <input class="form-control" type="text" name="periode" id="periode" wire:model.defer="dataUmum.periode">
            <div class="validation-message">
                {{ $errors->first('dataUmum.periode') }}
            </div>
            {{-- <div class="help-block">
                {{ trans('cruds.dataUmum.fields.periode') }}
            </div> --}}
            <hr>
        </div>
        <hr>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <div class="form-group {{ $errors->has('dataUmum.sekretariat_wilayah') ? 'invalid' : '' }}">
        <label class="form-label" for="sekretariat_wilayah">{{ trans('cruds.dataUmum.fields.sekretariat_wilayah') }}</label>
        <input class="form-control" type="text" name="sekretariat_wilayah" id="sekretariat_wilayah" wire:model.defer="dataUmum.sekretariat_wilayah">
        <div class="validation-message">
            {{ $errors->first('dataUmum.sekretariat_wilayah') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataUmum.fields.sekretariat_wilayah_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataUmum.website') ? 'invalid' : '' }}">
        <label class="form-label" for="website">{{ trans('cruds.dataUmum.fields.website') }}</label>
        <input class="form-control" type="text" name="website" id="website" wire:model.defer="dataUmum.website">
        <div class="validation-message">
            {{ $errors->first('dataUmum.website') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataUmum.fields.website_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataUmum.email') ? 'invalid' : '' }}">
        <label class="form-label" for="email">{{ trans('cruds.dataUmum.fields.email') }}</label>
        <input class="form-control" type="text" name="email" id="email" wire:model.defer="dataUmum.email">
        <div class="validation-message">
            {{ $errors->first('dataUmum.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataUmum.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataUmum.telp') ? 'invalid' : '' }}">
        <label class="form-label" for="telp">{{ trans('cruds.dataUmum.fields.telp') }}</label>
        <input class="form-control" type="text" name="telp" id="telp" wire:model.defer="dataUmum.telp">
        <div class="validation-message">
            {{ $errors->first('dataUmum.telp') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataUmum.fields.telp_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataUmum.whats_app') ? 'invalid' : '' }}">
        <label class="form-label" for="whats_app">{{ trans('cruds.dataUmum.fields.whats_app') }}</label>
        <input class="form-control" type="text" name="whats_app" id="whats_app" wire:model.defer="dataUmum.whats_app">
        <div class="validation-message">
            {{ $errors->first('dataUmum.whats_app') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataUmum.fields.whats_app_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataUmum.lingkup_kegiatan') ? 'invalid' : '' }}">
        <label class="form-label" for="lingkup_kegiatan">{{ trans('cruds.dataUmum.fields.lingkup_kegiatan') }}</label>
        <input class="form-control" type="text" name="lingkup_kegiatan" id="lingkup_kegiatan" wire:model.defer="dataUmum.lingkup_kegiatan">
        <div class="validation-message">
            {{ $errors->first('dataUmum.lingkup_kegiatan') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataUmum.fields.lingkup_kegiatan_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataUmum.perizinan_id') ? 'invalid' : '' }}">
        <label class="form-label" for="perizinan">{{ trans('cruds.dataUmum.fields.perizinan') }}</label>
        <x-select-list class="form-control" id="perizinan" name="perizinan" :options="$this->listsForFields['perizinan']" wire:model="dataUmum.perizinan_id" />
        <div class="validation-message">
            {{ $errors->first('dataUmum.perizinan_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataUmum.fields.perizinan_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataUmum.jumlah_anggota') ? 'invalid' : '' }}">
        <label class="form-label" for="jumlah_anggota">{{ trans('cruds.dataUmum.fields.jumlah_anggota') }}</label>
        <input class="form-control" type="number" name="jumlah_anggota" id="jumlah_anggota" wire:model.defer="dataUmum.jumlah_anggota" step="1">
        <div class="validation-message">
            {{ $errors->first('dataUmum.jumlah_anggota') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataUmum.fields.jumlah_anggota_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.data_umum_lampiran') ? 'invalid' : '' }}">
        <label class="form-label" for="lampiran">{{ trans('cruds.dataUmum.fields.lampiran') }}</label>
        <x-dropzone id="lampiran" name="lampiran" action="{{ route('admin.data-umums.storeMedia') }}" collection-name="data_umum_lampiran" max-file-size="52" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.data_umum_lampiran') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataUmum.fields.lampiran_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataUmum.province_id') ? 'invalid' : '' }}">
        <label class="form-label" for="province">{{ trans('cruds.dataUmum.fields.province') }}</label>
        <x-select-list class="form-control" id="province" name="province" :options="$this->listsForFields['province']" wire:model="dataUmum.province_id" />
        <div class="validation-message">
            {{ $errors->first('dataUmum.province_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataUmum.fields.province_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.data-umums.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>