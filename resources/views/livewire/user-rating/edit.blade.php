<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2 {{ $errors->has('userRating.request_id') ? 'invalid' : '' }}">
        <label class="form-label" for="request">{{ trans('cruds.userRating.fields.request') }}</label>
        <x-select-list class="form-control" id="request" name="request" :options="$this->listsForFields['request']" wire:model="userRating.request_id" />
        <div class="validation-message">
            {{ $errors->first('userRating.request_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.userRating.fields.request_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('userRating.user_name_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user_name">{{ trans('cruds.userRating.fields.user_name') }}</label>
        <x-select-list class="form-control" id="user_name" name="user_name" :options="$this->listsForFields['user_name']" wire:model="userRating.user_name_id" />
        <div class="validation-message">
            {{ $errors->first('userRating.user_name_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.userRating.fields.user_name_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('userRating.provider_name_id') ? 'invalid' : '' }}">
        <label class="form-label" for="provider_name">{{ trans('cruds.userRating.fields.provider_name') }}</label>
        <x-select-list class="form-control" id="provider_name" name="provider_name" :options="$this->listsForFields['provider_name']" wire:model="userRating.provider_name_id" />
        <div class="validation-message">
            {{ $errors->first('userRating.provider_name_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.userRating.fields.provider_name_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('userRating.rating') ? 'invalid' : '' }}">
        <label class="form-label" for="rating">{{ trans('cruds.userRating.fields.rating') }}</label>
        <input class="form-control" type="text" name="rating" id="rating" wire:model.defer="userRating.rating">
        <div class="validation-message">
            {{ $errors->first('userRating.rating') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.userRating.fields.rating_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('userRating.date_time') ? 'invalid' : '' }}">
        <label class="form-label" for="date_time">{{ trans('cruds.userRating.fields.date_time') }}</label>
        <x-date-picker class="form-control" wire:model="userRating.date_time" id="date_time" name="date_time" />
        <div class="validation-message">
            {{ $errors->first('userRating.date_time') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.userRating.fields.date_time_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('userRating.comments') ? 'invalid' : '' }}">
        <label class="form-label" for="comments">{{ trans('cruds.userRating.fields.comments') }}</label>
        <input class="form-control" type="text" name="comments" id="comments" wire:model.defer="userRating.comments">
        <div class="validation-message">
            {{ $errors->first('userRating.comments') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.userRating.fields.comments_helper') }}
        </div>
    </div>

    <div class="form-group mt-4">
        <button class="btn btn-dark btn-sm mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.ratings-reviews.user-ratings') }}" class="btn btn-sm btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
