<nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
            {{ trans('panel.site_title') }}
        </a>
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-300">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
                            {{ trans('panel.site_title') }}
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>

            <form class="mt-6 mb-4 md:hidden">
                <div class="mb-3 pt-0">
                    @livewire('global-search')
                </div>
            </form>

            <!-- Divider -->
            <div class="flex md:hidden">
                @if(file_exists(app_path('Http/Livewire/LanguageSwitcher.php')))
                    <livewire:language-switcher />
                @endif
            </div>
            <hr class="mb-6 md:min-w-full" />
            <!-- Heading -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{ route("admin.home") }}" class="{{ request()->is("admin") ? "sidebar-nav-active" : "sidebar-nav" }}">
                        <i class="fas fa-tv"></i>
                        {{ trans('global.dashboard') }}
                    </a>
                </li>

                @can('user_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/permissions*")||request()->is("admin/roles*")||request()->is("admin/users*")||request()->is("admin/audit-logs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-users">
                            </i>
                            {{ trans('cruds.userManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('permission_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/permissions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.permissions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-unlock-alt">
                                        </i>
                                        {{ trans('cruds.permission.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/roles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.roles.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.role.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.users.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                        </i>
                                        {{ trans('cruds.user.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/audit-logs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.audit-logs.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-file-alt">
                                        </i>
                                        {{ trans('cruds.auditLog.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_alert_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/user-alerts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.user-alerts.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-bell">
                            </i>
                            {{ trans('cruds.userAlert.title') }}
                        </a>
                    </li>
                @endcan
                @can('dispute_panel_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/dispute-types*")||request()->is("admin/dispute-requests*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.disputePanel.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('dispute_type_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/dispute-types*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.dispute-types.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.disputeType.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('dispute_request_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/dispute-requests*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.dispute-requests.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.disputeRequest.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('company_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/companies*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.companies.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.company.title') }}
                        </a>
                    </li>
                @endcan
                @can('member_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/providers*")||request()->is("admin/fleet-owners*")||request()->is("admin/dispatchers*")||request()->is("admin/account-managers*")||request()->is("admin/dispute-managers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.member.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('provider_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/providers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.providers.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.provider.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('fleet_owner_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/fleet-owners*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.fleet-owners.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.fleetOwner.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('dispatcher_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/dispatchers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.dispatchers.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.dispatcher.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('account_manager_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/account-managers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.account-managers.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.accountManager.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('dispute_manager_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/dispute-managers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.dispute-managers.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.disputeManager.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('m_statement_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/m-statements*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.m-statements.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.mStatement.title') }}
                        </a>
                    </li>
                @endcan
                @can('ratings_review_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/user-ratings*")||request()->is("admin/provider-ratings*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.ratingsReview.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('user_rating_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/user-ratings*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.user-ratings.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.userRating.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('provider_rating_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/provider-ratings*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.provider-ratings.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.providerRating.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('document_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/documents*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.documents.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.document.title') }}
                        </a>
                    </li>
                @endcan
                @can('service_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/service-types*")||request()->is("admin/peak-times*")||request()->is("admin/geo-fencings*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.service.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('service_type_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/service-types*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.service-types.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.serviceType.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('peak_time_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/peak-times*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.peak-times.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.peakTime.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('geo_fencing_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/geo-fencings*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.geo-fencings.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.geoFencing.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('promocode_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/promocodes*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.promocodes.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.promocode.title') }}
                        </a>
                    </li>
                @endcan
                @can('payment_detail_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/payment-histories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.paymentDetail.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('payment_history_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/payment-histories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.payment-histories.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.paymentHistory.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('setting_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/app-settings*")||request()->is("admin/m-settings*")||request()->is("admin/payment-settings*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.setting.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('app_setting_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/app-settings*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.app-settings.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.appSetting.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('m_setting_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/m-settings*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.m-settings.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.mSetting.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('payment_setting_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/payment-settings*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.payment-settings.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.paymentSetting.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('static_page_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/static-pages*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.static-pages.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.staticPage.title') }}
                        </a>
                    </li>
                @endcan
                @can('request_history_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/request-histories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.request-histories.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.requestHistory.title') }}
                        </a>
                    </li>
                @endcan
                @can('providersettlement_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/providersettlements*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.providersettlements.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.providersettlement.title') }}
                        </a>
                    </li>
                @endcan

                @if(file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))
                    @can('auth_profile_edit')
                        <li class="items-center">
                            <a href="{{ route("profile.show") }}" class="{{ request()->is("profile") ? "sidebar-nav-active" : "sidebar-nav" }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-user-circle"></i>
                                {{ trans('global.my_profile') }}
                            </a>
                        </li>
                    @endcan
                @endif

                <li class="items-center">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="sidebar-nav">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>