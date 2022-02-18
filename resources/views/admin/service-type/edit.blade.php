@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.serviceType.title_singular') }}:
                    {{ trans('cruds.serviceType.fields.id') }}
                    {{ $serviceType->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('service-type.edit', [$serviceType])
        </div>
    </div>
</div>
@endsection