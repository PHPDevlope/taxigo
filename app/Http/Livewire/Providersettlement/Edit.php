<?php

namespace App\Http\Livewire\Providersettlement;

use App\Models\Providersettlement;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public Providersettlement $providersettlement;

    public function mount(Providersettlement $providersettlement)
    {
        $this->providersettlement = $providersettlement;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.providersettlement.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->providersettlement->save();

        return redirect()->route('admin.providersettlements.index');
    }

    protected function rules(): array
    {
        return [
            'providersettlement.provider_name' => [
                'string',
                'nullable',
            ],
            'providersettlement.amount' => [
                'numeric',
                'nullable',
            ],
            'providersettlement.type' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['type'])),
            ],
            'providersettlement.send' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['send'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['type'] = $this->providersettlement::TYPE_SELECT;
        $this->listsForFields['send'] = $this->providersettlement::SEND_SELECT;
    }
}
