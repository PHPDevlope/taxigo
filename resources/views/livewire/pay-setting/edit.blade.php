<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2">
        <label class="form-label required" for="daily_target">Daily Target</label>
        <input class="form-control" type="number" name="daily_target" id="daily_target" wire:model.defer="daily_target">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="tax_percentage">Tax Percentage (%)</label>
        <input class="form-control" type="number" name="tax_percentage" id="tax_percentage" wire:model.defer="tax_percentage">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="commission">Commission (%)</label>
        <input class="form-control" type="number" name="commission" id="commission" wire:model.defer="commission">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="fleet_commission">Fleet Commission (%)</label>
        <input class="form-control" type="number" name="fleet_commission" id="fleet_commission" wire:model.defer="fleet_commission">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="peak_hours_commission">Peak Hours Commission (%)</label>
        <input class="form-control" type="number" name="peak_hours_commission" id="peak_hours_commission" wire:model.defer="peak_hours_commission">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="waiting_charges_commission">Waiting Charges Commission (%)</label>
        <input class="form-control" type="number" name="waiting_charges_commission" id="waiting_charges_commission" wire:model.defer="waiting_charges_commission">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="minimum_negative_balance">Minimum Negative Balance</label>
        <input class="form-control" type="number" name="minimum_negative_balance" id="minimum_negative_balance" wire:model.defer="minimum_negative_balance">
    </div>

    <div class="form-group mt-4">
        <button class="btn d-inline-flex btn-sm btn-dark" type="submit">
            Update Site Setting
        </button>
    </div>

</form>
