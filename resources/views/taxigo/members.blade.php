@extends('taxigo.layouts.admin')
@section('content')
    <header class="bg-surface-primary border-bottom pt-6">
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-nav-item">
                    <div class="col-6 mb-4 mb-sm-0">
                        <!-- Title -->
                        <h1 class="h2 mb-0 ls-tight">Members</h1>
                    </div>
                    <!-- Actions -->
                    <div class="col-6 text-end">
                        <div class="mx-n1">
{{--                            <a data-bs-toggle="offcanvas" href="#offcanvasMain" class="btn d-inline-flex btn-sm btn-dark mx-1">--}}
{{--                                <span class=" pe-2">--}}
{{--                                    <i class="bi bi-plus"></i>--}}
{{--                                </span>--}}
{{--                                <span>Create</span>--}}
{{--                            </a>--}}
                        </div>
                    </div>
                </div>
                <!-- Nav -->
                <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    @if(request()->is("admin/members/providers*"))
                        <li class="nav-item">
                            <a class="{{ request()->is("admin/members/providers*") ? "nav-link active" : "nav-link" }}" href="{{ route("admin.members.providers") }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                </i>
                                {{ trans('cruds.provider.title') }}
                            </a>
                        </li>
                    @endif
                    @if(request()->is("admin/members/fleet-owners*"))
                        <li class="nav-item">
                            <a class="{{ request()->is("admin/members/fleet-owners*") ? "nav-link active" : "nav-link" }}" href="{{ route("admin.members.fleet-owners") }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                </i>
                                {{ trans('cruds.fleetOwner.title') }}
                            </a>
                        </li>
                    @endif
                    @if(request()->is("admin/members/dispatchers*"))
                        <li class="nav-item">
                            <a class="{{ request()->is("admin/members/dispatchers*") ? "nav-link active" : "nav-link" }}" href="{{ route("admin.members.dispatchers") }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                </i>
                                {{ trans('cruds.dispatcher.title') }}
                            </a>
                        </li>
                    @endif
                    @if(request()->is("admin/members/account-managers*"))
                        <li class="nav-item">
                            <a class="{{ request()->is("admin/members/account-managers*") ? "nav-link active" : "nav-link" }}" href="{{ route("admin.members.account-managers") }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                </i>
                                {{ trans('cruds.accountManager.title') }}
                            </a>
                        </li>
                    @endif
                    @if(request()->is("admin/members/dispute-managers*"))
                        <li class="nav-item">
                            <a class="{{ request()->is("admin/members/dispute-managers*") ? "nav-link active" : "nav-link" }}" href="{{ route("admin.members.dispute-managers") }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                </i>
                                {{ trans('cruds.disputeManager.title') }}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </header>

{{--    <main class="py-6 bg-surface-secondary">--}}
{{--        <div class="container-fluid">--}}
{{--            <div>--}}
{{--                @if(request()->is("admin/members/providers"))--}}
{{--                    @livewire('user.index')--}}
{{--                @elseif(request()->is("admin/members/fleet-owners"))--}}
{{--                    @livewire('role.index')--}}
{{--                @elseif(request()->is("admin/members/dispatcher"))--}}
{{--                    @livewire('permission.index')--}}
{{--                @elseif(request()->is("admin/members/account-managers"))--}}
{{--                    @livewire('audit-log.index')--}}
{{--                @elseif(request()->is("admin/members/dispute-managers"))--}}
{{--                    @livewire('audit-log.index')--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasMain" aria-labelledby="offcanvasExampleLabel">--}}
{{--            <div class="offcanvas-header">--}}
{{--                <h5 class="offcanvas-title" id="Label">--}}
{{--                    @if(request()->is("admin/members/providers"))--}}
{{--                        Add User--}}
{{--                    @elseif(request()->is("admin/members/fleet-owners"))--}}
{{--                        Add Role--}}
{{--                    @elseif(request()->is("admin/members/dispatcher"))--}}
{{--                        Add Permission--}}
{{--                    @elseif(request()->is("admin/members/account-managers"))--}}
{{--                        Add Permission--}}
{{--                    @elseif(request()->is("admin/members/dispute-managers"))--}}
{{--                        Add Permission--}}
{{--                    @endif--}}
{{--                </h5>--}}
{{--                <button type="button" class="btn-close text-reset text-xs" data-bs-dismiss="offcanvas" aria-label="Close"></button>--}}
{{--            </div>--}}
{{--            <div class="offcanvas-body pt-0">--}}
{{--                @if(request()->is("admin/members/providers"))--}}
{{--                    @livewire('user.create')--}}
{{--                @elseif(request()->is("admin/members/fleet-owners"))--}}
{{--                    @livewire('role.create')--}}
{{--                @elseif(request()->is("admin/members/disputacher"))--}}
{{--                    @livewire('permission.create')--}}
{{--                @elseif(request()->is("admin/members/account-managers"))--}}
{{--                    @livewire('permission.create')--}}
{{--                @elseif(request()->is("admin/members/dispute-managers"))--}}
{{--                    @livewire('permission.create')--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </main>--}}
@endsection
