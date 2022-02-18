@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.serviceType.title_singular') }}:
                    {{ trans('cruds.serviceType.fields.id') }}
                    {{ $serviceType->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.serviceType.fields.id') }}
                            </th>
                            <td>
                                {{ $serviceType->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.serviceType.fields.service_name') }}
                            </th>
                            <td>
                                {{ $serviceType->service_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.serviceType.fields.provider_name') }}
                            </th>
                            <td>
                                {{ $serviceType->provider_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.serviceType.fields.service_maker_image') }}
                            </th>
                            <td>
                                @foreach($serviceType->service_maker_image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.serviceType.fields.service_image') }}
                            </th>
                            <td>
                                @foreach($serviceType->service_image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.serviceType.fields.description') }}
                            </th>
                            <td>
                                {{ $serviceType->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.serviceType.fields.outstation_oneway_price') }}
                            </th>
                            <td>
                                {{ $serviceType->outstation_oneway_price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.serviceType.fields.outstation_roundtrip_price') }}
                            </th>
                            <td>
                                {{ $serviceType->outstation_roundtrip_price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.serviceType.fields.driver_bata') }}
                            </th>
                            <td>
                                {{ $serviceType->driver_bata }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.serviceType.fields.rental_per_hour') }}
                            </th>
                            <td>
                                {{ $serviceType->rental_per_hour }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.serviceType.fields.peak_time') }}
                            </th>
                            <td>
                                @foreach($serviceType->peakTime as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->peak_price }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.serviceType.fields.night_fare') }}
                            </th>
                            <td>
                                {{ $serviceType->night_fare }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.serviceType.fields.geo_fencing') }}
                            </th>
                            <td>
                                @foreach($serviceType->geoFencing as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->city_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.serviceType.fields.status') }}
                            </th>
                            <td>
                                {{ $serviceType->status_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('service_type_edit')
                    <a href="{{ route('admin.service-types.edit', $serviceType) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.service-types.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection