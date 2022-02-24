<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2 {{ $errors->has('permission.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.permission.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="permission.title">
        <div class="validation-message">
            {{ $errors->first('permission.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.permission.fields.title_helper') }}
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
