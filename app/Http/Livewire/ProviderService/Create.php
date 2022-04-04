<?php

namespace App\Http\Livewire\ProviderService;

use App\Models\ProviderService;
use App\Models\ServiceType;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public ProviderService $providerService;

    public array $listsForFields = [];

    public function mount(ProviderService $providerService)
    {
        $this->providerService = $providerService;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.provider-service.create');
    }

    public function submit()
    {
        $this->validate();
        $this->providerService->save();

        return redirect()->route('admin.provider-services');
    }

    protected function rules(): array
    {
        return [
            'providerService.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'providerService.service_id' => [
                'integer',
                'exists:service_types,id',
                'nullable',
            ],
            'providerService.service_number' => [
                'string',
                'required',
            ],
            'providerService.service_model' => [
                'string',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user_name'] = User::pluck('name', 'id')->toArray();
        $this->listsForFields['service_name'] = ServiceType::pluck('service_name', 'id')->toArray();
    }
}
