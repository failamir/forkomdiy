<?php

namespace App\Http\Livewire\DataDaerah;

use App\Models\DataDaerah;
use App\Models\Regency;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public DataDaerah $dataDaerah;

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

    public function mount(DataDaerah $dataDaerah)
    {
        $this->dataDaerah = $dataDaerah;
        $this->initListsForFields();
        $this->mediaCollections = [
            'data_daerah_lampiran' => $dataDaerah->lampiran,
        ];
    }

    public function render()
    {
        return view('livewire.data-daerah.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->dataDaerah->save();
        $this->syncMedia();

        return redirect()->route('admin.data-daerahs.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->dataDaerah->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'dataDaerah.regency_id' => [
                'integer',
                'exists:regencies,id',
                'nullable',
            ],
            'dataDaerah.nama_ketua' => [
                'string',
                'nullable',
            ],
            'dataDaerah.kontak_hp_wa' => [
                'string',
                'nullable',
            ],
            'dataDaerah.jumlah_anggota' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'mediaCollections.data_daerah_lampiran' => [
                'array',
                'nullable',
            ],
            'mediaCollections.data_daerah_lampiran.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['regency'] = Regency::pluck('regency_name', 'id')->toArray();
    }
}
