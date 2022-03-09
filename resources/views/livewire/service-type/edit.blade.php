<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2 {{ $errors->has('serviceType.service_name') ? 'invalid' : '' }}">
        <label class="form-label" for="service_name">{{ trans('cruds.serviceType.fields.service_name') }}</label>
        <input class="form-control" type="text" name="service_name" id="service_name" wire:model.defer="serviceType.service_name">
        <div class="validation-message">
            {{ $errors->first('serviceType.service_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.serviceType.fields.service_name_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('serviceType.provider_name') ? 'invalid' : '' }}">
        <label class="form-label" for="provider_name">{{ trans('cruds.serviceType.fields.provider_name') }}</label>
        <input class="form-control" type="text" name="provider_name" id="provider_name" wire:model.defer="serviceType.provider_name">
        <div class="validation-message">
            {{ $errors->first('serviceType.provider_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.serviceType.fields.provider_name_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('mediaCollections.service_type_service_maker_image') ? 'invalid' : '' }}">
        <label class="form-label" for="service_maker_image">{{ trans('cruds.serviceType.fields.service_maker_image') }}</label>
        <x-dropzone id="service_maker_image" name="service_maker_image" action="{{ route('admin.service-types.storeMedia') }}" collection-name="service_type_service_maker_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.service_type_service_maker_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.serviceType.fields.service_maker_image_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('mediaCollections.service_type_service_image') ? 'invalid' : '' }}">
        <label class="form-label" for="service_image">{{ trans('cruds.serviceType.fields.service_image') }}</label>
        <x-dropzone id="service_image" name="service_image" action="{{ route('admin.service-types.storeMedia') }}" collection-name="service_type_service_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.service_type_service_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.serviceType.fields.service_image_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('serviceType.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.serviceType.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="serviceType.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('serviceType.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.serviceType.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('serviceType.outstation_oneway_price') ? 'invalid' : '' }}">
        <label class="form-label" for="outstation_oneway_price">{{ trans('cruds.serviceType.fields.outstation_oneway_price') }}</label>
        <input class="form-control" type="number" name="outstation_oneway_price" id="outstation_oneway_price" wire:model.defer="serviceType.outstation_oneway_price" step="0.01">
        <div class="validation-message">
            {{ $errors->first('serviceType.outstation_oneway_price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.serviceType.fields.outstation_oneway_price_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('serviceType.outstation_roundtrip_price') ? 'invalid' : '' }}">
        <label class="form-label" for="outstation_roundtrip_price">{{ trans('cruds.serviceType.fields.outstation_roundtrip_price') }}</label>
        <input class="form-control" type="number" name="outstation_roundtrip_price" id="outstation_roundtrip_price" wire:model.defer="serviceType.outstation_roundtrip_price" step="0.01">
        <div class="validation-message">
            {{ $errors->first('serviceType.outstation_roundtrip_price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.serviceType.fields.outstation_roundtrip_price_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('serviceType.driver_bata') ? 'invalid' : '' }}">
        <label class="form-label" for="driver_bata">{{ trans('cruds.serviceType.fields.driver_bata') }}</label>
        <input class="form-control" type="number" name="driver_bata" id="driver_bata" wire:model.defer="serviceType.driver_bata" step="0.01">
        <div class="validation-message">
            {{ $errors->first('serviceType.driver_bata') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.serviceType.fields.driver_bata_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('serviceType.rental_per_hour') ? 'invalid' : '' }}">
        <label class="form-label" for="rental_per_hour">{{ trans('cruds.serviceType.fields.rental_per_hour') }}</label>
        <input class="form-control" type="text" name="rental_per_hour" id="rental_per_hour" wire:model.defer="serviceType.rental_per_hour">
        <div class="validation-message">
            {{ $errors->first('serviceType.rental_per_hour') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.serviceType.fields.rental_per_hour_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('peak_time') ? 'invalid' : '' }}">
        <label class="form-label" for="peak_time">{{ trans('cruds.serviceType.fields.peak_time') }}</label>
        <x-select-list class="form-control" id="peak_time" name="peak_time" wire:model="peak_time" :options="$this->listsForFields['peak_time']" multiple />
        <div class="validation-message">
            {{ $errors->first('peak_time') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.serviceType.fields.peak_time_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('serviceType.night_fare') ? 'invalid' : '' }}">
        <label class="form-label" for="night_fare">{{ trans('cruds.serviceType.fields.night_fare') }}</label>
        <input class="form-control" type="text" name="night_fare" id="night_fare" wire:model.defer="serviceType.night_fare">
        <div class="validation-message">
            {{ $errors->first('serviceType.night_fare') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.serviceType.fields.night_fare_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('geo_fencing') ? 'invalid' : '' }}">
        <label class="form-label" for="geo_fencing">{{ trans('cruds.serviceType.fields.geo_fencing') }}</label>
        <x-select-list class="form-control" id="geo_fencing" name="geo_fencing" wire:model="geo_fencing" :options="$this->listsForFields['geo_fencing']" multiple />
        <div class="validation-message">
            {{ $errors->first('geo_fencing') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.serviceType.fields.geo_fencing_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('serviceType.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.serviceType.fields.status') }}</label>
        <select class="form-control" wire:model="serviceType.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('serviceType.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.serviceType.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group mt-4">
        <button class="btn btn-dark btn-sm mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.service.service-types') }}" class="btn btn-secondary btn-sm">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
