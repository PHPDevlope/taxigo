<?php

namespace App\Http\Livewire\DisputeType;

use App\Models\DisputeType;
use Livewire\Component;

class Edit extends Component
{
    public DisputeType $disputeType;

    public array $listsForFields = [];

    public function mount(DisputeType $disputeType)
    {
        $this->disputeType = $disputeType;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.dispute-type.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->disputeType->save();

        return redirect()->route('admin.dispute-types.index');
    }

    protected function rules(): array
    {
        return [
            'disputeType.dispute_type' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['dispute_type'])),
            ],
            'disputeType.dispute_issue' => [
                'string',
                'nullable',
            ],
            'disputeType.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['dispute_type'] = $this->disputeType::DISPUTE_TYPE_SELECT;
        $this->listsForFields['status']       = $this->disputeType::STATUS_SELECT;
    }
}
