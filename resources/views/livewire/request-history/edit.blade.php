<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('requestHistory.user_name_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user_name">{{ trans('cruds.requestHistory.fields.user_name') }}</label>
        <x-select-list class="form-control" id="user_name" name="user_name" :options="$this->listsForFields['user_name']" wire:model="requestHistory.user_name_id" />
        <div class="validation-message">
            {{ $errors->first('requestHistory.user_name_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.user_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.provider_name_id') ? 'invalid' : '' }}">
        <label class="form-label" for="provider_name">{{ trans('cruds.requestHistory.fields.provider_name') }}</label>
        <x-select-list class="form-control" id="provider_name" name="provider_name" :options="$this->listsForFields['provider_name']" wire:model="requestHistory.provider_name_id" />
        <div class="validation-message">
            {{ $errors->first('requestHistory.provider_name_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.provider_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.total_distance') ? 'invalid' : '' }}">
        <label class="form-label" for="total_distance">{{ trans('cruds.requestHistory.fields.total_distance') }}</label>
        <input class="form-control" type="text" name="total_distance" id="total_distance" wire:model.defer="requestHistory.total_distance">
        <div class="validation-message">
            {{ $errors->first('requestHistory.total_distance') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.total_distance_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.ride_start_time') ? 'invalid' : '' }}">
        <label class="form-label" for="ride_start_time">{{ trans('cruds.requestHistory.fields.ride_start_time') }}</label>
        <x-date-picker class="form-control" wire:model="requestHistory.ride_start_time" id="ride_start_time" name="ride_start_time" />
        <div class="validation-message">
            {{ $errors->first('requestHistory.ride_start_time') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.ride_start_time_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.ride_end_time') ? 'invalid' : '' }}">
        <label class="form-label" for="ride_end_time">{{ trans('cruds.requestHistory.fields.ride_end_time') }}</label>
        <x-date-picker class="form-control" wire:model="requestHistory.ride_end_time" id="ride_end_time" name="ride_end_time" />
        <div class="validation-message">
            {{ $errors->first('requestHistory.ride_end_time') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.ride_end_time_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.otp') ? 'invalid' : '' }}">
        <label class="form-label" for="otp">{{ trans('cruds.requestHistory.fields.otp') }}</label>
        <input class="form-control" type="text" name="otp" id="otp" wire:model.defer="requestHistory.otp">
        <div class="validation-message">
            {{ $errors->first('requestHistory.otp') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.otp_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.pickup_address') ? 'invalid' : '' }}">
        <label class="form-label" for="pickup_address">{{ trans('cruds.requestHistory.fields.pickup_address') }}</label>
        <textarea class="form-control" name="pickup_address" id="pickup_address" wire:model.defer="requestHistory.pickup_address" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('requestHistory.pickup_address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.pickup_address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.drop_address') ? 'invalid' : '' }}">
        <label class="form-label" for="drop_address">{{ trans('cruds.requestHistory.fields.drop_address') }}</label>
        <textarea class="form-control" name="drop_address" id="drop_address" wire:model.defer="requestHistory.drop_address" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('requestHistory.drop_address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.drop_address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.base_price') ? 'invalid' : '' }}">
        <label class="form-label" for="base_price">{{ trans('cruds.requestHistory.fields.base_price') }}</label>
        <input class="form-control" type="text" name="base_price" id="base_price" wire:model.defer="requestHistory.base_price">
        <div class="validation-message">
            {{ $errors->first('requestHistory.base_price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.base_price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.distance_price') ? 'invalid' : '' }}">
        <label class="form-label" for="distance_price">{{ trans('cruds.requestHistory.fields.distance_price') }}</label>
        <input class="form-control" type="text" name="distance_price" id="distance_price" wire:model.defer="requestHistory.distance_price">
        <div class="validation-message">
            {{ $errors->first('requestHistory.distance_price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.distance_price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.discount_price') ? 'invalid' : '' }}">
        <label class="form-label" for="discount_price">{{ trans('cruds.requestHistory.fields.discount_price') }}</label>
        <input class="form-control" type="text" name="discount_price" id="discount_price" wire:model.defer="requestHistory.discount_price">
        <div class="validation-message">
            {{ $errors->first('requestHistory.discount_price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.discount_price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.eta_discount_price') ? 'invalid' : '' }}">
        <label class="form-label" for="eta_discount_price">{{ trans('cruds.requestHistory.fields.eta_discount_price') }}</label>
        <input class="form-control" type="text" name="eta_discount_price" id="eta_discount_price" wire:model.defer="requestHistory.eta_discount_price">
        <div class="validation-message">
            {{ $errors->first('requestHistory.eta_discount_price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.eta_discount_price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.tax_price') ? 'invalid' : '' }}">
        <label class="form-label" for="tax_price">{{ trans('cruds.requestHistory.fields.tax_price') }}</label>
        <input class="form-control" type="text" name="tax_price" id="tax_price" wire:model.defer="requestHistory.tax_price">
        <div class="validation-message">
            {{ $errors->first('requestHistory.tax_price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.tax_price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.surge_price') ? 'invalid' : '' }}">
        <label class="form-label" for="surge_price">{{ trans('cruds.requestHistory.fields.surge_price') }}</label>
        <input class="form-control" type="text" name="surge_price" id="surge_price" wire:model.defer="requestHistory.surge_price">
        <div class="validation-message">
            {{ $errors->first('requestHistory.surge_price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.surge_price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.total_amount') ? 'invalid' : '' }}">
        <label class="form-label" for="total_amount">{{ trans('cruds.requestHistory.fields.total_amount') }}</label>
        <input class="form-control" type="text" name="total_amount" id="total_amount" wire:model.defer="requestHistory.total_amount">
        <div class="validation-message">
            {{ $errors->first('requestHistory.total_amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.total_amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.coupon_deduction') ? 'invalid' : '' }}">
        <label class="form-label" for="coupon_deduction">{{ trans('cruds.requestHistory.fields.coupon_deduction') }}</label>
        <input class="form-control" type="text" name="coupon_deduction" id="coupon_deduction" wire:model.defer="requestHistory.coupon_deduction">
        <div class="validation-message">
            {{ $errors->first('requestHistory.coupon_deduction') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.coupon_deduction_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.coupon_id') ? 'invalid' : '' }}">
        <label class="form-label" for="coupon">{{ trans('cruds.requestHistory.fields.coupon') }}</label>
        <x-select-list class="form-control" id="coupon" name="coupon" :options="$this->listsForFields['coupon']" wire:model="requestHistory.coupon_id" />
        <div class="validation-message">
            {{ $errors->first('requestHistory.coupon_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.coupon_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.paid_amount') ? 'invalid' : '' }}">
        <label class="form-label" for="paid_amount">{{ trans('cruds.requestHistory.fields.paid_amount') }}</label>
        <input class="form-control" type="text" name="paid_amount" id="paid_amount" wire:model.defer="requestHistory.paid_amount">
        <div class="validation-message">
            {{ $errors->first('requestHistory.paid_amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.paid_amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.provider_earnings') ? 'invalid' : '' }}">
        <label class="form-label" for="provider_earnings">{{ trans('cruds.requestHistory.fields.provider_earnings') }}</label>
        <input class="form-control" type="text" name="provider_earnings" id="provider_earnings" wire:model.defer="requestHistory.provider_earnings">
        <div class="validation-message">
            {{ $errors->first('requestHistory.provider_earnings') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.provider_earnings_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.provider_admin_commission') ? 'invalid' : '' }}">
        <label class="form-label" for="provider_admin_commission">{{ trans('cruds.requestHistory.fields.provider_admin_commission') }}</label>
        <input class="form-control" type="text" name="provider_admin_commission" id="provider_admin_commission" wire:model.defer="requestHistory.provider_admin_commission">
        <div class="validation-message">
            {{ $errors->first('requestHistory.provider_admin_commission') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.provider_admin_commission_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requestHistory.ride_status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.requestHistory.fields.ride_status') }}</label>
        <select class="form-control" wire:model="requestHistory.ride_status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['ride_status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('requestHistory.ride_status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requestHistory.fields.ride_status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.request-histories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>