<?php

namespace App\Http\Livewire\DisputeRequest;

use App\Models\DisputeRequest;
use App\Models\DisputeType;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public DisputeRequest $disputeRequest;

    public function mount(DisputeRequest $disputeRequest)
    {
        $this->disputeRequest = $disputeRequest;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.dispute-request.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->disputeRequest->save();

        return redirect()->route('admin.dispute-requests.index');
    }

    protected function rules(): array
    {
        return [
            'disputeRequest.user_provider' => [
                'string',
                'nullable',
            ],
            'disputeRequest.request_detail' => [
                'string',
                'nullable',
            ],
            'disputeRequest.dispute_id' => [
                'integer',
                'exists:dispute_types,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['dispute'] = DisputeType::pluck('dispute_type', 'id')->toArray();
    }
}
