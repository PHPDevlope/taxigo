@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.mSetting.title_singular') }}:
                    {{ trans('cruds.mSetting.fields.id') }}
                    {{ $mSetting->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('m-setting.edit', [$mSetting])
        </div>
    </div>
</div>
@endsection