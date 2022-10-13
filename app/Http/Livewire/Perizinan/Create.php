<?php

namespace App\Http\Livewire\Perizinan;

use App\Models\JenisIzin;
use App\Models\Perizinan;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Perizinan $perizinan;

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

    public function mount(Perizinan $perizinan)
    {
        $this->perizinan = $perizinan;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.perizinan.create');
    }

    public function submit()
    {
        $this->validate();

        $this->perizinan->save();
        $this->syncMedia();

        return redirect()->route('admin.perizinans.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->perizinan->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'perizinan.nama_izin' => [
                'string',
                'nullable',
            ],
            'perizinan.jenis_izin_id' => [
                'integer',
                'exists:jenis_izins,id',
                'nullable',
            ],
            'perizinan.instansi_penerbit' => [
                'string',
                'nullable',
            ],
            'perizinan.nomor_izin' => [
                'string',
                'nullable',
            ],
            'perizinan.masa_berlaku' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'mediaCollections.perizinan_lampiran_file' => [
                'array',
                'nullable',
            ],
            'mediaCollections.perizinan_lampiran_file.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['jenis_izin'] = JenisIzin::pluck('nama_jenis', 'id')->toArray();
    }
}
