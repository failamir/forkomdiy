<?php

namespace App\Http\Livewire\Village;

use App\Models\Village;
use Livewire\Component;

class Create extends Component
{
    public Village $village;

    public function mount(Village $village)
    {
        $this->village = $village;
    }

    public function render()
    {
        return view('livewire.village.create');
    }

    public function submit()
    {
        $this->validate();

        $this->village->save();

        return redirect()->route('admin.villages.index');
    }

    protected function rules(): array
    {
        return [
            'village.id_district' => [
                'string',
                'nullable',
            ],
            'village.id_village' => [
                'string',
                'nullable',
            ],
            'village.village_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
