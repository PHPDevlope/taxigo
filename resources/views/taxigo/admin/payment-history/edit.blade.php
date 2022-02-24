@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.paymentHistory.title_singular') }}:
                    {{ trans('cruds.paymentHistory.fields.id') }}
                    {{ $paymentHistory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('payment-history.edit', [$paymentHistory])
        </div>
    </div>
</div>
@endsection