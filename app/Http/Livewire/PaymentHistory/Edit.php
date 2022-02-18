<?php

namespace App\Http\Livewire\PaymentHistory;

use App\Models\PaymentHistory;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public PaymentHistory $paymentHistory;

    public function mount(PaymentHistory $paymentHistory)
    {
        $this->paymentHistory = $paymentHistory;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.payment-history.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->paymentHistory->save();

        return redirect()->route('admin.payment-histories.index');
    }

    protected function rules(): array
    {
        return [
            'paymentHistory.transaction' => [
                'string',
                'nullable',
            ],
            'paymentHistory.total_amount' => [
                'numeric',
                'nullable',
            ],
            'paymentHistory.provider_amount' => [
                'numeric',
                'nullable',
            ],
            'paymentHistory.payment_mode' => [
                'string',
                'nullable',
            ],
            'paymentHistory.paument_status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['paument_status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['paument_status'] = $this->paymentHistory::PAUMENT_STATUS_SELECT;
    }
}
