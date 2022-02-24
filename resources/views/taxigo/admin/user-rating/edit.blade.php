@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.userRating.title_singular') }}:
                    {{ trans('cruds.userRating.fields.id') }}
                    {{ $userRating->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('user-rating.edit', [$userRating])
        </div>
    </div>
</div>
@endsection