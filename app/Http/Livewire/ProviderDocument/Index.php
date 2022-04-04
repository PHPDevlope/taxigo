<?php

namespace App\Http\Livewire\ProviderDocument;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\ProviderDocument;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
//    use WithConfirmation;

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
        $this->orderable         = (new ProviderDocument())->orderable;
    }

    public function render()
    {
        $getid = request('id');

        $query = ProviderDocument::with(['userName', 'documentName'])
            ->where('user_id', $getid)
            ->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $providerDocuments = $query->paginate($this->perPage);

        return view('livewire.provider-document.index', compact('query', 'providerDocuments'));
    }

//    public function deleteSelected()
//    {
//        ProviderDocument::whereIn('id', $this->selected)->delete();
//
//        $this->resetSelected();
//    }
//
//    public function delete(ProviderDocument $providerDocument)
//    {
//        $providerDocument->delete();
//    }
}
