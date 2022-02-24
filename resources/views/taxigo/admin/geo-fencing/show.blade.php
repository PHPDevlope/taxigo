@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.geoFencing.title_singular') }}:
                    {{ trans('cruds.geoFencing.fields.id') }}
                    {{ $geoFencing->id }}
                </h6>
            </div>
        </div>

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
            <div class="form-group">
                @can('geo_fencing_edit')
                    <a href="{{ route('admin.geo-fencings.edit', $geoFencing) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.geo-fencings.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection