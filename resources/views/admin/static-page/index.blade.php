@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.staticPage.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('static_page_create')
                    <a class="btn btn-indigo" href="{{ route('admin.static-pages.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.staticPage.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('static-page.index')

    </div>
</div>
@endsection