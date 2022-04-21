@extends('taxigo.layouts.admin')
@section('content')
    <header class="bg-surface-primary border-bottom pt-6 pb-6">
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-nav-item">
                    <div class="col-3">
                        <h1 class="h2 mb-0 ls-tight">Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="py-6 bg-surface-secondary">
        <div class="container-fluid">
            <!-- Card stats -->
            <div class="row g-6 mb-6">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0 box-block">
                        <div class="half-circle bg-tertiary">
                            <i class="bi bi-credit-card"></i>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total No. of Rides</span>
                                    <span class="h3 font-bold mb-0">25</span>
                                </div>
                                <div class="col-auto">
{{--                                    <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">--}}
{{--                                        <i class="bi bi-credit-card"></i>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-success text-success me-2">
                                <i class="bi bi-arrow-up me-1"></i>0.24%
                            </span>
                                <span class="text-nowrap text-xs text-muted">% down from cancelled Request</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0 box-block">
                        <div class="half-circle bg-primary">
                            <i class="bi bi-bar-chart"></i>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">REVENUE</span>
                                    <span class="h3 font-bold mb-0">$2004</span>
                                </div>
                                <div class="col-auto">
{{--                                    <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">--}}
{{--                                        <i class="bi bi-people"></i>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-success text-success me-2">
                                <i class="bi bi-arrow-up me-1"></i>
                            </span>
                                <span class="text-nowrap text-xs text-muted">from 25 Rides</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0 box-block">
                        <div class="half-circle bg-info">
                            <i class="bi bi-grid"></i>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Users</span>
                                    <span class="h3 font-bold mb-0">104</span>
                                </div>
                                <div class="col-auto">
{{--                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">--}}
{{--                                        <i class="bi bi-clock-history"></i>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="mt-2 mb-0 text-sm"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0 box-block">
                        <div class="half-circle bg-warning">
                            <i class="bi bi-archive"></i>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Providers</span>
                                    <span class="h3 font-bold mb-0">105</span>
                                </div>
                                <div class="col-auto">
{{--                                    <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">--}}
{{--                                        <i class="bi bi-minecart-loaded"></i>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
{{--                            <div class="mt-2 mb-0 text-sm">--}}
{{--                                <span class="text-nowrap text-xs text-muted">Sedan:</span>--}}
{{--                                <span class="badge badge-pill bg-soft-danger text-white me-2">102</span>--}}
{{--                            </div>--}}
{{--                            <div class="mt-2 mb-0 text-sm">--}}
{{--                                <span class="text-nowrap text-xs text-muted">Hatchback:</span>--}}
{{--                                <span class="badge badge-pill bg-soft-danger text-white me-2">0</span>--}}
{{--                            </div>--}}
{{--                            <div class="mt-2 mb-0 text-sm">--}}
{{--                                <span class="text-nowrap text-xs text-muted">SUV:</span>--}}
{{--                                <span class="badge badge-pill bg-soft-danger text-white me-2">0</span>--}}
{{--                            </div>--}}
{{--                            <div class="mt-2 mb-0 text-sm">--}}
{{--                                <span class="text-nowrap text-xs text-muted">Limousine:</span>--}}
{{--                                <span class="badge badge-pill bg-soft-danger text-white me-2">0</span>--}}
{{--                            </div>--}}
{{--                            <div class="mt-2 mb-0 text-sm">--}}
{{--                                <span class="text-nowrap text-xs text-muted">Water Tanker:</span>--}}
{{--                                <span class="badge badge-pill bg-soft-danger text-white me-2">0</span>--}}
{{--                            </div>--}}
{{--                            <div class="mt-2 mb-0 text-sm">--}}
{{--                                <span class="text-nowrap text-xs text-muted">Bike:</span>--}}
{{--                                <span class="badge badge-pill bg-soft-danger text-white me-2">2</span>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-6 mb-6">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0 box-block">
                        <div class="half-circle bg-tertiary">
                            <i class="bi bi-grid"></i>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Users cancelled Count</span>
                                    <span class="h3 font-bold mb-0">2</span>
                                </div>
                                <div class="col-auto">
{{--                                    <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">--}}
{{--                                        <i class="bi bi-credit-card"></i>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="mt-2 mb-0 text-sm"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0 box-block">
                        <div class="half-circle bg-primary">
                            <i class="bi bi-bar-chart"></i>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Provider cancelled count</span>
                                    <span class="h3 font-bold mb-0">1</span>
                                </div>
                                <div class="col-auto">
{{--                                    <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">--}}
{{--                                        <i class="bi bi-people"></i>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="mt-2 mb-0 text-sm"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0 box-block">
                        <div class="half-circle bg-info">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">No. of fleets</span>
                                    <span class="h3 font-bold mb-0">1</span>
                                </div>
                                <div class="col-auto">
{{--                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">--}}
{{--                                        <i class="bi bi-clock-history"></i>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="mt-2 mb-0 text-sm"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0 box-block">
                        <div class="half-circle bg-warning">
                            <i class="bi bi-bar-chart"></i>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">No. of scheduled rides</span>
                                    <span class="h3 font-bold mb-0">0</span>
                                </div>
                                <div class="col-auto">
{{--                                    <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">--}}
{{--                                        <i class="bi bi-minecart-loaded"></i>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="mt-2 mb-0 text-sm"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


