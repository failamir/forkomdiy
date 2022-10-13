<?php

namespace App\Http\Livewire\DataDaerah;

use App\Models\DataDaerah;
use Livewire\Component;

class Edit extends Component
{
    public DataDaerah $dataDaerah;

    public function mount(DataDaerah $dataDaerah)
    {
        $this->dataDaerah = $dataDaerah;
    }

    public function render()
    {
        return view('livewire.data-daerah.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->dataDaerah->save();

        return redirect()->route('admin.data-daerahs.index');
    }

    protected function rules(): array
    {
        return [
            'dataDaerah.nama_daerah' => [
                'string',
                'nullable',
            ],
        ];
    }
}
