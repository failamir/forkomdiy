<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('data_stakeholder_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="DataStakeholder" format="csv" />
                <livewire:excel-export model="DataStakeholder" format="xlsx" />
                <livewire:excel-export model="DataStakeholder" format="pdf" />
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
                            {{ trans('cruds.dataStakeholder.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.dataStakeholder.fields.nama_stakeholder') }}
                            @include('components.table.sort', ['field' => 'nama_stakeholder'])
                        </th>
                        <th>
                            {{ trans('cruds.dataStakeholder.fields.kontak_di_lembaga') }}
                            @include('components.table.sort', ['field' => 'kontak_di_lembaga'])
                        </th>
                        <th>
                            {{ trans('cruds.dataStakeholder.fields.kontak_di_stakeholder') }}
                            @include('components.table.sort', ['field' => 'kontak_di_stakeholder'])
                        </th>
                        <th>
                            {{ trans('cruds.dataStakeholder.fields.jenis_kerjasama') }}
                            @include('components.table.sort', ['field' => 'jenis_kerjasama'])
                        </th>
                        <th>
                            {{ trans('cruds.dataStakeholder.fields.jangkauan_kerjasama') }}
                            @include('components.table.sort', ['field' => 'jangkauan_kerjasama'])
                        </th>
                        <th>
                            {{ trans('cruds.dataStakeholder.fields.lama_kerjasama') }}
                            @include('components.table.sort', ['field' => 'lama_kerjasama'])
                        </th>
                        <th>
                            {{ trans('cruds.dataStakeholder.fields.lampiran') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataStakeholders as $dataStakeholder)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $dataStakeholder->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $dataStakeholder->id }}
                            </td>
                            <td>
                                {{ $dataStakeholder->nama_stakeholder }}
                            </td>
                            <td>
                                {{ $dataStakeholder->kontak_di_lembaga }}
                            </td>
                            <td>
                                {{ $dataStakeholder->kontak_di_stakeholder }}
                            </td>
                            <td>
                                {{ $dataStakeholder->jenis_kerjasama }}
                            </td>
                            <td>
                                {{ $dataStakeholder->jangkauan_kerjasama }}
                            </td>
                            <td>
                                {{ $dataStakeholder->lama_kerjasama }}
                            </td>
                            <td>
                                @foreach($dataStakeholder->lampiran as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('data_stakeholder_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.data-stakeholders.show', $dataStakeholder) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('data_stakeholder_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.data-stakeholders.edit', $dataStakeholder) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('data_stakeholder_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $dataStakeholder->id }})" wire:loading.attr="disabled">
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
            {{ $dataStakeholders->links() }}
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