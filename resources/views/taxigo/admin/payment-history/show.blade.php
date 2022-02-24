@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.paymentHistory.title_singular') }}:
                    {{ trans('cruds.paymentHistory.fields.id') }}
                    {{ $paymentHistory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.paymentHistory.fields.id') }}
                            </th>
                            <td>
                                {{ $paymentHistory->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymentHistory.fields.transaction') }}
                            </th>
                            <td>
                                {{ $paymentHistory->transaction }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymentHistory.fields.total_amount') }}
                            </th>
                            <td>
                                {{ $paymentHistory->total_amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymentHistory.fields.provider_amount') }}
                            </th>
                            <td>
                                {{ $paymentHistory->provider_amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymentHistory.fields.payment_mode') }}
                            </th>
                            <td>
                                {{ $paymentHistory->payment_mode }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymentHistory.fields.paument_status') }}
                            </th>
                            <td>
                                {{ $paymentHistory->paument_status_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('payment_history_edit')
                    <a href="{{ route('admin.payment-histories.edit', $paymentHistory) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.payment-histories.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection