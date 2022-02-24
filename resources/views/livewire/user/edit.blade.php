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
    <div class="form-group mt-2 {{ $errors->has('user.mobile_verified_at') ? 'invalid' : '' }}">
        <label class="form-label" for="mobile_verified_at">{{ trans('cruds.user.fields.mobile_verified_at') }}</label>
        <x-date-picker class="form-control" wire:model="user.mobile_verified_at" id="mobile_verified_at" name="mobile_verified_at" />
        <div class="validation-message">
            {{ $errors->first('user.mobile_verified_at') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.mobile_verified_at_helper') }}
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
    <div class="form-group mt-2 {{ $errors->has('user.password') ? 'invalid' : '' }}">
        <label class="form-label" for="password">{{ trans('cruds.user.fields.password') }}</label>
        <input class="form-control" type="password" name="password" id="password" wire:model.defer="password">
        <div class="validation-message">
            {{ $errors->first('user.password') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.password_helper') }}
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
    <div class="form-group mt-2 {{ $errors->has('user.locale') ? 'invalid' : '' }}">
        <label class="form-label" for="locale">{{ trans('cruds.user.fields.locale') }}</label>
        <input class="form-control" type="text" name="locale" id="locale" wire:model.defer="user.locale">
        <div class="validation-message">
            {{ $errors->first('user.locale') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.locale_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('user.otp') ? 'invalid' : '' }}">
        <label class="form-label" for="otp">{{ trans('cruds.user.fields.otp') }}</label>
        <input class="form-control" type="text" name="otp" id="otp" wire:model.defer="user.otp">
        <div class="validation-message">
            {{ $errors->first('user.otp') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.otp_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('user.firebase_token') ? 'invalid' : '' }}">
        <label class="form-label" for="firebase_token">{{ trans('cruds.user.fields.firebase_token') }}</label>
        <input class="form-control" type="text" name="firebase_token" id="firebase_token" wire:model.defer="user.firebase_token">
        <div class="validation-message">
            {{ $errors->first('user.firebase_token') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.firebase_token_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('user.device_token') ? 'invalid' : '' }}">
        <label class="form-label" for="device_token">{{ trans('cruds.user.fields.device_token') }}</label>
        <input class="form-control" type="text" name="device_token" id="device_token" wire:model.defer="user.device_token">
        <div class="validation-message">
            {{ $errors->first('user.device_token') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.device_token_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('user.device_type') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.user.fields.device_type') }}</label>
        <select class="form-control" wire:model="user.device_type">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['device_type'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('user.device_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.device_type_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('user.device') ? 'invalid' : '' }}">
        <label class="form-label" for="device">{{ trans('cruds.user.fields.device') }}</label>
        <input class="form-control" type="text" name="device" id="device" wire:model.defer="user.device">
        <div class="validation-message">
            {{ $errors->first('user.device') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.device_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('user.bio') ? 'invalid' : '' }}">
        <label class="form-label" for="bio">{{ trans('cruds.user.fields.bio') }}</label>
        <textarea class="form-control" name="bio" id="bio" wire:model.defer="user.bio" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('user.bio') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.bio_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('user.gender') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.user.fields.gender') }}</label>
        <select class="form-control" wire:model="user.gender">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['gender'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('user.gender') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.gender_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('user.dob') ? 'invalid' : '' }}">
        <label class="form-label" for="dob">{{ trans('cruds.user.fields.dob') }}</label>
        <x-date-picker class="form-control" wire:model="user.dob" id="dob" name="dob" picker="date" />
        <div class="validation-message">
            {{ $errors->first('user.dob') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.dob_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('user.address') ? 'invalid' : '' }}">
        <label class="form-label" for="address">{{ trans('cruds.user.fields.address') }}</label>
        <textarea class="form-control" name="address" id="address" wire:model.defer="user.address" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('user.address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.address_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('user.provider_status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.user.fields.provider_status') }}</label>
        <select class="form-control" wire:model="user.provider_status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['provider_status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('user.provider_status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.provider_status_helper') }}
        </div>
    </div>

    <div class="form-group mt-4">
        <button class="btn d-inline-flex btn-sm btn-dark" type="submit">
            {{ trans('global.save') }}
        </button>
        <a data-bs-dismiss="offcanvas" class="btn btn-sm d-inline-flex btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
