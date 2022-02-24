<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2 {{ $errors->has('promocode.promocode') ? 'invalid' : '' }}">
        <label class="form-label" for="promocode">{{ trans('cruds.promocode.fields.promocode') }}</label>
        <input class="form-control" type="text" name="promocode" id="promocode" wire:model.defer="promocode.promocode">
        <div class="validation-message">
            {{ $errors->first('promocode.promocode') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.promocode.fields.promocode_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('promocode.discount') ? 'invalid' : '' }}">
        <label class="form-label" for="discount">{{ trans('cruds.promocode.fields.discount') }}</label>
        <input class="form-control" type="text" name="discount" id="discount" wire:model.defer="promocode.discount">
        <div class="validation-message">
            {{ $errors->first('promocode.discount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.promocode.fields.discount_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('promocode.promocodes_use') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.promocode.fields.promocodes_use') }}</label>
        <select class="form-control" wire:model="promocode.promocodes_use">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['promocodes_use'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('promocode.promocodes_use') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.promocode.fields.promocodes_use_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('promocode.use_count') ? 'invalid' : '' }}">
        <label class="form-label" for="use_count">{{ trans('cruds.promocode.fields.use_count') }}</label>
        <input class="form-control" type="text" name="use_count" id="use_count" wire:model.defer="promocode.use_count">
        <div class="validation-message">
            {{ $errors->first('promocode.use_count') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.promocode.fields.use_count_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('promocode.from_date') ? 'invalid' : '' }}">
        <label class="form-label" for="from_date">{{ trans('cruds.promocode.fields.from_date') }}</label>
        <x-date-picker class="form-control" wire:model="promocode.from_date" id="from_date" name="from_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('promocode.from_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.promocode.fields.from_date_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('promocode.expiration') ? 'invalid' : '' }}">
        <label class="form-label" for="expiration">{{ trans('cruds.promocode.fields.expiration') }}</label>
        <x-date-picker class="form-control" wire:model="promocode.expiration" id="expiration" name="expiration" picker="date" />
        <div class="validation-message">
            {{ $errors->first('promocode.expiration') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.promocode.fields.expiration_helper') }}
        </div>
    </div>

    <div class="form-group mt-4">
        <button class="btn d-inline-flex btn-sm btn-dark" type="submit">
            {{ trans('global.save') }}
        </button>
        <a data-bs-dismiss="offcanvas" class="btn d-inline-flex btn-sm btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
