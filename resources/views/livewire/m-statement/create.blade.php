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

    <div class="form-group mt-4">
        <button class="btn btn-dark btn-sm mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a data-bs-dismiss="offcanvas" class="btn btn-sm btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
