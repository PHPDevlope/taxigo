<?php

namespace App\Http\Livewire\ProviderService;

use App\Models\ProviderService;
use App\Models\ServiceType;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public $serviceID;
    public $serviceNum;
    public $serviceMod;
    public $service_id;
    public $service_number;
    public $service_model;
    public string $uid;

    public $providerService;

    public array $listsForFields =[];

    public function mount($id)
    {
        $this->uid = $id[0];

        $this->providerService = ProviderService::where("user_id", $id)->first();

        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.provider-service.edit');
    }

    public function submit()
    {
        $this->validate();

        ProviderService::updateOrcreate([
            'user_id'        => $this->uid,
            'service_id'     => $this->serviceID,
        ],[
            'user_id'        => $this->uid,
            'service_id'     => $this->serviceID,
            'service_number' => $this->serviceNum,
            'service_model'  => $this->serviceMod,
        ]);

        return redirect()->route('admin.providers.document-services',$this->uid);
    }

    protected function rules(): array
    {
        return [
            'providerService.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'serviceID' => [
                'integer',
                'exists:service_types,id',
                'nullable',
                'required',
            ],
            'serviceNum' => [
                'string',
                'required',
            ],
            'serviceMod' => [
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
