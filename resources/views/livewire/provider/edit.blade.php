<form wire:submit.prevent="submit" class="pt-3">
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

    <div class="form-group mt-2">
        <label class="form-label" for="Total">Total / Accepted / Cancelled</label>
        <input class="form-control" type="text" name="mobile">
    </div>

    <div class="form-group mt-2">
        <label class="form-label" for="vehicle-type">Vehicle Type</label>
        <input class="form-control" type="text" name="vehicle-type">
    </div>

    <div class="form-group mt-2">
        <label class="form-label" for="vehicle-number">Vehicle Number</label>
        <input class="form-control" type="text" name="vehicle-number">
    </div>

    <div class="form-group mt-2">
        <label class="form-label" for="service-type">Document / Service Type</label>
        <input class="form-control" type="text" name="service-type">
    </div>

    {{--    <div class="form-group mt-2 {{ $errors->has('user.provider_status') ? 'invalid' : '' }}">--}}
    {{--        <label class="form-label">{{ trans('cruds.user.fields.provider_status') }}</label>--}}
    {{--        <select class="form-control" wire:model="user.provider_status">--}}
    {{--            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>--}}
    {{--            @foreach($this->listsForFields['provider_status'] as $key => $value)--}}
    {{--                <option value="{{ $key }}">{{ $value }}</option>--}}
    {{--            @endforeach--}}
    {{--        </select>--}}
    {{--        <div class="validation-message">--}}
    {{--            {{ $errors->first('user.provider_status') }}--}}
    {{--        </div>--}}
    {{--        <div class="help-block">--}}
    {{--            {{ trans('cruds.user.fields.provider_status_helper') }}--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="form-group mt-4">
        <button class="btn d-inline-flex btn-sm btn-dark" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.providers') }}" class="btn d-inline-flex btn-sm btn-secondary mx-1">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
