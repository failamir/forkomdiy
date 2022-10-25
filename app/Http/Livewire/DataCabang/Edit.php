<?php

namespace App\Http\Livewire\DataCabang;

use App\Models\DataCabang;
use App\Models\District;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public DataCabang $dataCabang;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    public function mount(DataCabang $dataCabang)
    {
        $this->dataCabang = $dataCabang;
        $this->initListsForFields();
        $this->mediaCollections = [
            'data_cabang_lampiran' => $dataCabang->lampiran,
        ];
    }

    public function render()
    {
        return view('livewire.data-cabang.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->dataCabang->save();
        $this->syncMedia();

        return redirect()->route('admin.data-cabangs.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->dataCabang->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'dataCabang.district_id' => [
                'integer',
                'exists:districts,id',
                'nullable',
            ],
            'dataCabang.nama_ketua' => [
                'string',
                'nullable',
            ],
            'dataCabang.kontak_hp_wa' => [
                'string',
                'nullable',
            ],
            'dataCabang.jumlah_anggota' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'mediaCollections.data_cabang_lampiran' => [
                'array',
                'nullable',
            ],
            'mediaCollections.data_cabang_lampiran.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['district'] = District::pluck('district_name', 'id')->toArray();
    }
}
