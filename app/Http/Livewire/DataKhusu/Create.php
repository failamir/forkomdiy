<?php

namespace App\Http\Livewire\DataKhusu;

use App\Models\DataCabang;
use App\Models\DataDaerah;
use App\Models\DataKhusu;
use App\Models\DataWilayah;
use Livewire\Component;

class Create extends Component
{
    public DataKhusu $dataKhusu;

    public array $listsForFields = [];

    public function mount(DataKhusu $dataKhusu)
    {
        $this->dataKhusu = $dataKhusu;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.data-khusu.create');
    }

    public function submit()
    {
        $this->validate();

        $this->dataKhusu->save();

        return redirect()->route('admin.data-khusus.index');
    }

    protected function rules(): array
    {
        return [
            'dataKhusu.nama_daerah' => [
                'string',
                'nullable',
            ],
            'dataKhusu.data_daerah_id' => [
                'integer',
                'exists:data_daerahs,id',
                'nullable',
            ],
            'dataKhusu.jumlah_anggota_daerah' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'dataKhusu.nama_cabang' => [
                'string',
                'nullable',
            ],
            'dataKhusu.jumlah_anggota_cabang' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'dataKhusu.data_cabang_id' => [
                'integer',
                'exists:data_cabangs,id',
                'nullable',
            ],
            'dataKhusu.nama_sub_wilayah' => [
                'string',
                'nullable',
            ],
            'dataKhusu.jumlah_anggota_sub_wilayah' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'dataKhusu.data_sub_wilayah_lain_id' => [
                'integer',
                'exists:data_wilayahs,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['data_daerah']           = DataDaerah::pluck('nama_daerah', 'id')->toArray();
        $this->listsForFields['data_cabang']           = DataCabang::pluck('nama_cabang', 'id')->toArray();
        $this->listsForFields['data_sub_wilayah_lain'] = DataWilayah::pluck('nama_wilayah', 'id')->toArray();
    }
}
