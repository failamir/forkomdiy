<?php

namespace App\Http\Livewire\JenisIzin;

use App\Models\JenisIzin;
use Livewire\Component;

class Edit extends Component
{
    public JenisIzin $jenisIzin;

    public function mount(JenisIzin $jenisIzin)
    {
        $this->jenisIzin = $jenisIzin;
    }

    public function render()
    {
        return view('livewire.jenis-izin.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->jenisIzin->save();

        return redirect()->route('admin.jenis-izins.index');
    }

    protected function rules(): array
    {
        return [
            'jenisIzin.nama_jenis' => [
                'string',
                'nullable',
            ],
        ];
    }
}
