<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2 {{ $errors->has('providerRating.request_id') ? 'invalid' : '' }}">
        <label class="form-label" for="request">{{ trans('cruds.providerRating.fields.request') }}</label>
        <x-select-list class="form-control" id="request" name="request" :options="$this->listsForFields['request']" wire:model="providerRating.request_id" />
        <div class="validation-message">
            {{ $errors->first('providerRating.request_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.providerRating.fields.request_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('providerRating.user_name_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user_name">{{ trans('cruds.providerRating.fields.user_name') }}</label>
        <x-select-list class="form-control" id="user_name" name="user_name" :options="$this->listsForFields['user_name']" wire:model="providerRating.user_name_id" />
        <div class="validation-message">
            {{ $errors->first('providerRating.user_name_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.providerRating.fields.user_name_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('providerRating.provider_name_id') ? 'invalid' : '' }}">
        <label class="form-label" for="provider_name">{{ trans('cruds.providerRating.fields.provider_name') }}</label>
        <x-select-list class="form-control" id="provider_name" name="provider_name" :options="$this->listsForFields['provider_name']" wire:model="providerRating.provider_name_id" />
        <div class="validation-message">
            {{ $errors->first('providerRating.provider_name_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.providerRating.fields.provider_name_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('providerRating.rating') ? 'invalid' : '' }}">
        <label class="form-label" for="rating">{{ trans('cruds.providerRating.fields.rating') }}</label>
        <input class="form-control" type="text" name="rating" id="rating" wire:model.defer="providerRating.rating">
        <div class="validation-message">
            {{ $errors->first('providerRating.rating') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.providerRating.fields.rating_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('providerRating.date_time') ? 'invalid' : '' }}">
        <label class="form-label" for="date_time">{{ trans('cruds.providerRating.fields.date_time') }}</label>
        <x-date-picker class="form-control" wire:model="providerRating.date_time" id="date_time" name="date_time" />
        <div class="validation-message">
            {{ $errors->first('providerRating.date_time') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.providerRating.fields.date_time_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('providerRating.comments') ? 'invalid' : '' }}">
        <label class="form-label" for="comments">{{ trans('cruds.providerRating.fields.comments') }}</label>
        <input class="form-control" type="text" name="comments" id="comments" wire:model.defer="providerRating.comments">
        <div class="validation-message">
            {{ $errors->first('providerRating.comments') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.providerRating.fields.comments_helper') }}
        </div>
    </div>

    <div class="form-group mt-4">
        <button class="btn btn-dark btn-sm mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.ratings-reviews.provider-ratings') }}" class="btn btn-sm btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
