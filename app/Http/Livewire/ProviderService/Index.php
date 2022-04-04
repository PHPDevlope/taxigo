<?php

namespace App\Http\Livewire\ProviderService;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\ProviderService;
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
        $this->orderable         = (new ProviderService())->orderable;
    }

    public function render()
    {
        $getid = request('id');

        $query = ProviderService::with(['userName', 'serviceName'])
            ->where('user_id', $getid)
            ->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $providerServices = $query->paginate($this->perPage);

        return view('livewire.provider-service.index', compact('query', 'providerServices'));
    }

//    public function deleteSelected()
//    {
//        ProviderService::whereIn('id', $this->selected)->delete();
//
//        $this->resetSelected();
//    }

    public function delete(ProviderService $providerService)
    {
        $providerService->delete();
    }
}
