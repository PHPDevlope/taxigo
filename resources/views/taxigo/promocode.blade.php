@extends('taxigo.layouts.admin')
@section('content')
    <header class="bg-surface-primary border-bottom pt-6">
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                        <h1 class="h2 mb-0 ls-tight">Promo Codes</h1>
                    </div>
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
                <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    <li class="nav-item">
                        <a class="nav-link active" >
                            <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                            </i>
                            Promo Codes
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <main class="py-6 bg-surface-secondary">
        <div class="container-fluid">
            @livewire('promocode.index')
        </div>

        <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasMain" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="Label">
                    Add Promocode
                </h5>
                <button type="button" class="btn-close text-reset text-xs" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body pt-0">
                @livewire('promocode.create')
            </div>
        </div>
    </main>
@endsection
