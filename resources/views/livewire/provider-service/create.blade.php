<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2">
        <label class="form-label" for="user_name">User</label>
        <x-select-list class="form-control" id="user_name" name="user_name" :options="$this->listsForFields['user_name']" wire:model="providerService.user_id" />
        <div class="validation-message">
            {{ $errors->first('providerService.user_id') }}
        </div>
    </div>

    <div class="form-group mt-2">
        <label class="form-label" for="service_name">Document</label>
        <x-select-list class="form-control" id="service_name" name="service_name" :options="$this->listsForFields['service_name']" wire:model="providerService.service_id" />
        <div class="validation-message">
            {{ $errors->first('providerService.service_id') }}
        </div>
    </div>

    <div class="form-group mt-2">
        <label class="form-label" for="service_number">Service Number</label>
        <input type="text" class="form-control" name="service_number" id="service_number" wire:model.defer="providerService.service_number">
        <div class="validation-message">
            {{ $errors->first('providerService.service_number') }}
        </div>
    </div>

    <div class="form-group mt-2">
        <label class="form-label" for="service_model">Service Model</label>
        <input type="text" class="form-control" name="service_model" id="service_model" wire:model.defer="providerService.service_model">
        <div class="validation-message">
            {{ $errors->first('providerService.service_model') }}
        </div>
    </div>

    <div class="form-group mt-4">
        <button class="btn btn-dark btn-sm mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a data-bs-dismiss="offcanvas" class="btn btn-sm btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>
