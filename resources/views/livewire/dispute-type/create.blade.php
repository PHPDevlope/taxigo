<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2 {{ $errors->has('disputeType.dispute_type') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.disputeType.fields.dispute_type') }}</label>
        <select class="form-control" wire:model="disputeType.dispute_type">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['dispute_type'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('disputeType.dispute_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.disputeType.fields.dispute_type_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('disputeType.dispute_name') ? 'invalid' : '' }}">
        <label class="form-label" for="dispute_issue">{{ trans('cruds.disputeType.fields.dispute_name') }}</label>
        <input class="form-control" type="text" name="dispute_name" id="dispute_name" wire:model.defer="disputeType.dispute_name">
        <div class="validation-message">
            {{ $errors->first('disputeType.dispute_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.disputeType.fields.dispute_name_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('disputeType.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.disputeType.fields.status') }}</label>
        <select class="form-control" wire:model="disputeType.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('disputeType.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.disputeType.fields.status_helper') }}
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
