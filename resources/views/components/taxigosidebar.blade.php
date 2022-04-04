<nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 py-lg-0 navbar-dark bg-dark"
     id="navbarVertical">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse"
                aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0 mt-4 " href="/">
            <img src="{{asset('images/logo_wide.png')}}" style="height: 50px;" alt="...">
        </a>
        <div class="collapse navbar-collapse" id="sidebarCollapse">
            <ul class="navbar-nav">
                <span class="menu-label">Admin Dashboard</span>
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link {{ request()->is("admin") ? "active" : "" }}">
                        <i class="fa-fw c-sidebar-nav-icon fas fa-tv"></i>
                        {{ trans('global.dashboard') }}
                    </a>
                </li>
                @can('dispute_panel_access')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is("admin/dispute-panel*") ? "active" : "" }}"
                           href="{{route('admin.dispute-panel.dispute-types')}}" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-dot-circle"></i>
                            Dispute Panel
                        </a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route('admin.dispatcher-panels') }}" class="{{ request()->is("admin/dispatcher-panels*") ? "nav-link active" : "nav-link"}}">
                        <i class="fa-fw c-sidebar-nav-icon fas fa-building"></i>
                        Dispatcher Panel
                    </a>
                </li>
                @can('company_access')
                    <li class="nav-item">
                        <a class="{{ request()->is("admin/company*") ? "nav-link active" : "nav-link" }}"
                           href="{{ route("admin.company") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-building"></i>
                            {{ trans('cruds.company.title') }}
                        </a>
                    </li>
                @endcan

                <span class="menu-label">Members</span>
                @can('user_access')
                    <li class="nav-item">
                        <a class="nav-link  {{ request()->is("admin/users") ? "active" : "" }}" href="{{ route("admin.users") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                            </i>
                            {{ trans('cruds.user.title') }}
                        </a>
                    </li>
                @endcan
                @can('provider_access')
                    <li class="nav-item">
                        <a class="{{ request()->is("admin/providers*") ? "nav-link active" : "nav-link" }}" href="{{ route("admin.providers") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-car-side">
                            </i>
                            {{ trans('cruds.provider.title') }}
                        </a>
                    </li>
                @endcan
                @can('fleet_owner_access')
                    <li class="nav-item">
                        <a class="{{ request()->is("admin/fleet-owners*") ? "nav-link active" : "nav-link" }}" href="{{ route("admin.fleet-owners") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-crown">
                            </i>
                            {{ trans('cruds.fleetOwner.title') }}
                        </a>
                    </li>
                @endcan
                @can('dispatcher_access')
                    <li class="nav-item">
                        <a class="{{ request()->is("admin/dispatchers*") ? "nav-link active" : "nav-link" }}" href="{{ route("admin.dispatchers") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-crown">
                            </i>
                            {{ trans('cruds.dispatcher.title') }}
                        </a>
                    </li>
                @endcan
                @can('account_manager_access')
                    <li class="nav-item">
                        <a class="{{ request()->is("admin/account-managers*") ? "nav-link active" : "nav-link" }}" href="{{ route("admin.account-managers") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-crown">
                            </i>
                            {{ trans('cruds.accountManager.title') }}
                        </a>
                    </li>
                @endcan
                @can('dispute_manager_access')
                    <li class="nav-item">
                        <a class="{{ request()->is("admin/dispute-managers*") ? "nav-link active" : "nav-link" }}" href="{{ route("admin.dispute-managers") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-crown">
                            </i>
                            {{ trans('cruds.disputeManager.title') }}
                        </a>
                    </li>
                @endcan
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route("admin.provider-documents") }}" class="{{ request()->is("admin/provider-documents*") ? "nav-link active" : "nav-link" }}">--}}
{{--                        <i class="fa-fw c-sidebar-nav-icon fas fa-book">--}}
{{--                        </i>--}}
{{--                        Provider Document--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route("admin.provider-services") }}" class="{{ request()->is("admin/provider-services*") ? "nav-link active" : "nav-link" }}">--}}
{{--                        <i class="fa-fw c-sidebar-nav-icon fas fa-rocket">--}}
{{--                        </i>--}}
{{--                        Provider Service--}}
{{--                    </a>--}}
{{--                </li>--}}


                <span class="menu-label">Accounts</span>
                @can('m_statement_access')
                    <li class="nav-item">
                        <a class="{{ request()->is("admin/statements*") ? "nav-link active" : "nav-link" }}"
                           href="{{ route("admin.statements") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-file"></i>
                            {{ trans('cruds.mStatement.title') }}
                        </a>
                    </li>
                @endcan
                @can('providersettlement_access')
                    <li class="nav-item">
                        <a class="{{ request()->is("admin/provider-settlement*") ? "nav-link active" : "nav-link" }}"
                           href="{{ route("admin.provider-settlement") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-file"></i>
                            {{ trans('cruds.providersettlement.title') }}
                        </a>
                    </li>
                @endcan

                <span class="menu-label">Details</span>
                @can('ratings_review_access')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is("admin/ratings-reviews*") ? "active" : "" }}"
                           href="{{route('admin.ratings-reviews.user-ratings')}}" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-star"></i>
                            Rating & Reviews
                        </a>
                    </li>
                @endcan

                <span class="menu-label">History</span>
                @can('request_history_access')
                    <li class="nav-item">
                        <a class="{{ request()->is("admin/request-history*") ? "nav-link active" : "nav-link" }}"
                           href="{{ route("admin.request-history") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-infinity"></i>
                            {{ trans('cruds.requestHistory.title') }}
                        </a>
                    </li>
                @endcan
                @can('payment_detail_access')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is("admin/payment-details*") ? "active" : "" }}"
                           href="{{route('admin.payment-details.payment-histories')}}"
                           onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-infinity"></i>
                            Payment History
                        </a>
                    </li>
                @endcan

                <span class="menu-label">General</span>
                @can('document_access')
                    <li class="nav-item">
                        <a class="{{ request()->is("admin/document*") ? "nav-link active" : "nav-link" }}"
                           href="{{ route("admin.document") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-book"></i>
                            {{ trans('cruds.document.title') }}
                        </a>
                    </li>
                @endcan
                @can('service_access')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is("admin/service*") ? "active" : "" }}"
                           href="{{route('admin.service.service-types')}}" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-taxi"></i>
                            Service
                        </a>
                    </li>
                @endcan
                @can('promocode_access')
                    <li class="nav-item">
                        <a class="{{ request()->is("admin/promocode*") ? "nav-link active" : "nav-link" }}"
                           href="{{ route("admin.promocode") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-percent"></i>
                            {{ trans('cruds.promocode.title') }}
                        </a>
                    </li>
                @endcan

                <span class="menu-label">Setting</span>
                @can('m_setting_access')
{{--                    <li class="nav-item">--}}
{{--                        <a class="{{ request()->is("admin/m-settings*") ? "nav-link active" : "nav-link" }}"--}}
{{--                           href="{{ route("admin.m-settings") }}">--}}
{{--                            <i class="fa-fw c-sidebar-nav-icon fas fa-cog">--}}
{{--                            </i>--}}
{{--                            {{ trans('cruds.mSetting.title') }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
                @endcan
                <li class="nav-item">
                    <a class="{{ request()->is("admin/site-settings*") ? "nav-link active" : "nav-link" }}"
                       href="{{ route("admin.site-settings.app-generals") }}">
                        <i class="fa-fw c-sidebar-nav-icon fas fa-mobile">
                        </i>
                        Site Setting
                    </a>
                </li>
                @can('app_setting_access')
                    <li class="nav-item">
                        <a class="{{ request()->is("admin/app-settings*") ? "nav-link active" : "nav-link" }}"
                           href="{{ route("admin.app-settings.map-sms-configs") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-mobile">
                            </i>
                            {{ trans('cruds.appSetting.title') }}
                        </a>
                    </li>
                @endcan
                @can('payment_setting_access')
                    <li class="nav-item">
                        <a class="{{ request()->is("admin/payment-settings*") ? "nav-link active" : "nav-link" }}"
                           href="{{ route("admin.payment-settings.payment-modes") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-money-bill">
                            </i>
                            {{ trans('cruds.paymentSetting.title') }}
                        </a>
                    </li>
                @endcan

                <span class="menu-label">Others</span>
                @can('static_page_access')
                    <li class="nav-item">
                        <a class="{{ request()->is("admin/static-page*") ? "nav-link active" : "nav-link" }}"
                           href="{{ route("admin.static-page") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-charging-station"></i>
                            {{ trans('cruds.staticPage.title') }}
                        </a>
                    </li>
                @endcan

                <span class="menu-label">Users</span>
                @can('user_management_access')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is("admin/role-management*") ? "active" : "" }}"
                           href="{{route('admin.role-management.roles')}}" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-users"></i>
                            User Management
                        </a>
                    </li>
                @endcan
                @can('user_alert_access')
                    <li class="nav-item">
                        <a class="{{ request()->is("admin/user-alert*") ? "nav-link active" : "nav-link" }}"
                           href="{{ route("admin.user-alert") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-bell"></i>
                            {{ trans('cruds.userAlert.title') }}
                        </a>
                    </li>
                @endcan

                <span class="menu-label">Account</span>
                {{--                @if(file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))--}}
                {{--                    @can('auth_profile_edit')--}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->is("admin/my-account*") ? "active" : "" }}"
                       href="{{route('admin.my-account')}}">
                        <i class="fa-fw c-sidebar-nav-icon fas fa-user-circle"></i>
                        {{ trans('global.my_profile') }}
                    </a>
                </li>
                {{--                    @endcan--}}
                {{--                @endif--}}

                <li class="nav-item">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
                       class="nav-link">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
