<?php

namespace App\Http\Livewire\PaymentMode;

use App\Models\MSetting;
use Livewire\Component;

class Edit extends Component
{
    public MSetting $mSetting;
    public $payment_mode_cash;
    public $payment_mode_stripe;
    public $payment_mode_stripe_id;
    public $payment_mode_stripe_secret;
    public $payment_mode_paypal;
    public $payment_mode_paypal_id;
    public $payment_mode_paypal_secret;
    public $payment_mode_paytm;
    public $payment_mode_paytm_id;
    public $payment_mode_paytm_secret;

    public function mount(MSetting $mSetting)
    {
        $paymentModeCash = MSetting::where("key", "payment_mode_cash")->first();
        $paymentModeStripe = MSetting::where("key", "payment_mode_stripe")->first();
        $paymentModePaypal = MSetting::where("key", "payment_mode_paypal")->first();
        $paymentModePaytm = MSetting::where("key", "payment_mode_paytm")->first();

        $this->payment_mode_cash = $paymentModeCash->value == "1" ? 1 : 0;

        $this->payment_mode_stripe = $paymentModeStripe->value == "1" ? 1 : 0;
        $this->payment_mode_stripe_id = $paymentModeStripe->field_1;
        $this->payment_mode_stripe_secret = $paymentModeStripe->field_2;

        $this->payment_mode_paypal = $paymentModePaypal->value == "1" ? 1 : 0;
        $this->payment_mode_paypal_id = $paymentModePaypal->field_1;
        $this->payment_mode_paypal_secret = $paymentModePaypal->field_2;

        $this->payment_mode_paytm = $paymentModePaytm->value == "1" ? 1 : 0;
        $this->payment_mode_paytm_id = $paymentModePaytm->field_1;
        $this->payment_mode_paytm_secret = $paymentModePaytm->field_2;
    }

    public function render()
    {
        return view('livewire.payment-mode.edit');
    }

    public function submit()
    {
        $paymentModeCash = MSetting::where("key", "payment_mode_cash")->first();
        $paymentModeCash->update([
            "value" => $this->payment_mode_cash
        ]);

        $paymentModeStripe = MSetting::where("key", "payment_mode_stripe")->first();
        $paymentModeStripe->update([
            "value" => $this->payment_mode_stripe,
            "field_1" => $this->payment_mode_stripe_id,
            "field_2" => $this->payment_mode_stripe_secret
        ]);

        $paymentModePaypal = MSetting::where("key", "payment_mode_paypal")->first();
        $paymentModePaypal->update([
            "value" => $this->payment_mode_paypal,
            "field_1" => $this->payment_mode_paypal_id,
            "field_2" => $this->payment_mode_paypal_secret
        ]);

        $paymentModePaytm = MSetting::where("key", "payment_mode_paytm")->first();
        $paymentModePaytm->update([
            "value" => $this->payment_mode_paytm,
            "field_1" => $this->payment_mode_paytm_id,
            "field_2" => $this->payment_mode_paytm_secret
        ]);

        return redirect()->route('admin.payment-settings.payment-modes');
    }

    public function updateing()
    {
        $paymentModeCash = MSetting::where("key", "payment_mode_cash")->first();
        dd($paymentModeCash);
    }

}
