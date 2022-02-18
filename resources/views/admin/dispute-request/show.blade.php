@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.disputeRequest.title_singular') }}:
                    {{ trans('cruds.disputeRequest.fields.id') }}
                    {{ $disputeRequest->id }}
                </h6>
            </div>
        </div>

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
                                @if($disputeRequest->dispute)
                                    <span class="badge badge-relationship">{{ $disputeRequest->dispute->dispute_type ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('dispute_request_edit')
                    <a href="{{ route('admin.dispute-requests.edit', $disputeRequest) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.dispute-requests.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection