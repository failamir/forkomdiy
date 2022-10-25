<?php

namespace App\Http\Livewire\DataStakeholder;

use App\Models\DataStakeholder;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public array $mediaToRemove = [];

    public array $mediaCollections = [];

    public DataStakeholder $dataStakeholder;

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

    public function mount(DataStakeholder $dataStakeholder)
    {
        $this->dataStakeholder  = $dataStakeholder;
        $this->mediaCollections = [
            'data_stakeholder_lampiran' => $dataStakeholder->lampiran,
        ];
    }

    public function render()
    {
        return view('livewire.data-stakeholder.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->dataStakeholder->save();
        $this->syncMedia();

        return redirect()->route('admin.data-stakeholders.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->dataStakeholder->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'dataStakeholder.jenis_kerjasama' => [
                'string',
                'nullable',
            ],
            'dataStakeholder.frekuensi_kerjasama' => [
                'string',
                'nullable',
            ],
            'dataStakeholder.mulai_kerjasama' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'dataStakeholder.nama_lembaga_kerjasama' => [
                'string',
                'nullable',
            ],
            'dataStakeholder.nama_stakeholder' => [
                'string',
                'nullable',
            ],
            'dataStakeholder.no_hp_wa_stakeholder' => [
                'string',
                'nullable',
            ],
            'dataStakeholder.kontak_di_lembaga' => [
                'string',
                'nullable',
            ],
            'dataStakeholder.no_hp_wa_lembaga' => [
                'string',
                'nullable',
            ],
            'dataStakeholder.jangkauan_kerjasama' => [
                'string',
                'nullable',
            ],
            'mediaCollections.data_stakeholder_lampiran' => [
                'array',
                'nullable',
            ],
            'mediaCollections.data_stakeholder_lampiran.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
