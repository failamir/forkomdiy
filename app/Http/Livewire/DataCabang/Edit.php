<?php

namespace App\Http\Livewire\DataCabang;

use App\Models\DataCabang;
use App\Models\DataDaerah;
use Livewire\Component;

class Edit extends Component
{
    public DataCabang $dataCabang;

    public array $listsForFields = [];

    public function mount(DataCabang $dataCabang)
    {
        $this->dataCabang = $dataCabang;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.data-cabang.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->dataCabang->save();

        return redirect()->route('admin.data-cabangs.index');
    }

    protected function rules(): array
    {
        return [
            'dataCabang.nama_cabang' => [
                'string',
                'nullable',
            ],
            'dataCabang.daerah_id' => [
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
