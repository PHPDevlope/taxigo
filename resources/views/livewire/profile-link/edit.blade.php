<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2">
        <label class="form-label required" for="playstore_user_link">Playstore User Link</label>
        <input class="form-control" type="text" name="playstore_user_link" id="playstore_user_link" wire:model.defer="playstore_user_link">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="playstore_provider_link">Playstore Provider Link</label>
        <input class="form-control" type="text" name="playstore_provider_link" id="playstore_provider_link" wire:model.defer="playstore_provider_link">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="appstore_user_link">Appstore User Link</label>
        <input class="form-control" type="text" name="appstore_user_link" id="appstore_user_link" wire:model.defer="appstore_user_link">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="appstore_provider_link">Appstore Provider Link</label>
        <input class="form-control" type="text" name="appstore_provider_link" id="appstore_provider_link" wire:model.defer="appstore_provider_link">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="facebook_link">Facebook Link</label>
        <input class="form-control" type="text" name="facebook_link" id="facebook_link" wire:model.defer="facebook_link">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="twitter_link">Twitter Link</label>
        <input class="form-control" type="text" name="twitter_link" id="twitter_link" wire:model.defer="twitter_link">
    </div>

    <div class="form-group mt-4">
        <button class="btn d-inline-flex btn-sm btn-dark" type="submit">
            Update Site Setting
        </button>
    </div>

</form>
