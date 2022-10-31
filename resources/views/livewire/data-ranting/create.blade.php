<form wire:submit.prevent="submit" class="pt-3">

    {{-- <div class="form-group {{ $errors->has('dataRanting.village_id') ? 'invalid' : '' }}">
        <label class="form-label" for="village">{{ trans('cruds.dataRanting.fields.village') }}</label>
        <x-select-list class="form-control" id="village" name="village" :options="$this->listsForFields['village']" wire:model="dataRanting.village_id" />
        <div class="validation-message">
            {{ $errors->first('dataRanting.village_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataRanting.fields.village_helper') }}
        </div>
    </div> --}}
    @livewire('country-state-ranting', ['selectedCountry' => 3376])
    <div class="form-group {{ $errors->has('dataRanting.nama_ketua') ? 'invalid' : '' }}">
        <label class="form-label" for="nama_ketua">{{ trans('cruds.dataRanting.fields.nama_ketua') }}</label>
        <input class="form-control" type="text" name="nama_ketua" id="nama_ketua" wire:model.defer="dataRanting.nama_ketua">
        <div class="validation-message">
            {{ $errors->first('dataRanting.nama_ketua') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataRanting.fields.nama_ketua_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataRanting.kontak_hp_wa') ? 'invalid' : '' }}">
        <label class="form-label" for="kontak_hp_wa">{{ trans('cruds.dataRanting.fields.kontak_hp_wa') }}</label>
        <input class="form-control" type="text" name="kontak_hp_wa" id="kontak_hp_wa" wire:model.defer="dataRanting.kontak_hp_wa">
        <div class="validation-message">
            {{ $errors->first('dataRanting.kontak_hp_wa') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataRanting.fields.kontak_hp_wa_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dataRanting.jumlah_anggota') ? 'invalid' : '' }}">
        <label class="form-label" for="jumlah_anggota">{{ trans('cruds.dataRanting.fields.jumlah_anggota') }}</label>
        <input class="form-control" type="number" name="jumlah_anggota" id="jumlah_anggota" wire:model.defer="dataRanting.jumlah_anggota" step="1">
        <div class="validation-message">
            {{ $errors->first('dataRanting.jumlah_anggota') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataRanting.fields.jumlah_anggota_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.data_ranting_lampiran') ? 'invalid' : '' }}">
        <label class="form-label" for="lampiran">{{ trans('cruds.dataRanting.fields.lampiran') }}</label>
        <x-dropzone id="lampiran" name="lampiran" action="{{ route('admin.data-rantings.storeMedia') }}" collection-name="data_ranting_lampiran" max-file-size="20" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.data_ranting_lampiran') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dataRanting.fields.lampiran_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.data-rantings.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#id_regency').change(function () {
                var $state = $('#id_regency');
                $.ajax({
                    url: "{{ url('/states') }}",
                    data: {
                        id_regency: $(this).val()
                    },
                    success: function (data) {
                        $state.html('<option value="" selected>Choose state</option>');
                        $.each(data, function (id, value) {
                            $state.append('<option value="' + id + '">' + value + '</option>');
                        });
                    }
                });

                $('#id_regency, #city_id').val("");
                $('#state').removeClass('d-none');

            });

            $('#id_regency').change(function () {
                var $city = $('#city_id');
                $.ajax({
                    url: "{{ url('/cities') }}",
                    data: {
                        id_regency: $(this).val()
                    },
                    success: function (data) {
                        console.log(data);
                        $city.html('<option value="" selected>Choose city</option>');
                        $.each(data, function (id, value) {
                            $city.append('<option value="' + id + '">' + value + '</option>');
                        });
                    }
                });
                $('#city').removeClass('d-none');
            });

            $('#id_district').change(function () {
                var $district = $('#district_id');
                $.ajax({
                    url: "{{ url('/village') }}",
                    data: {
                        id_district: $(this).val()
                    },
                    success: function (data) {
                        
                        $district.html('<option value="" selected>Choose Village</option>');
                        $.each(data, function (id, value) {
                            $district.append('<option value="' + id + '">' + value + '</option>');
                        });
                    }
                });
                
                $('#district').removeClass('d-none');
            });
        });
    </script>
@endsection