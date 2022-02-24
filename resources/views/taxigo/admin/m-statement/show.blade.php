@extends('taxigo.layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.mStatement.title_singular') }}:
                    {{ trans('cruds.mStatement.fields.id') }}
                    {{ $mStatement->id }}
                </h6>
            </div>
        </div>

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
            <div class="form-group">
                @can('m_statement_edit')
                    <a href="{{ route('admin.m-statements.edit', $mStatement) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.m-statements.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection