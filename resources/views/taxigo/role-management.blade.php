@extends('taxigo.layouts.admin')
@section('content')
<header class="bg-surface-primary border-bottom pt-6">
    <div class="container-fluid">
        <div class="mb-npx">
            <div class="row align-nav-item">
                <div class="col-6 mb-4 mb-sm-0">
                    <!-- Title -->
                    <h1 class="h2 mb-0 ls-tight">Role Management</h1>
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
                @can('user_access')
                    <li class="nav-item">
                        <a class="nav-link  {{ request()->is("admin/role-management/users") ? "active" : "" }}" href="{{ route("admin.role-management.users") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                            </i>
                            {{ trans('cruds.user.title') }}
                        </a>
                    </li>
                @endcan
                @can('role_access')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is("admin/role-management/roles") ? "active" : "" }}" href="{{ route("admin.role-management.roles") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                            </i>
                            {{ trans('cruds.role.title') }}
                        </a>
                    </li>
                @endcan
                @can('permission_access')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is("admin/role-management/permissions") ? "active" : "" }}" href="{{ route("admin.role-management.permissions") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-unlock-alt">
                            </i>
                            {{ trans('cruds.permission.title') }}
                        </a>
                    </li>
                @endcan
                @can('audit_log_access')
                    <li class="nav-item ">
                        <a class="nav-link {{ request()->is("admin/role-management/audit-logs") ? "active" : "" }}" href="{{ route("admin.role-management.audit-logs") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-file-alt">
                            </i>
                            {{ trans('cruds.auditLog.title') }}
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
            @if(request()->is("admin/role-management/users"))
                @livewire('user.index')
            @elseif(request()->is("admin/role-management/roles"))
                @livewire('role.index')
            @elseif(request()->is("admin/role-management/permissions"))
                @livewire('permission.index')
            @elseif(request()->is("admin/role-management/audit-logs"))
                @livewire('audit-log.index')
            @endif
        </div>
    </div>
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasMain" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="Label">
                @if(request()->is("admin/role-management/users"))
                    Add User
                @elseif(request()->is("admin/role-management/roles"))
                    Add Role
                @elseif(request()->is("admin/role-management/permissions"))
                    Add Permission
                @endif
            </h5>
            <button type="button" class="btn-close text-reset text-xs" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body pt-0">
            @if(request()->is("admin/role-management/users"))
                @livewire('user.create')
            @elseif(request()->is("admin/role-management/roles"))
                @livewire('role.create')
            @elseif(request()->is("admin/role-management/permissions"))
                @livewire('permission.create')
            @endif
        </div>
    </div>
</main>
@endsection
