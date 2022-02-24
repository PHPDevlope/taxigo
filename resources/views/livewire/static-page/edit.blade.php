<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2 {{ $errors->has('staticPage.page_name') ? 'invalid' : '' }}">
        <label class="form-label" for="page_name">{{ trans('cruds.staticPage.fields.page_name') }}</label>
        <input class="form-control" type="text" name="page_name" id="page_name" wire:model.defer="staticPage.page_name">
        <div class="validation-message">
            {{ $errors->first('staticPage.page_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.staticPage.fields.page_name_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('staticPage.content') ? 'invalid' : '' }}">
        <label class="form-label" for="content">{{ trans('cruds.staticPage.fields.content') }}</label>
        <textarea class="form-control" name="content" id="content" wire:model.defer="staticPage.content" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('staticPage.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.staticPage.fields.content_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('staticPage.data') ? 'invalid' : '' }}">
        <label class="form-label" for="data">{{ trans('cruds.staticPage.fields.data') }}</label>
        <input class="form-control" type="text" name="data" id="data" wire:model.defer="staticPage.data">
        <div class="validation-message">
            {{ $errors->first('staticPage.data') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.staticPage.fields.data_helper') }}
        </div>
    </div>
    <div class="form-group mt-2 {{ $errors->has('staticPage.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.staticPage.fields.status') }}</label>
        <select class="form-control" wire:model="staticPage.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('staticPage.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.staticPage.fields.status_helper') }}
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
