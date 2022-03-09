@extends('taxigo.layouts.admin')
@section('content')
    <header class="bg-surface-primary border-bottom pt-6">
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-nav-item">
                    <div class="col-6 mb-4 mb-sm-0">
                        <!-- Title -->
                        <h1 class="h2 mb-0 ls-tight">Ratings & Reviews</h1>
                    </div>
                    <!-- Actions -->
                    <div class="col-6 text-end">
                        <div class="mx-n1">
                            <a data-bs-toggle="offcanvas" href="#offcanvasMain" class="btn d-inline-flex btn-sm btn-dark mx-1">
                                <span class=" pe-2">
                                    <i class="bi bi-plus"></i>
                                </span>
                                <span>Create</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Nav -->
{{--                <ul class="nav nav-tabs mt-4 overflow-x border-0">--}}
{{--                    @if(request()->is("admin/ratings-reviews/user-ratings*"))--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link active" >--}}
{{--                                <i class="fa-fw c-sidebar-nav-icon fas fa-user">--}}
{{--                                </i>--}}
{{--                                User Ratings--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                    @if(request()->is("admin/ratings-reviews/provider-ratings*"))--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link active">--}}
{{--                                <i class="fa-fw c-sidebar-nav-icon fas fa-user"></i>--}}
{{--                                Provider Ratings--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                </ul>--}}
                <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    @can('user_rating_access')
                        <li class="nav-item">
                            <a class="{{ request()->is("admin/ratings-reviews/user-ratings*") ? "nav-link active" : "nav-link" }}" href="{{ route("admin.ratings-reviews.user-ratings") }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                </i>
                                {{ trans('cruds.userRating.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('provider_rating_access')
                        <li class="nav-item">
                            <a class="{{ request()->is("admin/ratings-reviews/provider-ratings*") ? "nav-link active" : "nav-link" }}" href="{{ route("admin.ratings-reviews.provider-ratings") }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                </i>
                                {{ trans('cruds.providerRating.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>
    </header>

    <main class="py-6 bg-surface-secondary">
        <div class="container-fluid">
            <div>
                @if(request()->is("admin/ratings-reviews/user-ratings"))
                    @livewire('user-rating.index')
                @elseif(request()->is("admin/ratings-reviews/provider-ratings"))
                    @livewire('provider-rating.index')
                @endif
            </div>
        </div>
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasMain" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="Label">
                    @if(request()->is("admin/ratings-reviews/user-ratings"))
                        Add User Rating
                    @elseif(request()->is("admin/ratings-reviews/provider-ratings"))
                        Add Provider Rating
                    @endif
                </h5>
                <button type="button" class="btn-close text-reset text-xs" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body pt-0">
                @if(request()->is("admin/ratings-reviews/user-ratings"))
                    @livewire('user-rating.create')
                @elseif(request()->is("admin/ratings-reviews/provider-ratings"))
                    @livewire('provider-rating.create')
                @endif
            </div>
        </div>
    </main>
@endsection
