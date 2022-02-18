<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('peakTime.from') ? 'invalid' : '' }}">
        <label class="form-label" for="from">{{ trans('cruds.peakTime.fields.from') }}</label>
        <x-date-picker class="form-control" wire:model="peakTime.from" id="from" name="from" picker="time" />
        <div class="validation-message">
            {{ $errors->first('peakTime.from') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.peakTime.fields.from_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('peakTime.to') ? 'invalid' : '' }}">
        <label class="form-label" for="to">{{ trans('cruds.peakTime.fields.to') }}</label>
        <x-date-picker class="form-control" wire:model="peakTime.to" id="to" name="to" picker="time" />
        <div class="validation-message">
            {{ $errors->first('peakTime.to') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.peakTime.fields.to_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('peakTime.peak_price') ? 'invalid' : '' }}">
        <label class="form-label" for="peak_price">{{ trans('cruds.peakTime.fields.peak_price') }}</label>
        <input class="form-control" type="number" name="peak_price" id="peak_price" wire:model.defer="peakTime.peak_price" step="0.01">
        <div class="validation-message">
            {{ $errors->first('peakTime.peak_price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.peakTime.fields.peak_price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('peakTime.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.peakTime.fields.status') }}</label>
        <select class="form-control" wire:model="peakTime.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('peakTime.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.peakTime.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.peak-times.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>