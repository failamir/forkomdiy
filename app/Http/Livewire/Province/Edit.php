<?php

namespace App\Http\Livewire\Province;

use App\Models\Province;
use Livewire\Component;

class Edit extends Component
{
    public Province $province;

    public function mount(Province $province)
    {
        $this->province = $province;
    }

    public function render()
    {
        return view('livewire.province.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->province->save();

        return redirect()->route('admin.provinces.index');
    }

    protected function rules(): array
    {
        return [
            'province.id_province' => [
                'string',
                'nullable',
            ],
            'province.province_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
