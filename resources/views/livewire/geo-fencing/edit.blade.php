<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('geoFencing.city_name') ? 'invalid' : '' }}">
        <label class="form-label" for="city_name">{{ trans('cruds.geoFencing.fields.city_name') }}</label>
        <input class="form-control" type="text" name="city_name" id="city_name" wire:model.defer="geoFencing.city_name">
        <div class="validation-message">
            {{ $errors->first('geoFencing.city_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.geoFencing.fields.city_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('geoFencing.distance') ? 'invalid' : '' }}">
        <label class="form-label" for="distance">{{ trans('cruds.geoFencing.fields.distance') }}</label>
        <input class="form-control" type="text" name="distance" id="distance" wire:model.defer="geoFencing.distance">
        <div class="validation-message">
            {{ $errors->first('geoFencing.distance') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.geoFencing.fields.distance_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('geoFencing.distance_price') ? 'invalid' : '' }}">
        <label class="form-label" for="distance_price">{{ trans('cruds.geoFencing.fields.distance_price') }}</label>
        <input class="form-control" type="text" name="distance_price" id="distance_price" wire:model.defer="geoFencing.distance_price">
        <div class="validation-message">
            {{ $errors->first('geoFencing.distance_price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.geoFencing.fields.distance_price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('geoFencing.city_limits') ? 'invalid' : '' }}">
        <label class="form-label" for="city_limits">{{ trans('cruds.geoFencing.fields.city_limits') }}</label>
        <input class="form-control" type="text" name="city_limits" id="city_limits" wire:model.defer="geoFencing.city_limits">
        <div class="validation-message">
            {{ $errors->first('geoFencing.city_limits') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.geoFencing.fields.city_limits_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('geoFencing.minute_price') ? 'invalid' : '' }}">
        <label class="form-label" for="minute_price">{{ trans('cruds.geoFencing.fields.minute_price') }}</label>
        <input class="form-control" type="text" name="minute_price" id="minute_price" wire:model.defer="geoFencing.minute_price">
        <div class="validation-message">
            {{ $errors->first('geoFencing.minute_price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.geoFencing.fields.minute_price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('geoFencing.pricing_logic') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.geoFencing.fields.pricing_logic') }}</label>
        <select class="form-control" wire:model="geoFencing.pricing_logic">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['pricing_logic'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('geoFencing.pricing_logic') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.geoFencing.fields.pricing_logic_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('geoFencing.hour_price') ? 'invalid' : '' }}">
        <label class="form-label" for="hour_price">{{ trans('cruds.geoFencing.fields.hour_price') }}</label>
        <input class="form-control" type="text" name="hour_price" id="hour_price" wire:model.defer="geoFencing.hour_price">
        <div class="validation-message">
            {{ $errors->first('geoFencing.hour_price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.geoFencing.fields.hour_price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('geoFencing.base_price') ? 'invalid' : '' }}">
        <label class="form-label" for="base_price">{{ trans('cruds.geoFencing.fields.base_price') }}</label>
        <input class="form-control" type="text" name="base_price" id="base_price" wire:model.defer="geoFencing.base_price">
        <div class="validation-message">
            {{ $errors->first('geoFencing.base_price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.geoFencing.fields.base_price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('geoFencing.base_distance') ? 'invalid' : '' }}">
        <label class="form-label" for="base_distance">{{ trans('cruds.geoFencing.fields.base_distance') }}</label>
        <input class="form-control" type="text" name="base_distance" id="base_distance" wire:model.defer="geoFencing.base_distance">
        <div class="validation-message">
            {{ $errors->first('geoFencing.base_distance') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.geoFencing.fields.base_distance_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('geoFencing.unit_time_pricing') ? 'invalid' : '' }}">
        <label class="form-label" for="unit_time_pricing">{{ trans('cruds.geoFencing.fields.unit_time_pricing') }}</label>
        <input class="form-control" type="text" name="unit_time_pricing" id="unit_time_pricing" wire:model.defer="geoFencing.unit_time_pricing">
        <div class="validation-message">
            {{ $errors->first('geoFencing.unit_time_pricing') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.geoFencing.fields.unit_time_pricing_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('geoFencing.unit_distance_price') ? 'invalid' : '' }}">
        <label class="form-label" for="unit_distance_price">{{ trans('cruds.geoFencing.fields.unit_distance_price') }}</label>
        <input class="form-control" type="text" name="unit_distance_price" id="unit_distance_price" wire:model.defer="geoFencing.unit_distance_price">
        <div class="validation-message">
            {{ $errors->first('geoFencing.unit_distance_price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.geoFencing.fields.unit_distance_price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('geoFencing.seat_capacity') ? 'invalid' : '' }}">
        <label class="form-label" for="seat_capacity">{{ trans('cruds.geoFencing.fields.seat_capacity') }}</label>
        <input class="form-control" type="text" name="seat_capacity" id="seat_capacity" wire:model.defer="geoFencing.seat_capacity">
        <div class="validation-message">
            {{ $errors->first('geoFencing.seat_capacity') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.geoFencing.fields.seat_capacity_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('geoFencing.waive_off_minutes') ? 'invalid' : '' }}">
        <label class="form-label" for="waive_off_minutes">{{ trans('cruds.geoFencing.fields.waive_off_minutes') }}</label>
        <input class="form-control" type="text" name="waive_off_minutes" id="waive_off_minutes" wire:model.defer="geoFencing.waive_off_minutes">
        <div class="validation-message">
            {{ $errors->first('geoFencing.waive_off_minutes') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.geoFencing.fields.waive_off_minutes_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('geoFencing.per_minute_fare') ? 'invalid' : '' }}">
        <label class="form-label" for="per_minute_fare">{{ trans('cruds.geoFencing.fields.per_minute_fare') }}</label>
        <input class="form-control" type="text" name="per_minute_fare" id="per_minute_fare" wire:model.defer="geoFencing.per_minute_fare">
        <div class="validation-message">
            {{ $errors->first('geoFencing.per_minute_fare') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.geoFencing.fields.per_minute_fare_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('geoFencing.night_fare') ? 'invalid' : '' }}">
        <label class="form-label" for="night_fare">{{ trans('cruds.geoFencing.fields.night_fare') }}</label>
        <input class="form-control" type="text" name="night_fare" id="night_fare" wire:model.defer="geoFencing.night_fare">
        <div class="validation-message">
            {{ $errors->first('geoFencing.night_fare') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.geoFencing.fields.night_fare_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('geoFencing.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.geoFencing.fields.status') }}</label>
        <select class="form-control" wire:model="geoFencing.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('geoFencing.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.geoFencing.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.geo-fencings.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>