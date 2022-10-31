<div>
    <div class="form-group row">
        <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Kabupaten') }}</label>
        {{-- @dump($countries) --}}
        <div class="col-md-6">
            <select wire:model="selectedCountry" class="form-control">
                <option value="" selected>Pilih Kabupaten</option>
                @foreach ($countries as $country)
                    {{-- @if ($country->id_regency == 3404)
                        <option value="{{ $country->id_regency }}" selected>{{ $country->regency_name }}</option>
                    @else --}}
                        <option value="{{ $country->id_regency }}">{{ $country->regency_name }}</option>
                    {{-- @endif --}}
                @endforeach
            </select>
        </div>
    </div>

    @if (!is_null($selectedCountry))
        <div class="form-group row">
            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('Kecamatan') }}</label>
            {{-- @dump($states) --}}
            <div class="col-md-6">
                <select wire:model="selectedState" class="form-control" name="district_id" id="district_id">
                    <option value="" selected>Pilih Kecamatan</option>
                    @foreach ($states as $state)
                        <option value="{{ $state->id_district }}">{{ $state->district_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
   
    {{-- @if (!is_null($selectedState) && $page == 'data-rantings')
        <div class="form-group row">
            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Desa') }}</label>
            @dump($cities)
            <div class="col-md-6">
                <select wire:model="selectedCity" class="form-control" name="city_id">
                    <option value="" selected>Pilih Desa</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id_village }}">{{ $city->village_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif --}}

    {{-- @if (!is_null($selectedCity))
        <div class="form-group row">
            <label for="district" class="col-md-4 col-form-label text-md-right">{{ __('Village') }}</label>
    @dump($selectedCity)
    @dump($villages)
            <div class="col-md-6">
                <select wire:model="selectedVillage" class="form-control" name="district_id">
                    <option value="" selected>Choose Village</option>
                    @foreach ($villages as $village)
                        <option value="{{ $village->id_village }}">{{ $village->village_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif --}}
</div>
