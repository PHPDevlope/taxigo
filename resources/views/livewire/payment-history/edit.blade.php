<form wire:submit.prevent="submit" class="pt-3">
    <div class="form-group mt-2 {{ $errors->has('paymentHistory.transaction') ? 'invalid' : '' }}">
        <label class="form-label" for="transaction">{{ trans('cruds.paymentHistory.fields.transaction') }}</label>
        <input class="form-control" type="text" name="transaction" id="transaction" wire:model.defer="paymentHistory.transaction">
        <div class="validation-message">
            {{ $errors->first('paymentHistory.transaction') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymentHistory.fields.transaction_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('paymentHistory.total_amount') ? 'invalid' : '' }}">
        <label class="form-label" for="total_amount">{{ trans('cruds.paymentHistory.fields.total_amount') }}</label>
        <input class="form-control" type="number" name="total_amount" id="total_amount" wire:model.defer="paymentHistory.total_amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('paymentHistory.total_amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymentHistory.fields.total_amount_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('paymentHistory.provider_amount') ? 'invalid' : '' }}">
        <label class="form-label" for="provider_amount">{{ trans('cruds.paymentHistory.fields.provider_amount') }}</label>
        <input class="form-control" type="number" name="provider_amount" id="provider_amount" wire:model.defer="paymentHistory.provider_amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('paymentHistory.provider_amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymentHistory.fields.provider_amount_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('paymentHistory.payment_mode') ? 'invalid' : '' }}">
        <label class="form-label" for="payment_mode">{{ trans('cruds.paymentHistory.fields.payment_mode') }}</label>
        <input class="form-control" type="text" name="payment_mode" id="payment_mode" wire:model.defer="paymentHistory.payment_mode">
        <div class="validation-message">
            {{ $errors->first('paymentHistory.payment_mode') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymentHistory.fields.payment_mode_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('paymentHistory.paument_status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.paymentHistory.fields.paument_status') }}</label>
        <select class="form-control" wire:model="paymentHistory.paument_status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['paument_status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('paymentHistory.paument_status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymentHistory.fields.paument_status_helper') }}
        </div>
    </div>

    <div class="form-group mt-4">
        <button class="btn btn-dark btn-sm mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.payment-details.payment-histories') }}" class="btn btn-sm btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
