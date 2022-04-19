<?php

namespace App\Http\Livewire\DisputeRequest;

use App\Models\DisputeRequest;
use App\Models\DisputeType;
use App\Models\RequestHistory;
use Livewire\Component;

class Create extends Component
{
    public $histories;

    public array $listsForFields = [];

    public DisputeRequest $disputeRequest;

    public function mount(DisputeRequest $disputeRequest)
    {
        $this->disputeRequest = $disputeRequest;
        $this->initListsForFields();
    }

    public function updated(){
        $request_id = $this->disputeRequest->request_detail;
        $this->histories = RequestHistory::where('id', $request_id)->first();
    }

    public function render()
    {
        return view('livewire.dispute-request.create');
    }

    public function submit()
    {
        if($this->histories == '')
        {
            $this->disputeRequest->request_detail = NULL;
        }
        $this->validate();

        $this->disputeRequest->save();

        return redirect()->route('admin.dispute-panel.dispute-requests');
    }

    protected function rules(): array
    {
        return [
            'disputeRequest.dispute_id' => [
                'integer',
                'exists:dispute_types,id',
                'nullable',
            ],
            'disputeRequest.user_provider' => [
                'string',
                'required',
                'nullable',
            ],
            'disputeRequest.request_detail' => [
                'string',
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
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['dispute'] = DisputeType::pluck('dispute_type', 'id')->toArray();
        $this->listsForFields['dispute_name'] = DisputeType::pluck('dispute_name', 'id')->toArray();
        $this->listsForFields['status']       = $this->disputeRequest::STATUS_SELECT;
    }
}
