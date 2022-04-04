<?php

namespace App\Http\Livewire\PaySetting;

use App\Models\MSetting;
use Livewire\Component;

class Edit extends Component
{
    public MSetting $mSetting;
    public $daily_target;
    public $tax_percentage;
    public $commission;
    public $fleet_commission;
    public $peak_hours_commission;
    public $waiting_charges_commission;
    public $minimum_negative_balance;

    public function mount(MSetting $mSetting)
    {
        $dailyTarget = MSetting::where("key", "daily_target")->first();
        $taxPercentage = MSetting::where("key", "tax_percentage")->first();
        $commission = MSetting::where("key", "commission")->first();
        $fleetCommission = MSetting::where("key", "fleet_commission")->first();
        $peakHoursCommission = MSetting::where("key", "peak_hours_commission")->first();
        $waitingChargesCommission = MSetting::where("key", "waiting_charges_commission")->first();
        $minimumNegativeBalance = MSetting::where("key", "minimum_negative_balance")->first();

        $this->daily_target = $dailyTarget->value;
        $this->tax_percentage = $taxPercentage->value;
        $this->commission = $commission->value;
        $this->fleet_commission = $fleetCommission->value;
        $this->peak_hours_commission = $peakHoursCommission->value;
        $this->waiting_charges_commission = $waitingChargesCommission->value;
        $this->minimum_negative_balance = $minimumNegativeBalance->value;
    }

    public function render()
    {
        return view('livewire.pay-setting.edit');
    }

    public function submit()
    {
        $dailyTarget = MSetting::where("key", "daily_target")->first();
        $dailyTarget->update([
            "value" => $this->daily_target
        ]);

        $taxPercentage = MSetting::where("key", "tax_percentage")->first();
        $taxPercentage->update([
            "value" => $this->tax_percentage
        ]);

        $commission = MSetting::where("key", "commission")->first();
        $commission->update([
            "value" => $this->commission
        ]);

        $fleetCommission = MSetting::where("key", "fleet_commission")->first();
        $fleetCommission->update([
            "value" => $this->fleet_commission
        ]);

        $peakHoursCommission = MSetting::where("key", "peak_hours_commission")->first();
        $peakHoursCommission->update([
            "value" => $this->peak_hours_commission
        ]);

        $waitingChargesCommission = MSetting::where("key", "waiting_charges_commission")->first();
        $waitingChargesCommission->update([
            "value" => $this->waiting_charges_commission
        ]);

        $minimumNegativeBalance = MSetting::where("key", "minimum_negative_balance")->first();
        $minimumNegativeBalance->update([
            "value" => $this->minimum_negative_balance
        ]);

        return redirect()->route('admin.payment-settings.pay-settings');
    }
}
