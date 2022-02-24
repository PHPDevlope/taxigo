@extends('taxigo.layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.providersettlement.title_singular') }}:
                    {{ trans('cruds.providersettlement.fields.id') }}
                    {{ $providersettlement->id }}
                </h6>
            </div>
        </div>

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
            <div class="form-group">
                @can('providersettlement_edit')
                    <a href="{{ route('admin.providersettlements.edit', $providersettlement) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.providersettlements.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection