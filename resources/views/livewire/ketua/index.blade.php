<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('ketua_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Ketua" format="csv" />
                <livewire:excel-export model="Ketua" format="xlsx" />
                <livewire:excel-export model="Ketua" format="pdf" />
            @endif


            @can('ketua_create')
                <x-csv-import route="{{ route('admin.ketuas.csv.store') }}" />
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
                            {{ trans('cruds.ketua.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.ketua.fields.ketua') }}
                            @include('components.table.sort', ['field' => 'ketua.contact_first_name'])
                        </th>
                        <th>
                            {{ trans('cruds.contactContact.fields.contact_first_name') }}
                            @include('components.table.sort', ['field' => 'ketua.contact_first_name'])
                        </th>
                        <th>
                            {{ trans('cruds.ketua.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.ketua.fields.periode') }}
                            @include('components.table.sort', ['field' => 'periode'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ketuas as $ketua)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $ketua->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $ketua->id }}
                            </td>
                            <td>
                                @if($ketua->ketua)
                                    <span class="badge badge-relationship">{{ $ketua->ketua->contact_first_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($ketua->ketua)
                                    {{ $ketua->ketua->contact_first_name ?? '' }}
                                @endif
                            </td>
                            <td>
                                {{ $ketua->name }}
                            </td>
                            <td>
                                {{ $ketua->periode }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('ketua_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.ketuas.show', $ketua) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('ketua_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.ketuas.edit', $ketua) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('ketua_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $ketua->id }})" wire:loading.attr="disabled">
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
            {{ $ketuas->links() }}
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