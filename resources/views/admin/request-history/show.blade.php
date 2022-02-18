@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.requestHistory.title_singular') }}:
                    {{ trans('cruds.requestHistory.fields.id') }}
                    {{ $requestHistory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.id') }}
                            </th>
                            <td>
                                {{ $requestHistory->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.user_name') }}
                            </th>
                            <td>
                                @if($requestHistory->userName)
                                    <span class="badge badge-relationship">{{ $requestHistory->userName->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.provider_name') }}
                            </th>
                            <td>
                                @if($requestHistory->providerName)
                                    <span class="badge badge-relationship">{{ $requestHistory->providerName->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.total_distance') }}
                            </th>
                            <td>
                                {{ $requestHistory->total_distance }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.ride_start_time') }}
                            </th>
                            <td>
                                {{ $requestHistory->ride_start_time }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.ride_end_time') }}
                            </th>
                            <td>
                                {{ $requestHistory->ride_end_time }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.otp') }}
                            </th>
                            <td>
                                {{ $requestHistory->otp }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.pickup_address') }}
                            </th>
                            <td>
                                {{ $requestHistory->pickup_address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.drop_address') }}
                            </th>
                            <td>
                                {{ $requestHistory->drop_address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.base_price') }}
                            </th>
                            <td>
                                {{ $requestHistory->base_price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.distance_price') }}
                            </th>
                            <td>
                                {{ $requestHistory->distance_price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.discount_price') }}
                            </th>
                            <td>
                                {{ $requestHistory->discount_price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.eta_discount_price') }}
                            </th>
                            <td>
                                {{ $requestHistory->eta_discount_price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.tax_price') }}
                            </th>
                            <td>
                                {{ $requestHistory->tax_price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.surge_price') }}
                            </th>
                            <td>
                                {{ $requestHistory->surge_price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.total_amount') }}
                            </th>
                            <td>
                                {{ $requestHistory->total_amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.coupon_deduction') }}
                            </th>
                            <td>
                                {{ $requestHistory->coupon_deduction }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.coupon') }}
                            </th>
                            <td>
                                @if($requestHistory->coupon)
                                    <span class="badge badge-relationship">{{ $requestHistory->coupon->promocode ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.paid_amount') }}
                            </th>
                            <td>
                                {{ $requestHistory->paid_amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.provider_earnings') }}
                            </th>
                            <td>
                                {{ $requestHistory->provider_earnings }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.provider_admin_commission') }}
                            </th>
                            <td>
                                {{ $requestHistory->provider_admin_commission }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requestHistory.fields.ride_status') }}
                            </th>
                            <td>
                                {{ $requestHistory->ride_status_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('request_history_edit')
                    <a href="{{ route('admin.request-histories.edit', $requestHistory) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.request-histories.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection