@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.providerRating.title_singular') }}:
                    {{ trans('cruds.providerRating.fields.id') }}
                    {{ $providerRating->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('provider-rating.edit', [$providerRating])
        </div>
    </div>
</div>
@endsection