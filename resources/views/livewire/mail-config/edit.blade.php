<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2">
        <label class="form-label required" for="send_mail">Send Mail</label>
        {{--        <livewire:toggle-button :model="$this->send_mail_all" :name="'value'" key="'value'.$this->send_mail_all->id"/>--}}
        <br>
        <div class="form-check form-switch">
            <input class="form-check-input payment" type="checkbox" name="send_mail" id="send_mail"
                   wire:model.defer="send_mail"
                   onclick="showTab('#mail_field')" {{ ($this->send_mail == 1) ? "checked" : ""}}>
        </div>
    </div>

    <div id="mail_field" style="{{$this->send_mail === 1 ? "display:block" : "display:none"}}">
        <div class="form-group mt-2">
            <label class="form-label required" for="driver">Driver</label>
            <input class="form-control" type="text" name="driver" id="driver" wire:model.defer="driver">
        </div>

        <div class="form-group mt-2">
            <label class="form-label required" for="host">Host</label>
            <input class="form-control" type="text" name="host" id="host" wire:model.defer="host">
        </div>

        <div class="form-group mt-2">
            <label class="form-label required" for="port">Port</label>
            <input class="form-control" type="text" name="port" id="port" wire:model.defer="port">
        </div>

        <div class="form-group mt-2">
            <label class="form-label required" for="username">Username</label>
            <input class="form-control" type="text" name="username" id="username" wire:model.defer="username">
        </div>

        <div class="form-group mt-2">
            <label class="form-label required" for="password">Password</label>
            <input class="form-control" type="text" name="password" id="password" wire:model.defer="password">
        </div>

        <div class="form-group mt-2">
            <label class="form-label required" for="from_address">From Address</label>
            <input class="form-control" type="text" name="from_address" id="from_address"
                   wire:model.defer="from_address">
        </div>

        <div class="form-group mt-2">
            <label class="form-label required" for="from_name">from Number</label>
            <input class="form-control" type="text" name="from_name" id="from_name" wire:model.defer="from_name">
        </div>

        <div class="form-group mt-2">
            <label class="form-label required" for="encryption">Encryption</label>
            <input class="form-control" type="text" name="encryption" id="encryption" wire:model.defer="encryption">
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
