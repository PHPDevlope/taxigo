<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('mSetting.key') ? 'invalid' : '' }}">
        <label class="form-label" for="key">{{ trans('cruds.mSetting.fields.key') }}</label>
        <input class="form-control" type="text" name="key" id="key" wire:model.defer="mSetting.key">
        <div class="validation-message">
            {{ $errors->first('mSetting.key') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mSetting.fields.key_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mSetting.value') ? 'invalid' : '' }}">
        <label class="form-label" for="value">{{ trans('cruds.mSetting.fields.value') }}</label>
        <input class="form-control" type="text" name="value" id="value" wire:model.defer="mSetting.value">
        <div class="validation-message">
            {{ $errors->first('mSetting.value') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mSetting.fields.value_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mSetting.data') ? 'invalid' : '' }}">
        <label class="form-label" for="data">{{ trans('cruds.mSetting.fields.data') }}</label>
        <input class="form-control" type="text" name="data" id="data" wire:model.defer="mSetting.data">
        <div class="validation-message">
            {{ $errors->first('mSetting.data') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mSetting.fields.data_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mSetting.sub_data') ? 'invalid' : '' }}">
        <label class="form-label" for="sub_data">{{ trans('cruds.mSetting.fields.sub_data') }}</label>
        <input class="form-control" type="text" name="sub_data" id="sub_data" wire:model.defer="mSetting.sub_data">
        <div class="validation-message">
            {{ $errors->first('mSetting.sub_data') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mSetting.fields.sub_data_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mSetting.field_1') ? 'invalid' : '' }}">
        <label class="form-label" for="field_1">{{ trans('cruds.mSetting.fields.field_1') }}</label>
        <input class="form-control" type="text" name="field_1" id="field_1" wire:model.defer="mSetting.field_1">
        <div class="validation-message">
            {{ $errors->first('mSetting.field_1') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mSetting.fields.field_1_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mSetting.field_2') ? 'invalid' : '' }}">
        <label class="form-label" for="field_2">{{ trans('cruds.mSetting.fields.field_2') }}</label>
        <input class="form-control" type="text" name="field_2" id="field_2" wire:model.defer="mSetting.field_2">
        <div class="validation-message">
            {{ $errors->first('mSetting.field_2') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.mSetting.fields.field_2_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.m-settings.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>