<?php

namespace App\Http\Livewire\DataStakeholder;

use App\Models\DataDaerah;
use App\Models\DataStakeholder;
use App\Models\JenisKerjasama;
use App\Models\User;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public array $mediaToRemove = [];

    public array $listsForFields = [];

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

    public function mount(DataStakeholder $dataStakeholder)
    {
        $this->dataStakeholder = $dataStakeholder;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.data-stakeholder.create');
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
            'dataStakeholder.nama_stakeholder' => [
                'string',
                'nullable',
            ],
            'dataStakeholder.daerah_id' => [
                'integer',
                'exists:data_daerahs,id',
                'nullable',
            ],
            'dataStakeholder.kontak_di_lembaga_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'dataStakeholder.kontak_di_stakeholder_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'dataStakeholder.jenis_kerjasama_id' => [
                'integer',
                'exists:jenis_kerjasamas,id',
                'nullable',
            ],
            'dataStakeholder.jangkauan_kerjasama' => [
                'string',
                'nullable',
            ],
            'dataStakeholder.lama_kerjasama' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['lama_kerjasama'])),
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

    protected function initListsForFields(): void
    {
        $this->listsForFields['daerah']                = DataDaerah::pluck('nama_daerah', 'id')->toArray();
        $this->listsForFields['kontak_di_lembaga']     = User::pluck('name', 'id')->toArray();
        $this->listsForFields['kontak_di_stakeholder'] = User::pluck('name', 'id')->toArray();
        $this->listsForFields['jenis_kerjasama']       = JenisKerjasama::pluck('nama_jenis', 'id')->toArray();
        $this->listsForFields['lama_kerjasama']        = $this->dataStakeholder::LAMA_KERJASAMA_SELECT;
    }
}
