@extends('taxigo.layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.requestHistory.title_singular') }}:
                    {{ trans('cruds.requestHistory.fields.id') }}
                    {{ $requestHistory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('request-history.edit', [$requestHistory])
        </div>
    </div>
</div>
@endsection
