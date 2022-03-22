@extends('taxigo.layouts.admin')
@section('content')
    <header class="bg-surface-primary border-bottom pt-6">
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-nav-item">
                    <div class="col-6 mb-4 mb-sm-0">
                        <h1 class="h2 mb-0 ls-tight">App Setting</h1>
                    </div>
                    <div class="col-6 text-end">
                        <div class="mx-n1"></div>
                    </div>
                </div>
                <!-- Nav -->
                <ul class="nav nav-tabs mt-4 overflow-x border-0">
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link {{ request()->is("admin/app-settings/app-generals") ? "active" : "" }}" href="{{ route("admin.app-settings.app-generals") }}">--}}
{{--                            General--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link {{ request()->is("admin/app-settings/profile-links") ? "active" : "" }}" href="{{ route("admin.app-settings.profile-links") }}">--}}
{{--                            Comp.Profile Links--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link {{ request()->is("admin/app-settings/social-links") ? "active" : "" }}" href="{{ route("admin.app-settings.social-links") }}">--}}
{{--                            Scoial Link Config--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link {{ request()->is("admin/app-settings/algorithms") ? "active" : "" }}" href="{{ route("admin.app-settings.algorithms") }}">--}}
{{--                            Search Algorithm--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is("admin/app-settings/map-sms-configs") ? "active" : "" }}" href="{{ route("admin.app-settings.map-sms-configs") }}">
                            Map&SMS Config
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link {{ request()->is("admin/app-settings/mail-configs") ? "active" : "" }}" href="{{ route("admin.app-settings.mail-configs") }}">--}}
{{--                            Mail Config--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is("admin/app-settings/push-notifications") ? "active" : "" }}" href="{{ route("admin.app-settings.push-notifications") }}">
                            Push Notification
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link {{ request()->is("admin/app-settings/others") ? "active" : "" }}" href="{{ route("admin.app-settings.others") }}">--}}
{{--                            Others--}}
{{--                        </a>--}}
{{--                    </li>--}}
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
{{--                            @if(request()->is("admin/app-settings/app-generals"))--}}
{{--                                @livewire('app-general.edit')--}}
{{--                            @elseif(request()->is("admin/app-settings/profile-links"))--}}
{{--                                @livewire('profile-link.edit')--}}
{{--                            @elseif(request()->is("admin/app-settings/social-links"))--}}
{{--                                @livewire('social-link.edit')--}}
{{--                            @elseif(request()->is("admin/app-settings/algorithms"))--}}
{{--                                @livewire('algorithms.edit')--}}
                            @if(request()->is("admin/app-settings/map-sms-configs"))
                                @livewire('map-sms-config.edit')
{{--                            @elseif(request()->is("admin/app-settings/mail-configs"))--}}
{{--                                @livewire('mail-config.edit')--}}
                            @elseif(request()->is("admin/app-settings/push-notifications"))
                                @livewire('push-notification.edit')
{{--                            @elseif(request()->is("admin/app-settings/others"))--}}
{{--                                @livewire('other.edit')--}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
