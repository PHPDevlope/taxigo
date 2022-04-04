<form wire:submit.prevent="submit" class="pt-3">

    <div class="row">
        <div class="col-md-12 d-flex gap-4">
            <div class="col-md-3">
                <x-select-list class="form-control" id="service" name="service" :options="$this->listsForFields['service_name']" wire:model="serviceID" />
                <div class="validation-message">
                    {{ $errors->first('serviceID') }}
                </div>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="service_number" placeholder="Number (CY 98765)" id="service_number" wire:model.defer="serviceNum">
                <div class="validation-message">
                    {{ $errors->first('serviceNum') }}
                </div>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="service_model" placeholder="Model(Audi R8 -White)" id="service_model" wire:model.defer="serviceMod">
                <div class="validation-message">
                    {{ $errors->first('serviceMod') }}
                </div>
            </div>
            <div class="col-md-3">
                <button class="btn btn-dark btn-sm mt-1" type="submit">
                    {{ trans('global.update') }}
                </button>
            </div>
        </div>
    </div>

</form>
