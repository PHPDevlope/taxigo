@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.peakTime.title_singular') }}:
                    {{ trans('cruds.peakTime.fields.id') }}
                    {{ $peakTime->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('peak-time.edit', [$peakTime])
        </div>
    </div>
</div>
@endsection