@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.userRating.title_singular') }}:
                    {{ trans('cruds.userRating.fields.id') }}
                    {{ $userRating->id }}
                </h6>
            </div>
        </div>

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
            <div class="form-group">
                @can('user_rating_edit')
                    <a href="{{ route('admin.user-ratings.edit', $userRating) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.user-ratings.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection