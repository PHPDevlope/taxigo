<?php

namespace App\Http\Livewire\RequestHistory;

use App\Models\Promocode;
use App\Models\RequestHistory;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public RequestHistory $requestHistory;

    public function mount(RequestHistory $requestHistory)
    {
        $this->requestHistory = $requestHistory;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.request-history.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->requestHistory->save();

        return redirect()->route('admin.request-history');
    }

    protected function rules(): array
    {
        return [
            'requestHistory.user_name_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'requestHistory.provider_name_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'requestHistory.total_distance' => [
                'string',
                'nullable',
            ],
            'requestHistory.ride_start_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'requestHistory.ride_end_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'requestHistory.otp' => [
                'string',
                'nullable',
            ],
            'requestHistory.pickup_address' => [
                'string',
                'nullable',
            ],
            'requestHistory.drop_address' => [
                'string',
                'nullable',
            ],
            'requestHistory.base_price' => [
                'string',
                'nullable',
            ],
            'requestHistory.distance_price' => [
                'string',
                'nullable',
            ],
            'requestHistory.discount_price' => [
                'string',
                'nullable',
            ],
            'requestHistory.eta_discount_price' => [
                'string',
                'nullable',
            ],
            'requestHistory.tax_price' => [
                'string',
                'nullable',
            ],
            'requestHistory.surge_price' => [
                'string',
                'nullable',
            ],
            'requestHistory.total_amount' => [
                'string',
                'nullable',
            ],
            'requestHistory.coupon_deduction' => [
                'string',
                'nullable',
            ],
            'requestHistory.coupon_id' => [
                'integer',
                'exists:promocodes,id',
                'nullable',
            ],
            'requestHistory.paid_amount' => [
                'string',
                'nullable',
            ],
            'requestHistory.provider_earnings' => [
                'string',
                'nullable',
            ],
            'requestHistory.provider_admin_commission' => [
                'string',
                'nullable',
            ],
            'requestHistory.ride_status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['ride_status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user_name']     = User::pluck('name', 'id')->toArray();
        $this->listsForFields['provider_name'] = User::pluck('name', 'id')->toArray();
        $this->listsForFields['coupon']        = Promocode::pluck('promocode', 'id')->toArray();
        $this->listsForFields['ride_status']   = $this->requestHistory::RIDE_STATUS_SELECT;
    }
}
