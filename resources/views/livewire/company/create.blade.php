<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2 {{ $errors->has('company.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.company.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="company.user_id" />
        <div class="validation-message">
            {{ $errors->first('company.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.company.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('mediaCollections.company_logo') ? 'invalid' : '' }}">
        <label class="form-label" for="logo">{{ trans('cruds.company.fields.logo') }}</label>
        <x-dropzone id="logo" name="logo" action="{{ route('admin.companies.storeMedia') }}" collection-name="company_logo" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.company_logo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.company.fields.logo_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('mediaCollections.company_docs') ? 'invalid' : '' }}">
        <label class="form-label" for="docs">{{ trans('cruds.company.fields.docs') }}</label>
        <x-dropzone id="docs" name="docs" action="{{ route('admin.companies.storeMedia') }}" collection-name="company_docs" max-file-size="10" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.company_docs') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.company.fields.docs_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('company.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.company.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="company.name">
        <div class="validation-message">
            {{ $errors->first('company.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.company.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('company.address') ? 'invalid' : '' }}">
        <label class="form-label" for="address">{{ trans('cruds.company.fields.address') }}</label>
        <textarea class="form-control" name="address" id="address" wire:model.defer="company.address" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('company.address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.company.fields.address_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('company.commission_type') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.company.fields.commission_type') }}</label>
        <select class="form-control" wire:model="company.commission_type">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['commission_type'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('company.commission_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.company.fields.commission_type_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('company.commission_value') ? 'invalid' : '' }}">
        <label class="form-label" for="commission_value">{{ trans('cruds.company.fields.commission_value') }}</label>
        <input class="form-control" type="text" name="commission_value" id="commission_value" wire:model.defer="company.commission_value">
        <div class="validation-message">
            {{ $errors->first('company.commission_value') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.company.fields.commission_value_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('company.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.company.fields.status') }}</label>
        <select class="form-control" wire:model="company.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('company.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.company.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group mt-4">
        <button class="btn d-inline-flex btn-sm btn-dark" type="submit">
            {{ trans('global.save') }}
        </button>
        <a data-bs-toggle="offcanvas" class="btn d-inline-flex btn-sm btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
