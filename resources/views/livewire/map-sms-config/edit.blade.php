<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2">
        <label class="form-label required" for="web_map_key">Web Map Key</label>
        <input class="form-control" type="text" name="web_map_key" id="web_map_key" wire:model.defer="web_map_key">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="android_map_key">Android Map Key</label>
        <input class="form-control" type="text" name="android_map_key" id="android_map_key" wire:model.defer="android_map_key" >
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="ios_map_key">IOS Map Key</label>
        <input class="form-control" type="text" name="ios_map_key" id="ios_map_key" wire:model.defer="ios_map_key">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="fb_app_version">FB App Version</label>
        <input class="form-control" type="text" name="fb_app_version" id="fb_app_version" wire:model.defer="fb_app_version">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="fb_app_id">FB App ID</label>
        <input class="form-control" type="text" name="fb_app_id" id="fb_app_id" wire:model.defer="fb_app_id">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="fb_app_secret">FB App Secret</label>
        <input class="form-control" type="text" name="fb_app_secret" id="fb_app_secret" wire:model.defer="fb_app_secret">
    </div>

    <div class="form-group mt-4">
        <button class="btn d-inline-flex btn-sm btn-dark" type="submit">
            Update Site Setting
        </button>
    </div>

</form>
