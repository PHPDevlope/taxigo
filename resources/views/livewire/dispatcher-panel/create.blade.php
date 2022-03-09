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
        <label class="form-label required" for="name">Drop Address</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name">
    </div>

    <div class="form-group mt-2">
        <label class="form-label required" for="name">Schedule Time</label>
        <x-date-picker class="form-control" wire:model="serviceType.date_time" id="date_time" name="date_time" />
    </div>

    <div class="form-group mt-2">
        <label class="form-label">Service Type</label>
        <select class="form-control" wire:model="serviceType.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['serviceType'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
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
