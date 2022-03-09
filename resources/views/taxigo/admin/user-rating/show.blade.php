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
                        {{ trans('cruds.userRating.title_singular') }}:
                        {{ trans('cruds.userRating.fields.id') }}
                        {{ $userRating->id }}
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
                                        {{ trans('cruds.userRating.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $userRating->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.userRating.fields.request') }}
                                    </th>
                                    <td>
                                        @if($userRating->request)
                                            <span class="badge badge-relationship">{{ $userRating->request->total_distance ?? '' }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.userRating.fields.user_name') }}
                                    </th>
                                    <td>
                                        @if($userRating->userName)
                                            <span class="badge badge-relationship">{{ $userRating->userName->name ?? '' }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.userRating.fields.provider_name') }}
                                    </th>
                                    <td>
                                        @if($userRating->providerName)
                                            <span class="badge badge-relationship">{{ $userRating->providerName->name ?? '' }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.userRating.fields.rating') }}
                                    </th>
                                    <td>
                                        {{ $userRating->rating }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.userRating.fields.date_time') }}
                                    </th>
                                    <td>
                                        {{ $userRating->date_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.userRating.fields.comments') }}
                                    </th>
                                    <td>
                                        {{ $userRating->comments }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group mt-4">
                        <a href="{{ route('admin.ratings-reviews.user-ratings') }}" class="btn btn-secondary btn-sm">
                            {{ trans('global.back') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
