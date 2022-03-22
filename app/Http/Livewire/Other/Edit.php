<?php

namespace App\Http\Livewire\Other;

use App\Models\MSetting;
use Livewire\Component;

class Edit extends Component
{
    public MSetting $mSetting;
    public $referral;
    public $referral_count;
    public $referral_amount;
    public $manual_assigning;
    public $unicast;
    public $ride_otp;
    public $booking_id_prefix;
    public $currency;
    public $db_backup;

    public function mount(MSetting $mSetting)
    {
        $referral = MSetting::where("key", "referral")->first();
        $referralCount = MSetting::where("key", "referral_count")->first();
        $referralAmount = MSetting::where("key", "referral_amount")->first();
        $manualAssigning = MSetting::where("key", "manual_assigning")->first();
        $unicast = MSetting::where("key", "unicast")->first();
        $rideOtp = MSetting::where("key", "ride_otp")->first();
        $bookingIdPrefix = MSetting::where("key", "booking_id_prefix")->first();
        $currency = MSetting::where("key", "currency")->first();
        $dbBackup = MSetting::where("key", "db_backup")->first();

        $this->referral = $referral->value == "1" ? 1 : 0;
        $this->referral_count = $referralCount->value;
        $this->referral_amount = $referralAmount->value;
        $this->manual_assigning = $manualAssigning->value == "1" ? 1 : 0;
        $this->unicast = $unicast->value == "1" ? 1 : 0;
        $this->ride_otp = $rideOtp->value == "1" ? 1 : 0;
        $this->booking_id_prefix = $bookingIdPrefix->value;
        $this->currency = $currency->value;
        $this->db_backup = $dbBackup->value;
    }

    public function render()
    {
        return view('livewire.other.edit');
    }

    public function submit()
    {
        $referral = MSetting::where("key", "referral")->first();
        $referral->update([
            "value" => $this->referral
        ]);

        $referralCount = MSetting::where("key", "referral_count")->first();
        $referralCount->update([
            "value" => $this->referral_count
        ]);

        $referralAmount = MSetting::where("key", "referral_amount")->first();
        $referralAmount->update([
            "value" => $this->referral_amount
        ]);

        $manualAssigning = MSetting::where("key", "manual_assigning")->first();
        $manualAssigning->update([
            "value" => $this->manual_assigning
        ]);

        $unicast = MSetting::where("key", "unicast")->first();
        $unicast->update([
            "value" => $this->unicast
        ]);

        $rideOtp = MSetting::where("key", "ride_otp")->first();
        $rideOtp->update([
            "value" => $this->ride_otp
        ]);

        $bookingIdPrefix = MSetting::where("key", "booking_id_prefix")->first();
        $bookingIdPrefix->update([
            "value" => $this->booking_id_prefix
        ]);

        $currency = MSetting::where("key", "currency")->first();
        $currency->update([
            "value" => $this->currency
        ]);

        $dbBackup = MSetting::where("key", "db_backup")->first();
        $dbBackup->update([
            "value" => $this->db_backup
        ]);

        return redirect()->route('admin.site-settings.others');
    }
}
