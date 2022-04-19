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
                            {{ trans('cruds.disputeType.title_singular') }}:
                            {{ trans('cruds.disputeType.fields.id') }}
                            {{ $disputeType->id }}
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
                                            {{ trans('cruds.disputeType.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $disputeType->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.disputeType.fields.dispute_type') }}
                                        </th>
                                        <td>
                                            {{ $disputeType->dispute_type_label }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.disputeType.fields.dispute_name') }}
                                        </th>
                                        <td>
                                            {{ $disputeType->dispute_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.disputeType.fields.status') }}
                                        </th>
                                        <td>
                                            {{ $disputeType->status_label }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('admin.dispute-panel.dispute-types') }}" class="btn btn-secondary btn-sm">
                                {{ trans('global.back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
