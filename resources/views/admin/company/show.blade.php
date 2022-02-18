@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.company.title_singular') }}:
                    {{ trans('cruds.company.fields.id') }}
                    {{ $company->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.company.fields.id') }}
                            </th>
                            <td>
                                {{ $company->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.company.fields.user') }}
                            </th>
                            <td>
                                @if($company->user)
                                    <span class="badge badge-relationship">{{ $company->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.company.fields.logo') }}
                            </th>
                            <td>
                                @foreach($company->logo as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.company.fields.docs') }}
                            </th>
                            <td>
                                @foreach($company->docs as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.company.fields.name') }}
                            </th>
                            <td>
                                {{ $company->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.company.fields.address') }}
                            </th>
                            <td>
                                {{ $company->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.company.fields.commission_type') }}
                            </th>
                            <td>
                                {{ $company->commission_type_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.company.fields.commission_value') }}
                            </th>
                            <td>
                                {{ $company->commission_value }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.company.fields.status') }}
                            </th>
                            <td>
                                {{ $company->status_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('company_edit')
                    <a href="{{ route('admin.companies.edit', $company) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.companies.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection