@extends('taxigo.layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.staticPage.title_singular') }}:
                    {{ trans('cruds.staticPage.fields.id') }}
                    {{ $staticPage->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.staticPage.fields.id') }}
                            </th>
                            <td>
                                {{ $staticPage->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.staticPage.fields.page_name') }}
                            </th>
                            <td>
                                {{ $staticPage->page_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.staticPage.fields.content') }}
                            </th>
                            <td>
                                {{ $staticPage->content }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.staticPage.fields.data') }}
                            </th>
                            <td>
                                {{ $staticPage->data }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.staticPage.fields.status') }}
                            </th>
                            <td>
                                {{ $staticPage->status_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('static_page_edit')
                    <a href="{{ route('admin.static-pages.edit', $staticPage) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.static-pages.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection