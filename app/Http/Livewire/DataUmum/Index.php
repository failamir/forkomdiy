<?php

namespace App\Http\Livewire\DataUmum;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\DataUmum;
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
        $this->orderable         = (new DataUmum())->orderable;
    }

    public function render()
    {
        $query = DataUmum::with(['ketua', 'perizinan', 'province', 'owner'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $dataUmums = $query->paginate($this->perPage);

        return view('livewire.data-umum.index', compact('dataUmums', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('data_umum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DataUmum::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(DataUmum $dataUmum)
    {
        abort_if(Gate::denies('data_umum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataUmum->delete();
    }
}
