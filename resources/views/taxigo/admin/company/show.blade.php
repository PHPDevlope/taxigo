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
                                {{ trans('cruds.company.title_singular') }}:
                                {{ trans('cruds.company.fields.id') }}
                                {{ $company->id }}
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
                            <div class="form-group mt-4">
                                <a href="{{ route('admin.company') }}" class="btn btn-sm btn-secondary">
                                    {{ trans('global.back') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection
