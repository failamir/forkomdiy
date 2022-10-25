<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('perizinan_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Perizinan" format="csv" />
                <livewire:excel-export model="Perizinan" format="xlsx" />
                <livewire:excel-export model="Perizinan" format="pdf" />
            @endif


            @can('perizinan_create')
                <x-csv-import route="{{ route('admin.perizinans.csv.store') }}" />
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
                            {{ trans('cruds.perizinan.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.perizinan.fields.nama_izin') }}
                            @include('components.table.sort', ['field' => 'nama_izin'])
                        </th>
                        <th>
                            {{ trans('cruds.perizinan.fields.instansi_penerbit') }}
                            @include('components.table.sort', ['field' => 'instansi_penerbit'])
                        </th>
                        <th>
                            {{ trans('cruds.perizinan.fields.nomor_izin') }}
                            @include('components.table.sort', ['field' => 'nomor_izin'])
                        </th>
                        <th>
                            {{ trans('cruds.perizinan.fields.tanggal_dikeluarkan') }}
                            @include('components.table.sort', ['field' => 'tanggal_dikeluarkan'])
                        </th>
                        <th>
                            {{ trans('cruds.perizinan.fields.berlaku_sampai') }}
                            @include('components.table.sort', ['field' => 'berlaku_sampai'])
                        </th>
                        <th>
                            {{ trans('cruds.perizinan.fields.lampiran_file') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($perizinans as $perizinan)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $perizinan->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $perizinan->id }}
                            </td>
                            <td>
                                {{ $perizinan->nama_izin }}
                            </td>
                            <td>
                                {{ $perizinan->instansi_penerbit }}
                            </td>
                            <td>
                                {{ $perizinan->nomor_izin }}
                            </td>
                            <td>
                                {{ $perizinan->tanggal_dikeluarkan }}
                            </td>
                            <td>
                                {{ $perizinan->berlaku_sampai }}
                            </td>
                            <td>
                                @foreach($perizinan->lampiran_file as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('perizinan_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.perizinans.show', $perizinan) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('perizinan_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.perizinans.edit', $perizinan) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('perizinan_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $perizinan->id }})" wire:loading.attr="disabled">
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
            {{ $perizinans->links() }}
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