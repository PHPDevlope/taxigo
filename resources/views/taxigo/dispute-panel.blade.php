@extends('taxigo.layouts.admin')
@section('content')
    <header class="bg-surface-primary border-bottom pt-6">
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-nav-item">
                    <div class="col-6 mb-4 mb-sm-0">
                        <!-- Title -->
                        <h1 class="h2 mb-0 ls-tight">Dispute Panel</h1>
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
                <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    @can('dispute_request_access')
                        <li class="nav-item">
                            <a class="{{ request()->is("admin/dispute-panel/dispute-requests*") ? "nav-link active" : "nav-link" }}" href="{{ route("admin.dispute-panel.dispute-requests") }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-history">
                                </i>
                                {{ trans('cruds.disputeRequest.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('dispute_type_access')
                        <li class="nav-item">
                            <a class="{{ request()->is("admin/dispute-panel/dispute-types*") ? "nav-link active" : "nav-link" }}" href="{{ route("admin.dispute-panel.dispute-types") }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-rocket">
                                </i>
                                {{ trans('cruds.disputeType.title') }}
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
                @if(request()->is("admin/dispute-panel/dispute-requests"))
                    @livewire('dispute-request.index')
                @elseif(request()->is("admin/dispute-panel/dispute-types"))
                    @livewire('dispute-type.index')
                @endif
            </div>
        </div>
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasMain" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="Label">
                    @if(request()->is("admin/dispute-panel/dispute-requests"))
                        Add Dispute Request
                    @elseif(request()->is("admin/dispute-panel/dispute-types"))
                        Add Dispute Type
                    @endif
                </h5>
                <button type="button" class="btn-close text-reset text-xs" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body pt-0">
                @if(request()->is("admin/dispute-panel/dispute-requests"))
                    @livewire('dispute-request.create')
                @elseif(request()->is("admin/dispute-panel/dispute-types"))
                    @livewire('dispute-type.create')
                @endif
            </div>
        </div>
    </main>
@endsection
