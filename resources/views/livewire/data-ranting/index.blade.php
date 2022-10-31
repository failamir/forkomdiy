<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('data_ranting_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="DataRanting" format="csv" />
                <livewire:excel-export model="DataRanting" format="xlsx" />
                <livewire:excel-export model="DataRanting" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.dataRanting.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.dataRanting.fields.village') }}
                            @include('components.table.sort', ['field' => 'village.village_name'])
                        </th>
                        <th>
                            {{ trans('cruds.village.fields.id_village') }}
                            @include('components.table.sort', ['field' => 'village.id_village'])
                        </th>
                        <th>
                            {{ trans('cruds.dataRanting.fields.nama_ketua') }}
                            @include('components.table.sort', ['field' => 'nama_ketua'])
                        </th>
                        <th>
                            {{ trans('cruds.dataRanting.fields.kontak_hp_wa') }}
                            @include('components.table.sort', ['field' => 'kontak_hp_wa'])
                        </th>
                        <th>
                            {{ trans('cruds.dataRanting.fields.jumlah_anggota') }}
                            @include('components.table.sort', ['field' => 'jumlah_anggota'])
                        </th>
                        {{-- <th>
                            {{ trans('cruds.dataRanting.fields.lampiran') }}
                        </th> --}}
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataRantings as $dataRanting)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $dataRanting->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $dataRanting->id }}
                            </td>
                            <td>
                                @if($dataRanting->village)
                                    <span class="badge badge-relationship">{{ $dataRanting->village->village_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($dataRanting->village)
                                    {{ $dataRanting->village->id_village ?? '' }}
                                @endif
                            </td>
                            <td>
                                {{ $dataRanting->nama_ketua }}
                            </td>
                            <td>
                                {{ $dataRanting->kontak_hp_wa }}
                            </td>
                            <td>
                                {{ $dataRanting->jumlah_anggota }}
                            </td>
                            {{-- <td>
                                @foreach($dataRanting->lampiran as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td> --}}
                            <td>
                                <div class="flex justify-end">
                                    @can('data_ranting_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.data-rantings.show', $dataRanting) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('data_ranting_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.data-rantings.edit', $dataRanting) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('data_ranting_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $dataRanting->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $dataRantings->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush