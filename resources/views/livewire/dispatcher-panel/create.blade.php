<div>
    <div class="row">
        <div class="col">
            <div class="form-group mt-2">
                <label class="form-label required" for="name">First Name</label>
                <input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name">
            </div>
        </div>
        <div class="col">
            <div class="form-group mt-2">
                <label class="form-label required" for="name">Last Name</label>
                <input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group mt-2">
                <label class="form-label required" for="name">Email</label>
                <input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name">
            </div>
        </div>
        <div class="col">
            <div class="form-group mt-2">
                <label class="form-label required" for="name">Phone</label>
                <input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name">
            </div>
        </div>
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="name">Pickup Address</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="name">Schedule Time</label>
        <input class="form-control" type="date" name="name" id="name" required wire:model.defer="user.name">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="name">Service Type</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name">
    </div>

    <div class="form-group mt-4">
        <button class="btn d-inline-flex btn-sm btn-dark" type="submit">
            {{ trans('global.save') }}
        </button>
        <a data-bs-dismiss="offcanvas" class="btn d-inline-flex btn-sm btn-secondary mx-1">
            {{ trans('global.cancel') }}
        </a>
    </div>
</div>
