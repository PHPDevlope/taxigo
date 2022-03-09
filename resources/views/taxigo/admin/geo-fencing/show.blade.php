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
                        {{ trans('cruds.geoFencing.title_singular') }}:
                        {{ trans('cruds.geoFencing.fields.id') }}
                        {{ $geoFencing->id }}
                    </h4>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="py-6 bg-surface-secondary">
    <div class="container-fluid">
        <div class="row">
            <div class="card bg-blueGray-100 col-xl-6 col-lg-6 col-md-12">
                <div class="card-body">
                    <div class="pt-3">
                        <table class="table table-view">
                            <tbody class="bg-white">
                                <tr>
                                    <th>
                                        {{ trans('cruds.geoFencing.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $geoFencing->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.geoFencing.fields.city_name') }}
                                    </th>
                                    <td>
                                        {{ $geoFencing->city_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.geoFencing.fields.distance') }}
                                    </th>
                                    <td>
                                        {{ $geoFencing->distance }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.geoFencing.fields.distance_price') }}
                                    </th>
                                    <td>
                                        {{ $geoFencing->distance_price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.geoFencing.fields.city_limits') }}
                                    </th>
                                    <td>
                                        {{ $geoFencing->city_limits }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.geoFencing.fields.minute_price') }}
                                    </th>
                                    <td>
                                        {{ $geoFencing->minute_price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.geoFencing.fields.pricing_logic') }}
                                    </th>
                                    <td>
                                        {{ $geoFencing->pricing_logic_label }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.geoFencing.fields.hour_price') }}
                                    </th>
                                    <td>
                                        {{ $geoFencing->hour_price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.geoFencing.fields.base_price') }}
                                    </th>
                                    <td>
                                        {{ $geoFencing->base_price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.geoFencing.fields.base_distance') }}
                                    </th>
                                    <td>
                                        {{ $geoFencing->base_distance }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.geoFencing.fields.unit_time_pricing') }}
                                    </th>
                                    <td>
                                        {{ $geoFencing->unit_time_pricing }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.geoFencing.fields.unit_distance_price') }}
                                    </th>
                                    <td>
                                        {{ $geoFencing->unit_distance_price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.geoFencing.fields.seat_capacity') }}
                                    </th>
                                    <td>
                                        {{ $geoFencing->seat_capacity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.geoFencing.fields.waive_off_minutes') }}
                                    </th>
                                    <td>
                                        {{ $geoFencing->waive_off_minutes }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.geoFencing.fields.per_minute_fare') }}
                                    </th>
                                    <td>
                                        {{ $geoFencing->per_minute_fare }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.geoFencing.fields.night_fare') }}
                                    </th>
                                    <td>
                                        {{ $geoFencing->night_fare }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.geoFencing.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $geoFencing->status_label }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group mt-4">
                        <a href="{{ route('admin.service.geo-fencings') }}" class="btn btn-sm btn-secondary">
                            {{ trans('global.back') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
