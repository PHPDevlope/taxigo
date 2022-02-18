@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.mSetting.title_singular') }}:
                    {{ trans('cruds.mSetting.fields.id') }}
                    {{ $mSetting->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.mSetting.fields.id') }}
                            </th>
                            <td>
                                {{ $mSetting->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.mSetting.fields.key') }}
                            </th>
                            <td>
                                {{ $mSetting->key }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.mSetting.fields.value') }}
                            </th>
                            <td>
                                {{ $mSetting->value }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.mSetting.fields.data') }}
                            </th>
                            <td>
                                {{ $mSetting->data }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.mSetting.fields.sub_data') }}
                            </th>
                            <td>
                                {{ $mSetting->sub_data }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.mSetting.fields.field_1') }}
                            </th>
                            <td>
                                {{ $mSetting->field_1 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.mSetting.fields.field_2') }}
                            </th>
                            <td>
                                {{ $mSetting->field_2 }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('m_setting_edit')
                    <a href="{{ route('admin.m-settings.edit', $mSetting) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.m-settings.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection