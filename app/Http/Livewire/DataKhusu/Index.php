<?php

namespace App\Http\Livewire\DataKhusu;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\DataKhusu;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new DataKhusu())->orderable;
    }

    public function render()
    {
        $query = DataKhusu::with(['dataDaerah', 'dataCabang', 'dataSubWilayahLain'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $dataKhusus = $query->paginate($this->perPage);

        return view('livewire.data-khusu.index', compact('dataKhusus', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('data_khusu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DataKhusu::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(DataKhusu $dataKhusu)
    {
        abort_if(Gate::denies('data_khusu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataKhusu->delete();
    }
}
