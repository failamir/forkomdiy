<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\Village;
use Livewire\Component;

class CountryStateCity extends Component
{
    public $countries;
    public $states;
    public $cities;
    public $villages;

    public $selectedCountry = null;
    public $selectedState = null;
    public $selectedCity = null;
    public $selectedVillage = null;

    public function mount($selectedCity = null)
    {
        $this->countries = Country::all();
        $this->states = collect();
        $this->cities = collect();
        $this->villages = collect();
        $this->selectedCity = $selectedCity;
        

        if (!is_null($selectedCity)) {
            $city = City::with('state.country')->find($selectedCity);
            // var_dump($city);
            // var_dump($selectedCity);
            // die;
            if ($city) {
                $this->cities = City::where('id_regency', $city->id_regency)->get();
                $this->states = State::where('id_regency', $city->id_regency)->get();
                $this->villages = Village::where('id_district', $city->id_district)->get();
                $this->selectedCountry = $city->id_province;
                $this->selectedState = $city->id_regency;
                $this->selectedVillage = $city->id_district;
            }
        }
    }

    public function render()
    {
        return view('livewire.country-state-city');
    }

    public function updatedSelectedCountry($country)
    {
        $this->states = State::where('id_regency', $country)->get();
        $this->selectedState = NULL;
    }

    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->cities = City::where('id_district', $state)->get();
        }
    }

    public function updatedSelectedVillage($district)
    {
        if (!is_null($district)) {
            $this->villages = Village::where('id_district', $district)->get();
        }
    }
}
