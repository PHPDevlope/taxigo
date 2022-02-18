@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.promocode.title_singular') }}:
                    {{ trans('cruds.promocode.fields.id') }}
                    {{ $promocode->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('promocode.edit', [$promocode])
        </div>
    </div>
</div>
@endsection