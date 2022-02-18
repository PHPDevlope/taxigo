<?php

namespace App\Http\Livewire\ProviderRating;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\ProviderRating;
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
        $this->orderable         = (new ProviderRating())->orderable;
    }

    public function render()
    {
        $query = ProviderRating::with(['request', 'userName', 'providerName'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $providerRatings = $query->paginate($this->perPage);

        return view('livewire.provider-rating.index', compact('providerRatings', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('provider_rating_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        ProviderRating::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(ProviderRating $providerRating)
    {
        abort_if(Gate::denies('provider_rating_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $providerRating->delete();
    }
}
