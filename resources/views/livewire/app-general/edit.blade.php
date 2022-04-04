<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2">
        <label class="form-label required" for="site_name">Site Name</label>
        <input class="form-control" type="text" name="site_name" id="site_name" wire:model.defer="site_name">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="name">Site Logo</label>
        <input class="form-control" type="file" name="name" id="name">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="name">Site Icon</label>
        <input class="form-control" type="file" name="name" id="name">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="time_zone">Time Zone</label>
        <input class="form-control" type="text" name="time_zone" id="time_zone" wire:model.defer="time_zone">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="contact_number">Contact Number</label>
        <input class="form-control" type="number" name="contact_number" id="contact_number" wire:model.defer="contact_number">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="contact_email">Contact Email</label>
        <input class="form-control" type="email" name="contact_email" id="contact_email" wire:model.defer="contact_email">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="sos_number">SOS Number</label>
        <input class="form-control" type="number" name="sos_number" id="sos_number" wire:model.defer="sos_number">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="copyright_content">Copyright Content</label>
        <input class="form-control" type="text" name="copyright_content" id="copyright_content" wire:model.defer="copyright_content">
    </div>

    <div class="form-group mt-4">
        <button class="btn d-inline-flex btn-sm btn-dark" type="submit">
            Update Site Setting
        </button>
    </div>

</form>
