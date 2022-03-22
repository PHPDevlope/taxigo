@extends('taxigo.layouts.admin')
@section('content')
    <header class="bg-surface-primary border-bottom pt-6">
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                        <h1 class="h2 mb-0 ls-tight">Payment Setting</h1>
                    </div>
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
                <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is("admin/payment-settings/payment-modes") ? "active" : "" }}" href="{{ route("admin.payment-settings.payment-modes") }}">
                            Payment Modes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is("admin/payment-settings/pay-settings") ? "active" : "" }}" href="{{ route("admin.payment-settings.pay-settings") }}">
                            Payment Settings
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <main class="py-6 bg-surface-secondary">
        <div class="container-fluid">
            <div class="row">
                <div class="card bg-blueGray-100 col-xl-12 col-lg-12 col-md-12">
                    <div class="card-body">
                        <div>
                            @if(request()->is("admin/payment-settings/payment-modes"))
                                @livewire('payment-mode.edit')
                            @elseif(request()->is("admin/payment-settings/pay-settings"))
                                @livewire('pay-setting.edit')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
