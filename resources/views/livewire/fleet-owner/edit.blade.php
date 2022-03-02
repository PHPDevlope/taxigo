<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2 {{ $errors->has('mediaCollections.user_profile') ? 'invalid' : '' }}">
        <label class="form-label" for="profile">{{ trans('cruds.user.fields.profile') }}</label>
        <x-dropzone id="profile" name="profile" action="{{ route('admin.users.storeMedia') }}" collection-name="user_profile" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.user_profile') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.profile_helper') }}
        </div>
    </div>

    <div class="form-group mt-2 {{ $errors->has('user.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.user.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name">
        <div class="validation-message">
            {{ $errors->first('user.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.name_helper') }}
        </div>
    </div>

    <div class="form-group mt-2 {{ $errors->has('user.email') ? 'invalid' : '' }}">
        <label class="form-label required" for="email">{{ trans('cruds.user.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" required wire:model.defer="user.email">
        <div class="validation-message">
            {{ $errors->first('user.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.email_helper') }}
        </div>
    </div>

    <div class="form-group mt-2 {{ $errors->has('roles') ? 'invalid' : '' }}">
        <label class="form-label required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
        <x-select-list class="form-control" required id="roles" name="roles" wire:model="roles" :options="$this->listsForFields['roles']" multiple />
        <div class="validation-message">
            {{ $errors->first('roles') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.roles_helper') }}
        </div>
    </div>

    <div class="form-group mt-2 {{ $errors->has('user.mobile') ? 'invalid' : '' }}">
        <label class="form-label" for="mobile">{{ trans('cruds.user.fields.mobile') }}</label>
        <input class="form-control" type="text" name="mobile" id="mobile" wire:model.defer="user.mobile">
        <div class="validation-message">
            {{ $errors->first('user.mobile') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.mobile_helper') }}
        </div>
    </div>

    <div class="form-group mt-2 {{ $errors->has('companies') ? 'invalid' : '' }}">
        <label class="form-label">Company Name</label>
        <x-select-list class="form-control" id="company" name="company" :options="$this->listsForFields['company']" wire:model="user.company_id" />
        <div class="validation-message">
            {{ $errors->first('user.company_id') }}
        </div>
    </div>

    <div class="form-group mt-4">
        <button class="btn d-inline-flex btn-sm btn-dark" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.fleet-owners') }}" class="btn d-inline-flex btn-sm btn-secondary mx-1">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>
