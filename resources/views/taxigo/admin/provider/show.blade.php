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
                            {{ trans('cruds.user.title_singular') }}:
                            {{ trans('cruds.user.fields.id') }}
                            {{ $provider->id }}
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
                                        {{ trans('cruds.user.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $provider->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Fleet Name
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Joined At
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $provider->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.mobile') }}
                                    </th>
                                    <td>
                                        {{ $provider->mobile }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Total / Accepted / Cancelled
                                    </th>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Vehicle Type
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Vehicle Number
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Document / Service Type
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Status
                                    </th>
                                    <td>
                                        {{ $provider->provider_status_label }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('admin.providers') }}" class="btn d-inline-flex btn-sm btn-secondary mx-1">
                                {{ trans('global.back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
