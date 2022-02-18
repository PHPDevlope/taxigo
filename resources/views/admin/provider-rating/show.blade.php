@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.providerRating.title_singular') }}:
                    {{ trans('cruds.providerRating.fields.id') }}
                    {{ $providerRating->id }}
                </h6>
            </div>
        </div>

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
                                    <span class="badge badge-relationship">{{ $providerRating->request->total_distance ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.providerRating.fields.user_name') }}
                            </th>
                            <td>
                                @if($providerRating->userName)
                                    <span class="badge badge-relationship">{{ $providerRating->userName->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.providerRating.fields.provider_name') }}
                            </th>
                            <td>
                                @if($providerRating->providerName)
                                    <span class="badge badge-relationship">{{ $providerRating->providerName->name ?? '' }}</span>
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
            <div class="form-group">
                @can('provider_rating_edit')
                    <a href="{{ route('admin.provider-ratings.edit', $providerRating) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.provider-ratings.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection