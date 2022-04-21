<?php

namespace App\Http\Livewire\DisputeRequest;

use App\Models\DisputeRequest;
use App\Models\DisputeType;
use App\Models\RequestHistory;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public $histories;

    public DisputeRequest $disputeRequest;

    public function mount(DisputeRequest $disputeRequest)
    {
        $this->disputeRequest = $disputeRequest;
        $this->initListsForFields();
    }

    public function render()
    {
        $request_id = $this->disputeRequest->request_detail;
        $this->histories = RequestHistory::where('id', $request_id)->first();
        return view('livewire.dispute-request.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->disputeRequest->save();

        return redirect()->route('admin.dispute-panel.dispute-requests');
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
            'disputeRequest.dispute_name_id' => [
                'integer',
                'exists:dispute_types,id',
                'nullable',
            ],
            'disputeRequest.comment' => [
                'string',
                'nullable',
            ],
            'disputeRequest.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
            'disputeRequest.refund_amount' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['dispute'] = DisputeType::pluck('dispute_type', 'id')->toArray();
        $this->listsForFields['dispute_name'] = DisputeType::pluck('dispute_name', 'id')->toArray();
        $this->listsForFields['status']       = $this->disputeRequest::STATUS_SELECT;
    }
}
