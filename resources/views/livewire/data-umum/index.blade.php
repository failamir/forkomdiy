<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('data_umum_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="DataUmum" format="csv" />
                <livewire:excel-export model="DataUmum" format="xlsx" />
                <livewire:excel-export model="DataUmum" format="pdf" />
            @endif


            @can('data_umum_create')
                <x-csv-import route="{{ route('admin.data-umums.csv.store') }}" />
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
                            {{ trans('cruds.dataUmum.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.dataUmum.fields.nama_lembaga') }}
                            @include('components.table.sort', ['field' => 'nama_lembaga'])
                        </th>
                        <th>
                            {{ trans('cruds.dataUmum.fields.nick_name') }}
                            @include('components.table.sort', ['field' => 'nick_name'])
                        </th>
                        <th>
                            {{ trans('cruds.dataUmum.fields.ketua') }}
                            @include('components.table.sort', ['field' => 'ketua.nama_stakeholder'])
                        </th>
                        <th>
                            {{ trans('cruds.dataStakeholder.fields.nama_stakeholder') }}
                            @include('components.table.sort', ['field' => 'ketua.nama_stakeholder'])
                        </th>
                        <th>
                            {{ trans('cruds.dataUmum.fields.sekretariat_wilayah') }}
                            @include('components.table.sort', ['field' => 'sekretariat_wilayah'])
                        </th>
                        <th>
                            {{ trans('cruds.dataUmum.fields.website') }}
                            @include('components.table.sort', ['field' => 'website'])
                        </th>
                        <th>
                            {{ trans('cruds.dataUmum.fields.email') }}
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                            {{ trans('cruds.dataUmum.fields.telp') }}
                            @include('components.table.sort', ['field' => 'telp'])
                        </th>
                        <th>
                            {{ trans('cruds.dataUmum.fields.whats_app') }}
                            @include('components.table.sort', ['field' => 'whats_app'])
                        </th>
                        <th>
                            {{ trans('cruds.dataUmum.fields.lingkup_kegiatan') }}
                            @include('components.table.sort', ['field' => 'lingkup_kegiatan'])
                        </th>
                        <th>
                            {{ trans('cruds.dataUmum.fields.perizinan') }}
                            @include('components.table.sort', ['field' => 'perizinan.nama_izin'])
                        </th>
                        <th>
                            {{ trans('cruds.perizinan.fields.nama_izin') }}
                            @include('components.table.sort', ['field' => 'perizinan.nama_izin'])
                        </th>
                        <th>
                            {{ trans('cruds.dataUmum.fields.jumlah_anggota') }}
                            @include('components.table.sort', ['field' => 'jumlah_anggota'])
                        </th>
                        <th>
                            {{ trans('cruds.dataUmum.fields.lampiran') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataUmums as $dataUmum)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $dataUmum->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $dataUmum->id }}
                            </td>
                            <td>
                                {{ $dataUmum->nama_lembaga }}
                            </td>
                            <td>
                                {{ $dataUmum->nick_name }}
                            </td>
                            <td>
                                @if($dataUmum->ketua)
                                    <span class="badge badge-relationship">{{ $dataUmum->ketua->nama_stakeholder ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($dataUmum->ketua)
                                    {{ $dataUmum->ketua->nama_stakeholder ?? '' }}
                                @endif
                            </td>
                            <td>
                                {{ $dataUmum->sekretariat_wilayah }}
                            </td>
                            <td>
                                {{ $dataUmum->website }}
                            </td>
                            <td>
                                {{ $dataUmum->email }}
                            </td>
                            <td>
                                {{ $dataUmum->telp }}
                            </td>
                            <td>
                                {{ $dataUmum->whats_app }}
                            </td>
                            <td>
                                {{ $dataUmum->lingkup_kegiatan }}
                            </td>
                            <td>
                                @if($dataUmum->perizinan)
                                    <span class="badge badge-relationship">{{ $dataUmum->perizinan->nama_izin ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($dataUmum->perizinan)
                                    {{ $dataUmum->perizinan->nama_izin ?? '' }}
                                @endif
                            </td>
                            <td>
                                {{ $dataUmum->jumlah_anggota }}
                            </td>
                            <td>
                                @foreach($dataUmum->lampiran as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('data_umum_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.data-umums.show', $dataUmum) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('data_umum_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.data-umums.edit', $dataUmum) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('data_umum_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $dataUmum->id }})" wire:loading.attr="disabled">
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
            {{ $dataUmums->links() }}
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