<?php

namespace App\Http\Livewire\DataUmum;

use App\Models\DataUmum;
use App\Models\Ketua;
use App\Models\Perizinan;
use App\Models\Province;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public DataUmum $dataUmum;

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

    public function mount(DataUmum $dataUmum)
    {
        $this->dataUmum                 = $dataUmum;
        $this->dataUmum->jumlah_anggota = '10';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.data-umum.create');
    }

    public function submit()
    {
        $this->validate();

        $this->dataUmum->save();
        $this->syncMedia();

        return redirect()->route('admin.data-umums.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->dataUmum->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'dataUmum.nama_lembaga' => [
                'string',
                'nullable',
            ],
            'dataUmum.ketua_id' => [
                'integer',
                'exists:ketuas,id',
                'nullable',
            ],
            'dataUmum.sekretariat_wilayah' => [
                'string',
                'nullable',
            ],
            'dataUmum.website' => [
                'string',
                'nullable',
            ],
            'dataUmum.email' => [
                'string',
                'nullable',
            ],
            'dataUmum.telp' => [
                'string',
                'nullable',
            ],
            'dataUmum.whats_app' => [
                'string',
                'nullable',
            ],
            'dataUmum.lingkup_kegiatan' => [
                'string',
                'nullable',
            ],
            'dataUmum.perizinan_id' => [
                'integer',
                'exists:perizinans,id',
                'nullable',
            ],
            'dataUmum.jumlah_anggota' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'mediaCollections.data_umum_lampiran' => [
                'array',
                'nullable',
            ],
            'mediaCollections.data_umum_lampiran.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'dataUmum.province_id' => [
                'integer',
                'exists:provinces,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['ketua']     = Ketua::pluck('name', 'id')->toArray();
        $this->listsForFields['perizinan'] = Perizinan::pluck('nama_izin', 'id')->toArray();
        $this->listsForFields['province']  = Province::pluck('province_name', 'id')->toArray();
    }
}
