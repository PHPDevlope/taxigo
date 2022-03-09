@extends('taxigo.layouts.admin')
@section('content')
    <header class="bg-surface-primary border-bottom pt-6 pb-6">
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-nav-item">
                    <div class="col-6 mb-4 mb-sm-0">
                        <!-- Title -->
                        <h4 class="h4 mb-0 ls-tight">
                            {{ trans('global.view') }}
                            {{ trans('cruds.requestHistory.title_singular') }}:
                            {{ trans('cruds.requestHistory.fields.id') }}
                            {{ $requestHistory->id }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="py-6 bg-surface-secondary">
        <div class="container-fluid">
            <div class="row">
                <div class="card bg-blueGray-100 col-xl-12 col-lg-12 col-md-12">
                    <div class="card-body">
                        <div class="pt-3">
                            <div class="row">
                                <div class="col-md-6">
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
                                <div class="col-md-6">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235013.70718479907!2d72.43965828122799!3d23.02049776666638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1646218326447!5m2!1sen!2sin" width="760" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('admin.request-history') }}" class="btn btn-sm btn-secondary">
                                {{ trans('global.back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
