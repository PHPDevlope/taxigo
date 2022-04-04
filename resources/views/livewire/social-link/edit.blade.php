<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2">
        <label class="form-label required" for="social_login">Social Login</label>
        <select name="social_login" id="social_login" class="form-control" wire:model.defer="social_login" onChange="showTab('#field')">
            <option value="enable">Enable</option>
            <option value="disable">Disable</option>
        </select>
    </div>

    <div id="field" style="{{$this->social_login === "enable" ? "display:block" : "display:none"}}">
        <div class="form-group mt-2">
            <label class="form-label required" for="facebook_client_id">Facebook Client ID</label>
            <input class="form-control" type="text" name="facebook_client_id" id="facebook_client_id" wire:model.defer="facebook_client_id">
        </div>

        <div class="form-group mt-2">
            <label class="form-label required" for="facebook_client_secret">Facebook Client Secret</label>
            <input class="form-control" type="text" name="facebook_client_secret" id="facebook_client_secret" wire:model.defer="facebook_client_secret">
        </div>

        <div class="form-group mt-2">
            <label class="form-label required" for="facebook_redirect_url">Facebook Redirect URL</label>
            <input class="form-control" type="text" name="facebook_redirect_url" id="facebook_redirect_url" wire:model.defer="facebook_redirect_url">
        </div>

        <div class="form-group mt-2">
            <label class="form-label required" for="google_client_id">Google Client ID</label>
            <input class="form-control" type="text" name="google_client_id" id="google_client_id" wire:model.defer="google_client_id">
        </div>

        <div class="form-group mt-2">
            <label class="form-label required" for="google_client_secret">Google Client Secret</label>
            <input class="form-control" type="text" name="google_client_secret" id="google_client_secret" wire:model.defer="google_client_secret">
        </div>

        <div class="form-group mt-2">
            <label class="form-label required" for="google_redirect_url">Google Redirect URL</label>
            <input class="form-control" type="text" name="google_redirect_url" id="google_redirect_url" wire:model.defer="google_redirect_url">
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
