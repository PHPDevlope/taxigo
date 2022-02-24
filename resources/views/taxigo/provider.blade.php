@extends('taxigo.layouts.admin')
@section('content')
    <header class="bg-surface-primary border-bottom pt-6">
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-nav-item">
                    <div class="col-6 mb-4 mb-sm-0">
                        <!-- Title -->
                        <h1 class="h2 mb-0 ls-tight">Provider</h1>
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
                    <li class="nav-item">
                        <a class="nav-link active" >
                            <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                            </i>
                            Provider
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

{{--        <main class="py-6 bg-surface-secondary">--}}
{{--            <div class="container-fluid">--}}
{{--                <div>--}}
{{--                    @if(request()->is("admin/members/providers"))--}}
{{--                        @livewire('user.index')--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasMain" aria-labelledby="offcanvasExampleLabel">--}}
{{--                <div class="offcanvas-header">--}}
{{--                    <h5 class="offcanvas-title" id="Label">--}}
{{--                        @if(request()->is("admin/members/providers"))--}}
{{--                            Add User--}}
{{--                        @endif--}}
{{--                    </h5>--}}
{{--                    <button type="button" class="btn-close text-reset text-xs" data-bs-dismiss="offcanvas" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <div class="offcanvas-body pt-0">--}}
{{--                    @if(request()->is("admin/members/providers"))--}}
{{--                        @livewire('user.create')--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </main>--}}
@endsection
