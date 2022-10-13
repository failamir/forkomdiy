<?php

namespace App\Http\Livewire\DataWilayah;

use App\Models\DataDaerah;
use App\Models\DataWilayah;
use Livewire\Component;

class Create extends Component
{
    public DataWilayah $dataWilayah;

    public array $listsForFields = [];

    public function mount(DataWilayah $dataWilayah)
    {
        $this->dataWilayah = $dataWilayah;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.data-wilayah.create');
    }

    public function submit()
    {
        $this->validate();

        $this->dataWilayah->save();

        return redirect()->route('admin.data-wilayahs.index');
    }

    protected function rules(): array
    {
        return [
            'dataWilayah.nama_wilayah' => [
                'string',
                'nullable',
            ],
            'dataWilayah.daerah_id' => [
                'integer',
                'exists:data_daerahs,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['daerah'] = DataDaerah::pluck('nama_daerah', 'id')->toArray();
    }
}
