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
                            {{ trans('cruds.paymentHistory.title_singular') }}:
                            {{ trans('cruds.paymentHistory.fields.id') }}
                            {{ $paymentHistory->id }}
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
                                            {{ trans('cruds.paymentHistory.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $paymentHistory->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.paymentHistory.fields.transaction') }}
                                        </th>
                                        <td>
                                            {{ $paymentHistory->transaction }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.paymentHistory.fields.total_amount') }}
                                        </th>
                                        <td>
                                            {{ $paymentHistory->total_amount }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.paymentHistory.fields.provider_amount') }}
                                        </th>
                                        <td>
                                            {{ $paymentHistory->provider_amount }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.paymentHistory.fields.payment_mode') }}
                                        </th>
                                        <td>
                                            {{ $paymentHistory->payment_mode }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.paymentHistory.fields.paument_status') }}
                                        </th>
                                        <td>
                                            {{ $paymentHistory->paument_status_label }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('admin.payment-details.payment-histories') }}" class="btn btn-sm btn-secondary">
                                {{ trans('global.back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
