<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('province_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Province" format="csv" />
                <livewire:excel-export model="Province" format="xlsx" />
                <livewire:excel-export model="Province" format="pdf" />
            @endif


            @can('province_create')
                <x-csv-import route="{{ route('admin.provinces.csv.store') }}" />
            @endcan

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
                            {{ trans('cruds.province.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.province.fields.id_province') }}
                            @include('components.table.sort', ['field' => 'id_province'])
                        </th>
                        <th>
                            {{ trans('cruds.province.fields.province_name') }}
                            @include('components.table.sort', ['field' => 'province_name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($provinces as $province)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $province->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $province->id }}
                            </td>
                            <td>
                                {{ $province->id_province }}
                            </td>
                            <td>
                                {{ $province->province_name }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('province_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.provinces.show', $province) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('province_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.provinces.edit', $province) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('province_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $province->id }})" wire:loading.attr="disabled">
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
            {{ $provinces->links() }}
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