@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.peakTime.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('peak_time_create')
                    <a class="btn btn-indigo" href="{{ route('admin.peak-times.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.peakTime.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('peak-time.index')

    </div>
</div>
@endsection