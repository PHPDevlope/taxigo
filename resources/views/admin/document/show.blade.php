@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.document.title_singular') }}:
                    {{ trans('cruds.document.fields.id') }}
                    {{ $document->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.document.fields.id') }}
                            </th>
                            <td>
                                {{ $document->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.document.fields.document_name') }}
                            </th>
                            <td>
                                {{ $document->document_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.document.fields.document_type') }}
                            </th>
                            <td>
                                {{ $document->document_type_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('document_edit')
                    <a href="{{ route('admin.documents.edit', $document) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.documents.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection