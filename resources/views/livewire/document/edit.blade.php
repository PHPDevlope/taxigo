<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2 {{ $errors->has('document.document_name') ? 'invalid' : '' }}">
        <label class="form-label" for="document_name">{{ trans('cruds.document.fields.document_name') }}</label>
        <input class="form-control" type="text" name="document_name" id="document_name" wire:model.defer="document.document_name">
        <div class="validation-message">
            {{ $errors->first('document.document_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.document.fields.document_name_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('document.document_type') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.document.fields.document_type') }}</label>
        <select class="form-control" wire:model="document.document_type">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['document_type'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('document.document_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.document.fields.document_type_helper') }}
        </div>
    </div>

    <div class="form-group mt-4">
        <button class="btn d-inline-flex btn-sm btn-dark" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.document') }}" class="btn d-inline-flex btn-sm btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
