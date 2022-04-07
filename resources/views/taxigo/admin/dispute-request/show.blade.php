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
                        {{ trans('cruds.disputeRequest.title_singular') }}:
                        {{ trans('cruds.disputeRequest.fields.id') }}
                        {{ $disputeRequest->id }}
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
                                        {{ trans('cruds.disputeRequest.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $disputeRequest->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.disputeRequest.fields.user_provider') }}
                                    </th>
                                    <td>
                                        {{ $disputeRequest->user_provider }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.disputeRequest.fields.request_detail') }}
                                    </th>
                                    <td>
                                        {{ $disputeRequest->request_detail }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.disputeRequest.fields.dispute') }}
                                    </th>
                                    <td>
                                        @if($disputeRequest->dispute->dispute_type)
                                            <span class="badge badge-lg badge-dot">{{ $disputeRequest->dispute->dispute_type ?? '' }}</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group mt-4">
                        <a href="{{ route('admin.dispute-panel.dispute-requests') }}" class="btn btn-secondary btn-sm">
                            {{ trans('global.back') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
