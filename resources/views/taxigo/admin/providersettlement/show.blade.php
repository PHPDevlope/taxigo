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
                            {{ trans('cruds.providersettlement.title_singular') }}:
                            {{ trans('cruds.providersettlement.fields.id') }}
                            {{ $providersettlement->id }}
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
                                            {{ trans('cruds.providersettlement.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $providersettlement->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.providersettlement.fields.provider_name') }}
                                        </th>
                                        <td>
                                            {{ $providersettlement->provider_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.providersettlement.fields.amount') }}
                                        </th>
                                        <td>
                                            {{ $providersettlement->amount }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.providersettlement.fields.type') }}
                                        </th>
                                        <td>
                                            {{ $providersettlement->type_label }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.providersettlement.fields.send') }}
                                        </th>
                                        <td>
                                            {{ $providersettlement->send_label }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('admin.provider-settlement') }}" class="btn btn-sm btn-secondary">
                                {{ trans('global.back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
