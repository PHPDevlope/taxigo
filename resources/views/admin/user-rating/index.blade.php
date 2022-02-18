@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.userRating.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('user_rating_create')
                    <a class="btn btn-indigo" href="{{ route('admin.user-ratings.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.userRating.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('user-rating.index')

    </div>
</div>
@endsection