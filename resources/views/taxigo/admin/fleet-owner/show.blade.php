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
                            {{ $fleetOwner->id }}
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
                                        {{ $fleetOwner->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $fleetOwner->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Company Name
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ trans('cruds.user.fields.email') }}
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.mobile') }}
                                    </th>
                                    <td>
                                        {{ $fleetOwner->mobile }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Profile
                                    </th>
                                    <td>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('admin.fleet-owners') }}" class="btn d-inline-flex btn-sm btn-secondary mx-1">
                                {{ trans('global.back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection