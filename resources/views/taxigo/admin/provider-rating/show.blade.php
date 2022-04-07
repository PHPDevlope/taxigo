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
                            {{ trans('cruds.providerRating.title_singular') }}:
                            {{ trans('cruds.providerRating.fields.id') }}
                            {{ $providerRating->id }}
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
                                            {{ trans('cruds.providerRating.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $providerRating->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.providerRating.fields.request') }}
                                        </th>
                                        <td>
                                            @if($providerRating->request)
                                                <span class="badge badge-lg badge-dot">
                                                    <i class="bg-success"></i>
                                                    {{ $providerRating->request->total_distance ?? '' }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.providerRating.fields.user_name') }}
                                        </th>
                                        <td>
                                            @if($providerRating->userName)
                                                <span class="badge badge-lg badge-dot">
                                                    <i class="bg-success"></i>
                                                    {{ $providerRating->userName->name ?? '' }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.providerRating.fields.provider_name') }}
                                        </th>
                                        <td>
                                            @if($providerRating->providerName)
                                                <span class="badge badge-lg badge-dot">
                                                    <i class="bg-success"></i>
                                                    {{ $providerRating->providerName->name ?? '' }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.providerRating.fields.rating') }}
                                        </th>
                                        <td>
                                            {{ $providerRating->rating }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.providerRating.fields.date_time') }}
                                        </th>
                                        <td>
                                            {{ $providerRating->date_time }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.providerRating.fields.comments') }}
                                        </th>
                                        <td>
                                            {{ $providerRating->comments }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('admin.ratings-reviews.provider-ratings') }}" class="btn btn-sm btn-secondary">
                                {{ trans('global.back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
