@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.peakTime.title_singular') }}:
                    {{ trans('cruds.peakTime.fields.id') }}
                    {{ $peakTime->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.peakTime.fields.id') }}
                            </th>
                            <td>
                                {{ $peakTime->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.peakTime.fields.from') }}
                            </th>
                            <td>
                                {{ $peakTime->from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.peakTime.fields.to') }}
                            </th>
                            <td>
                                {{ $peakTime->to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.peakTime.fields.peak_price') }}
                            </th>
                            <td>
                                {{ $peakTime->peak_price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.peakTime.fields.status') }}
                            </th>
                            <td>
                                {{ $peakTime->status_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('peak_time_edit')
                    <a href="{{ route('admin.peak-times.edit', $peakTime) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.peak-times.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection