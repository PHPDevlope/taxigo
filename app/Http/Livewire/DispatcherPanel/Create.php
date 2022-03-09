<?php

namespace App\Http\Livewire\DispatcherPanel;

use App\Models\ServiceType;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public User $user;

    public array $serviceType = [];

    public array $listsForFields = [];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.dispatcher-panel.create');
    }

    protected function rules(): array
    {
        return [
            'serviceType.date_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['serviceType'] = serviceType::pluck('service_name', 'id')->toArray();
    }


}
