<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2">
        <label class="form-label required" for="ios_push_environment">IOS Push Environment</label>
{{--        <input class="form-control" type="text" name="ios_push_environment" id="ios_push_environment" wire:model.defer="ios_push_environment">--}}
        <select class="form-control" name="ios_push_environment" id="ios_push_environment" wire:model.defer="ios_push_environment">
            <option value="development">Development</option>
            <option value="production">Production</option>
        </select>
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="ios_push_user_pem">IOS Push User Pem</label>
        <input class="form-control" type="file" name="ios_push_user_pem" id="ios_push_user_pem" wire:model.defer="ios_push_user_pem">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="ios_push_provider_pem">IOS Push Provider Pem</label>
        <input class="form-control" type="file" name="ios_push_user_pem" id="ios_push_user_pem" wire:model.defer="ios_push_provider_pem">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="ios_push_password">IOS Push Password</label>
        <input class="form-control" type="text" name="ios_push_user_pem" id="ios_push_user_pem" wire:model.defer="ios_push_password">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="android_push_key">Android Push Key</label>
        <input class="form-control" type="text" name="android_push_key" id="android_push_key" wire:model.defer="android_push_key">
    </div>

    <div class="form-group mt-4">
        <button class="btn d-inline-flex btn-sm btn-dark" type="submit">
            Update Site Setting
        </button>
    </div>

</form>
