<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2">
        <label class="form-label required" for="referral">Referral</label>
        <div class="form-check form-switch">
            <input class="form-check-input payment" type="checkbox" name="referral" id="referral"
                   onclick="showTab('#referral_p')"
                   wire:model.defer="referral" {{ ($this->referral == 1) ? "checked" : ""}}>
        </div>
    </div>

    <div id="referral_p" style="{{ $this->referral == 0 ? 'display:none' : 'display:block'}}">
        <div class="form-group mt-2">
            <label class="form-label required" for="referral_count">Referral count</label>
            <input class="form-control" type="number" name="referral_count" id="referral_count" wire:model.defer="referral_count">
        </div>

        <div class="form-group mt-2">
            <label class="form-label required" for="referral_amount">Referral Amount</label>
            <input class="form-control" type="number" name="referral_amount" id="referral_amount" wire:model.defer="referral_amount">
        </div>
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="manual_assigning">Manual Assigning</label>
        <div class="form-check form-switch">
            <input class="form-check-input payment" type="checkbox" name="manual_assigning" id="manual_assigning"
                   wire:model.defer="manual_assigning" {{ ($this->manual_assigning == 1) ? "checked" : ""}}>
        </div>
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="unicast">{{ $this->unicast == 0 ? 'UniCast' : 'BrodeCast'}}</label>
        <div class="form-check form-switch">
            <input class="form-check-input payment" type="checkbox" name="unicast" id="unicast"
                   wire:model.defer="unicast" {{ ($this->unicast == 1) ? "checked" : ""}}>
        </div>
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="ride_otp">Ride OTP</label>
        <div class="form-check form-switch">
            <input class="form-check-input payment" type="checkbox" name="ride_otp" id="ride_otp"
                   wire:model.defer="ride_otp" {{ ($this->ride_otp == 1) ? "checked" : ""}}>
        </div>
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="booking_id_prefix">Booking ID Prefix</label>
        <input class="form-control" type="text" name="booking_id_prefix" id="booking_id_prefix" wire:model.defer="booking_id_prefix">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="currency">Currency (₹)</label>
        <input class="form-control" type="text" name="currency" id="currency" wire:model.defer="currency">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="db_backup">DB Backup</label>
        <input class="form-control" type="text" name="db_backup" id="db_backup" wire:model.defer="db_backup">
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
