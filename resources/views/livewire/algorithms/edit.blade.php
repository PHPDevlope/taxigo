<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2">
        <label class="form-label required" for="provider_accept_timeout">Provider Accept Timeout (Secs)</label>
        <input class="form-control" type="number" name="provider_accept_timeout" id="provider_accept_timeout" wire:model.defer="provider_accept_timeout">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="provider_search_radius">Provider Search Radius (Kms)</label>
        <input class="form-control" type="number" name="provider_search_radius" id="provider_search_radius" wire:model.defer="provider_search_radius">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="distance">Distance</label>
        <input class="form-control" type="text" name="distance" id="distance" wire:model.defer="distance">
    </div>

    <div class="form-group mt-4">
        <button class="btn d-inline-flex btn-sm btn-dark" type="submit">
            Update Site Setting
        </button>
    </div>

</form>
