<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2 {{ $errors->has('mStatement.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.mStatement.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="mStatement.user_id" />
        <div class="validation-message">
            {{ $errors->first('mStatement.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mStatement.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('mStatement.document_id') ? 'invalid' : '' }}">
        <label class="form-label" for="document">{{ trans('cruds.mStatement.fields.document') }}</label>
        <x-select-list class="form-control" id="document" name="document" :options="$this->listsForFields['document']" wire:model="mStatement.document_id" />
        <div class="validation-message">
            {{ $errors->first('mStatement.document_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mStatement.fields.document_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('mediaCollections.m_statement_files') ? 'invalid' : '' }}">
        <label class="form-label" for="files">{{ trans('cruds.mStatement.fields.files') }}</label>
        <x-dropzone id="files" name="files" action="{{ route('admin.m-statements.storeMedia') }}" collection-name="m_statement_files" max-file-size="10" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.m_statement_files') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mStatement.fields.files_helper') }}
        </div>
    </div>

    <div class="form-group {{ $errors->has('mStatement.booking') ? 'invalid' : '' }}">
        <label class="form-label" for="booking">{{ trans('cruds.mStatement.fields.booking') }}</label>
        <input class="form-control" type="text" name="booking" id="booking" wire:model.defer="mStatement.booking">
        <div class="validation-message">
            {{ $errors->first('mStatement.booking') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mStatement.fields.booking_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mStatement.picked_up') ? 'invalid' : '' }}">
        <label class="form-label" for="picked_up">{{ trans('cruds.mStatement.fields.picked_up') }}</label>
        <textarea class="form-control" name="picked_up" id="picked_up" wire:model.defer="mStatement.picked_up" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('mStatement.picked_up') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mStatement.fields.picked_up_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mStatement.dropped') ? 'invalid' : '' }}">
        <label class="form-label" for="dropped">{{ trans('cruds.mStatement.fields.dropped') }}</label>
        <textarea class="form-control" name="dropped" id="dropped" wire:model.defer="mStatement.dropped" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('mStatement.dropped') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mStatement.fields.dropped_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mStatement.commission') ? 'invalid' : '' }}">
        <label class="form-label" for="commission">{{ trans('cruds.mStatement.fields.commission') }}</label>
        <input class="form-control" type="text" name="commission" id="commission" wire:model.defer="mStatement.commission">
        <div class="validation-message">
            {{ $errors->first('mStatement.commission') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mStatement.fields.commission_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mStatement.request_id') ? 'invalid' : '' }}">
        <label class="form-label" for="request">{{ trans('cruds.mStatement.fields.request') }}</label>
        <x-select-list class="form-control" id="request" name="request" :options="$this->listsForFields['request']" wire:model="mStatement.request_id" />
        <div class="validation-message">
            {{ $errors->first('mStatement.request_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mStatement.fields.request_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mStatement.status') ? 'invalid' : '' }}">
        <label class="form-label" for="status">{{ trans('cruds.mStatement.fields.status') }}</label>
        <input class="form-control" type="text" name="status" id="status" wire:model.defer="mStatement.status">
        <div class="validation-message">
            {{ $errors->first('mStatement.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mStatement.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mStatement.eraned') ? 'invalid' : '' }}">
        <label class="form-label" for="eraned">{{ trans('cruds.mStatement.fields.eraned') }}</label>
        <input class="form-control" type="text" name="eraned" id="eraned" wire:model.defer="mStatement.eraned">
        <div class="validation-message">
            {{ $errors->first('mStatement.eraned') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mStatement.fields.eraned_helper') }}
        </div>
    </div>

    <div class="form-group mt-4">
        <button class="btn btn-dark btn-sm mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a data-bs-dismiss="offcanvas" class="btn btn-sm btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
