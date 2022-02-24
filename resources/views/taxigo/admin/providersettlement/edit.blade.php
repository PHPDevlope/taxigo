@extends('taxigo.layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.providersettlement.title_singular') }}:
                    {{ trans('cruds.providersettlement.fields.id') }}
                    {{ $providersettlement->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('providersettlement.edit', [$providersettlement])
        </div>
    </div>
</div>
@endsection