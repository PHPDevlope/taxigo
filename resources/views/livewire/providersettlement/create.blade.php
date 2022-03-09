<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2 {{ $errors->has('providersettlement.provider_name') ? 'invalid' : '' }}">
        <label class="form-label" for="provider_name">{{ trans('cruds.providersettlement.fields.provider_name') }}</label>
        <input class="form-control" type="text" name="provider_name" id="provider_name" wire:model.defer="providersettlement.provider_name">
        <div class="validation-message">
            {{ $errors->first('providersettlement.provider_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.providersettlement.fields.provider_name_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('providersettlement.amount') ? 'invalid' : '' }}">
        <label class="form-label" for="amount">{{ trans('cruds.providersettlement.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" wire:model.defer="providersettlement.amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('providersettlement.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.providersettlement.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('providersettlement.type') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.providersettlement.fields.type') }}</label>
        <select class="form-control" wire:model="providersettlement.type">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['type'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('providersettlement.type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.providersettlement.fields.type_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('providersettlement.send') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.providersettlement.fields.send') }}</label>
        <select class="form-control" wire:model="providersettlement.send">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['send'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('providersettlement.send') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.providersettlement.fields.send_helper') }}
        </div>
    </div>

    <div class="form-group mt-4">
        <button class="btn btn-dark btn-sm mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a data-bs-dismiss="offcanvas" class="btn btn-secondary btn-sm">
        {{ trans('global.cancel') }}
        </a>
    </div>
</form>
