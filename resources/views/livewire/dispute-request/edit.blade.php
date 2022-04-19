<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2 {{ $errors->has('disputeRequest.dispute_id') ? 'invalid' : '' }}">
        <label class="form-label" for="dispute">{{ trans('cruds.disputeRequest.fields.dispute') }}</label>
        <x-select-list class="form-control" id="dispute" name="dispute" :options="$this->listsForFields['dispute']" wire:model="disputeRequest.dispute_id" />
        <div class="validation-message">
            {{ $errors->first('disputeRequest.dispute_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.disputeRequest.fields.dispute_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('disputeRequest.user_provider') ? 'invalid' : '' }}">
        <label class="form-label" for="user_provider">{{ trans('cruds.disputeRequest.fields.user_provider') }}</label>
        <input class="form-control" type="text" name="user_provider" id="user_provider" wire:model.defer="disputeRequest.user_provider">
        <div class="validation-message">
            {{ $errors->first('disputeRequest.user_provider') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.disputeRequest.fields.user_provider_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('disputeRequest.request_detail') ? 'invalid' : '' }}">
        <label class="form-label" for="request_detail">{{ trans('cruds.disputeRequest.fields.request_detail') }}</label>
        <input class="form-control" type="text" name="request_detail" id="request_detail" wire:model="disputeRequest.request_detail">
        <div class="validation-message">
            {{ $errors->first('disputeRequest.request_detail') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.disputeRequest.fields.request_detail_helper') }}
        </div>
    </div>

    <div class="form-group mt-2">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>Request Id</td>
                <td>From</td>
                <td>To</td>
            </tr>
            </thead>
            <tbody>
            @if($histories != '')
                <tr>
                    <td>{{ $histories->id }}</td>
                    <td>{{ $histories->pickup_address }}</td>
                    <td>{{ $histories->drop_address }}</td>
                </tr>
            @else
                <tr>
                    <td colspan="10">No entries found.</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

    <div class="form-group mt-2 {{ $errors->has('disputeRequest.dispute_name_id') ? 'invalid' : '' }}">
        <label class="form-label" for="dispute_name">{{ trans('cruds.disputeRequest.fields.dispute_name') }}</label>
        <x-select-list class="form-control" id="dispute_name" name="dispute_name" :options="$this->listsForFields['dispute_name']" wire:model="disputeRequest.dispute_name_id" />
        <div class="validation-message">
            {{ $errors->first('disputeRequest.dispute_name_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.disputeRequest.fields.dispute_name_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('disputeRequest.comment') ? 'invalid' : '' }}">
        <label class="form-label" for="comment">{{ trans('cruds.disputeRequest.fields.comment') }}</label>
        <input class="form-control" type="text" name="comment" id="comment" wire:model.defer="disputeRequest.comment">
        <div class="validation-message">
            {{ $errors->first('disputeRequest.comment') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.disputeRequest.fields.comment_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('disputeRequest.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.disputeRequest.fields.status') }}</label>
        <select class="form-control" wire:model="disputeRequest.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('disputeRequest.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.disputeRequest.fields.status_helper') }}
        </div>
    </div>


    <div class="form-group mt-4">
        <button class="btn d-inline-flex btn-sm btn-dark" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.dispute-panel.dispute-requests') }}" class="btn d-inline-flex btn-sm btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
