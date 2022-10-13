<?php

namespace App\Http\Livewire\JenisKerjasama;

use App\Models\JenisKerjasama;
use Livewire\Component;

class Edit extends Component
{
    public JenisKerjasama $jenisKerjasama;

    public function mount(JenisKerjasama $jenisKerjasama)
    {
        $this->jenisKerjasama = $jenisKerjasama;
    }

    public function render()
    {
        return view('livewire.jenis-kerjasama.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->jenisKerjasama->save();

        return redirect()->route('admin.jenis-kerjasamas.index');
    }

    protected function rules(): array
    {
        return [
            'jenisKerjasama.nama_jenis' => [
                'string',
                'nullable',
            ],
        ];
    }
}
