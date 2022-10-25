<?php

namespace App\Http\Livewire\Regency;

use App\Models\Regency;
use Livewire\Component;

class Edit extends Component
{
    public Regency $regency;

    public function mount(Regency $regency)
    {
        $this->regency = $regency;
    }

    public function render()
    {
        return view('livewire.regency.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->regency->save();

        return redirect()->route('admin.regencies.index');
    }

    protected function rules(): array
    {
        return [
            'regency.id_province' => [
                'string',
                'nullable',
            ],
            'regency.id_regency' => [
                'string',
                'nullable',
            ],
            'regency.regency_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
