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
                            Provider Service : ID
                            {{ $providerService->id }}
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
                                        Id
                                    </th>
                                    <td>
                                        {{ $providerService->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        User
                                    </th>
                                    <td>
                                        @if($providerService->userName)
                                            <span class="badge badge-lg badge-dot">
                                                    <i class="bg-success"></i>
                                                    {{ $providerService->userName->name }}
                                                </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Service
                                    </th>
                                    <td>
                                        @if($providerService->serviceName)
                                            <span class="badge badge-lg badge-dot">
                                                    <i class="bg-success"></i>
                                                    {{ $providerService->serviceName->service_name }}
                                                </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Status
                                    </th>
                                    <td>
                                        {{ $providerService->service_model }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('admin.provider-services') }}" class="btn btn-sm btn-secondary">
                                {{ trans('global.back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
