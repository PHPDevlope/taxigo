@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.disputeType.title_singular') }}:
                    {{ trans('cruds.disputeType.fields.id') }}
                    {{ $disputeType->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('dispute-type.edit', [$disputeType])
        </div>
    </div>
</div>
@endsection