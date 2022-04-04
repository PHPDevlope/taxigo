<form wire:submit.prevent="submit" class="pt-3">

    <div class="col-md-9">
        <div class="form-group mt-2 px-4">
            <div class="row card bg-white py-4 px-4">
                <label class="form-label required" for="payment_mode_cash">Cash Payment</label>
                <div class="form-check form-switch">
                    <input class="form-check-input payment" type="checkbox" role="switch" name="payment_mode_cash"
                           id="payment_mode_cash"
                           wire:model.defer="payment_mode_cash" {{ $this->payment_mode_cash === 1 ? 'checked' : '' }}>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="form-group mt-2 px-4">
            <div class="row card bg-white py-4 px-4">
                <label class="form-label required" for="payment_mode_stripe">Stripe</label>
                <div class="form-check form-switch">
                    <input class="form-check-input payment" type="checkbox" role="switch" name="payment_mode_stripe"
                           id="payment_mode_stripe" onclick="showTab('#stripe')"
                           wire:model.defer="payment_mode_stripe" {{ ($this->payment_mode_stripe == 1) ? 'checked' : '' }}>
                </div>
                <div id="stripe" style="{{ $this->payment_mode_stripe == 0 ? "display:none" : "display:block" }}">
                    <div class="form-group ml-4">
                        <label class="form-label required text-danger">Id</label>
                        <input class="form-control" type="text" name="payment_mode_stripe_id"
                               id="payment_mode_stripe_id" wire:model.defer="payment_mode_stripe_id">
                    </div>
                    <div class="form-group ml-4">
                        <label class="form-label required text-danger">Secret</label>
                        <input class="form-control" type="text" name="payment_mode_stripe_secret"
                               id="payment_mode_stripe_secret" wire:model.defer="payment_mode_stripe_secret">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="form-group mt-2 px-4">
            <div class="row card bg-white py-4 px-4">
                <label class="form-label required" for="payment_mode_paypal">Paypal</label>
                <div class="form-check form-switch">
                    <input class="form-check-input payment" type="checkbox" role="switch" name="payment_mode_paypal"
                           id="payment_mode_paypal" onclick="showTab('#paypal')"
                           wire:model.defer="payment_mode_paypal" {{ ($this->payment_mode_paypal == 1) ? 'checked' : '' }}>
                </div>
                <div id="paypal" style="{{ $this->payment_mode_paypal == 0 ? "display:none" : "display:block" }}">
                    <div class="form-group ml-4">
                        <label class="form-label required text-danger">Id</label>
                        <input class="form-control" type="text" name="payment_mode_paypal_id"
                               id="payment_mode_paypal_id" wire:model.defer="payment_mode_paypal_id">
                    </div>
                    <div class="form-group ml-4">
                        <label class="form-label required text-danger">Secret</label>
                        <input class="form-control" type="text" name="payment_mode_paypal_secret"
                               id="payment_mode_paypal_secret" wire:model.defer="payment_mode_paypal_secret">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="form-group mt-2 px-4">
            <div class="row card bg-white py-4 px-4">
                <label class="form-label required" for="payment_mode_paytm">Paytm</label>
                <div class="form-check form-switch">
                    <input class="form-check-input payment" type="checkbox" role="switch" name="payment_mode_paytm"
                           id="payment_mode_paytm" onclick="showTab('#paytm');"
                           wire:model.defer="payment_mode_paytm" {{ ($this->payment_mode_paytm == 1) ? 'checked' : '' }}>
                </div>
                <div id="paytm" style="{{ $this->payment_mode_paytm == 0 ? "display:none" : "display:block" }}">
                    <div class="form-group ml-4">
                        <label class="form-label required text-danger">Id</label>
                        <input class="form-control" type="text" name="payment_mode_paytm_id" id="payment_mode_paytm_id"
                               wire:model.defer="payment_mode_paytm_id">
                    </div>
                    <div class="form-group ml-4">
                        <label class="form-label required text-danger">Secret</label>
                        <input class="form-control" type="text" name="payment_mode_paytm_secret"
                               id="payment_mode_paytm_secret" wire:model.defer="payment_mode_paytm_secret">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group mt-4">
        <button class="btn d-inline-flex btn-sm btn-dark" type="submit">
            Update Site Setting
        </button>
    </div>

    <script>
        function showTab(tab) {
            $(tab).toggle();
        }
    </script>

</form>
