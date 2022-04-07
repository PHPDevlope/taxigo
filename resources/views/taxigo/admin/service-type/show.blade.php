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
                            {{ trans('cruds.serviceType.title_singular') }}:
                            {{ trans('cruds.serviceType.fields.id') }}
                            {{ $serviceType->id }}
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
                                                <span class="badge badge-lg badge-dot">
                                                    <i class="bg-success"></i>
                                                    {{ $entry->peak_price }}
                                                </span>
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
                                                <span class="badge badge-lg badge-dot">
                                                    <i class="bg-success"></i>
                                                    {{ $entry->city_name }}
                                                </span>
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
                        <div class="form-group mt-4">
                            <a href="{{ route('admin.service.service-types') }}" class="btn btn-secondary btn-sm">
                                {{ trans('global.back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
