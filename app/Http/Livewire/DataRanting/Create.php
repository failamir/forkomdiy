<?php

namespace App\Http\Livewire\DataRanting;

use App\Models\DataRanting;
use App\Models\Village;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public DataRanting $dataRanting;

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

    public function mount(DataRanting $dataRanting)
    {
        $this->dataRanting = $dataRanting;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.data-ranting.create');
    }

    public function submit()
    {
        $this->validate();

        $this->dataRanting->save();
        $this->syncMedia();

        return redirect()->route('admin.data-rantings.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->dataRanting->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'dataRanting.village_id' => [
                'integer',
                'exists:villages,id',
                'nullable',
            ],
            'dataRanting.nama_ketua' => [
                'string',
                'nullable',
            ],
            'dataRanting.kontak_hp_wa' => [
                'string',
                'nullable',
            ],
            'dataRanting.jumlah_anggota' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'mediaCollections.data_ranting_lampiran' => [
                'array',
                'nullable',
            ],
            'mediaCollections.data_ranting_lampiran.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['village'] = Village::pluck('village_name', 'id')->toArray();
    }
}
