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
                            {{ trans('cruds.mStatement.title_singular') }}:
                            {{ trans('cruds.mStatement.fields.id') }}
                            {{ $mStatement->id }}
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
                                            {{ trans('cruds.mStatement.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $mStatement->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.mStatement.fields.user') }}
                                        </th>
                                        <td>
                                            @if($mStatement->user)
                                                <span class="badge badge-relationship">{{ $mStatement->user->name ?? '' }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.mStatement.fields.document') }}
                                        </th>
                                        <td>
                                            @if($mStatement->document)
                                                <span class="badge badge-relationship">{{ $mStatement->document->document_name ?? '' }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.mStatement.fields.files') }}
                                        </th>
                                        <td>
                                            @foreach($mStatement->files as $key => $entry)
                                                <a class="link-light-blue" href="{{ $entry['url'] }}">
                                                    <i class="far fa-file">
                                                    </i>
                                                    {{ $entry['file_name'] }}
                                                </a>
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('admin.statements') }}" class="btn btn-sm btn-secondary">
                                {{ trans('global.back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
