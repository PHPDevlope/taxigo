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
                            Provider Document : ID
                            {{ $providerDocument->id }}
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
                                            Id
                                        </th>
                                        <td>
                                            {{ $providerDocument->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            User
                                        </th>
                                        <td>
                                            @if($providerDocument->userName)
                                                <span class="badge badge-lg badge-dot">
                                                    <i class="bg-success"></i>
                                                    {{ $providerDocument->userName->name }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Document
                                        </th>
                                        <td>
                                            @if($providerDocument->documentName)
                                                <span class="badge badge-lg badge-dot">
                                                    <i class="bg-success"></i>
                                                    {{ $providerDocument->documentName->document_name }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Status
                                        </th>
                                        <td>
                                            {{ $providerDocument->status }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('admin.providers.document-services', $providerDocument->user_id) }}" class="btn btn-sm btn-secondary">
                                {{ trans('global.back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
