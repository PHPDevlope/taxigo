<?php

use App\Http\Controllers\Admin\AccountManagerController;
use App\Http\Controllers\Admin\AppSettingController;
use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DispatcherController;
use App\Http\Controllers\Admin\DisputeManagerController;
use App\Http\Controllers\Admin\DisputeRequestController;
use App\Http\Controllers\Admin\DisputeTypeController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\FleetOwnerController;
use App\Http\Controllers\Admin\GeoFencingController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MSettingController;
use App\Http\Controllers\Admin\MStatementController;
use App\Http\Controllers\Admin\PaymentHistoryController;
use App\Http\Controllers\Admin\PaymentSettingController;
use App\Http\Controllers\Admin\PeakTimeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PromocodeController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Admin\ProviderRatingController;
use App\Http\Controllers\Admin\ProvidersettlementController;
use App\Http\Controllers\Admin\RequestHistoryController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceTypeController;
use App\Http\Controllers\Admin\StaticPageController;
use App\Http\Controllers\Admin\UserAlertController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserRatingController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::post('users/media', [UserController::class, 'storeMedia'])->name('users.storeMedia');
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Audit Logs
    Route::resource('audit-logs', AuditLogController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit']]);

    // User Alert
    Route::get('user-alerts/seen', [UserAlertController::class, 'seen'])->name('user-alerts.seen');
    Route::resource('user-alerts', UserAlertController::class, ['except' => ['store', 'update', 'destroy']]);
    Route::get('user-alert', [HomeController::class, 'userAlert'])->name('user-alert');
    Route::get('user-alert/userAlert-alerts', [HomeController::class, 'userAlert'])->name('user-alert/user-alerts');

    // Role-Management
    Route::get('role-management', [HomeController::class, 'roleManagement'])->name('role-management');;
    Route::get('role-management/users', [HomeController::class, 'roleManagement'])->name('role-management.users');
    Route::get('role-management/roles', [HomeController::class, 'roleManagement'])->name('role-management.roles');
    Route::get('role-management/permissions', [HomeController::class, 'roleManagement'])->name('role-management.permissions');
    Route::get('role-management/audit-logs', [HomeController::class, 'roleManagement'])->name('role-management.audit-logs');

    // Providersettlement
    Route::resource('providersettlements', ProvidersettlementController::class, ['except' => ['store', 'update', 'destroy']]);
    Route::get('provider-settlement' , [HomeController::class, 'providerSettlement'])->name('provider-settlement');
    Route::get('provider-settlement/providersettlements' , [HomeController::class, 'providerSettlement'])->name('provider-settlement/providersettlements');

    // Documents
    Route::resource('documents', DocumentController::class, ['except' => ['store', 'update', 'destroy']]);
    Route::get('document', [HomeController::class, 'documents'])->name('document');
    Route::get('document/documents', [HomeController::class, 'documents'])->name('document/documents');

    // Dispute Types
    Route::resource('dispute-types', DisputeTypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Dispute Requests
    Route::resource('dispute-requests', DisputeRequestController::class, ['except' => ['store', 'update', 'destroy']]);

    // Dispute Panel
    Route::get('dispute-panel', [HomeController::class, 'disputePanel'])->name('dispute-panel');
    Route::get('dispute-panel/dispute-types', [HomeController::class, 'disputePanel'])->name('dispute-panel.dispute-types');
    Route::get('dispute-panel/dispute-requests', [HomeController::class, 'disputePanel'])->name('dispute-panel.dispute-requests');

    // Promocode
    Route::resource('promocodes', PromocodeController::class, ['except' => ['store', 'update', 'destroy']]);
    Route::get('promocode', [HomeController::class, 'promocodes'])->name('promocode');
    Route::get('promocode/promocodes', [HomeController::class, 'promocodes'])->name('promocode/promocodes');


    // User Ratings
    Route::resource('user-ratings', UserRatingController::class, ['except' => ['store', 'update', 'destroy']]);

    // Provider Ratings
    Route::resource('provider-ratings', ProviderRatingController::class, ['except' => ['store', 'update', 'destroy']]);

    // Ratings-reviews
    Route::get('ratings-reviews', [HomeController::class, 'ratingsReviews'])->name('ratings-reviews');
    Route::get('ratings-reviews/user-ratings', [HomeController::class, 'ratingsReviews'])->name('ratings-reviews.user-ratings');
    Route::get('ratings-reviews/provider-ratings', [HomeController::class, 'ratingsReviews'])->name('ratings-reviews.provider-ratings');

    // Payment History
    Route::resource('payment-histories', PaymentHistoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // payment Details
    Route::get('payment-details', [HomeController::class, 'paymentDetails'])->name('payment-details');
    Route::get('payment-details/payment-histories', [HomeController::class, 'paymentDetails'])->name('payment-details.payment-histories');

    // Providers
    Route::resource('providers', ProviderController::class, ['except' => ['store', 'update', 'destroy']]);

    // Fleet Owner
    Route::resource('fleet-owners', FleetOwnerController::class, ['except' => ['store', 'update', 'destroy']]);

    // Dispatcher
    Route::resource('dispatchers', DispatcherController::class, ['except' => ['store', 'update', 'destroy']]);

    // Account Manager
    Route::resource('account-managers', AccountManagerController::class, ['except' => ['store', 'update', 'destroy']]);

    // Dispute Manager
    Route::resource('dispute-managers', DisputeManagerController::class, ['except' => ['store', 'update', 'destroy']]);

    // Members
    Route::get('members', [HomeController::class, 'members'])->name('members');;
    Route::get('members/providers', [HomeController::class, 'members'])->name('members.providers');
    Route::get('members/fleet-owners', [HomeController::class, 'members'])->name('members.fleet-owners');
    Route::get('members/dispatchers', [HomeController::class, 'members'])->name('members.dispatchers');
    Route::get('members/account-managers', [HomeController::class, 'members'])->name('members.account-managers');
    Route::get('members/dispute-managers', [HomeController::class, 'members'])->name('members.dispute-managers');

    // Company
    Route::post('companies/media', [CompanyController::class, 'storeMedia'])->name('companies.storeMedia');
    Route::resource('companies', CompanyController::class, ['except' => ['store', 'update', 'destroy']]);
    Route::get('company', [HomeController::class, 'company'])->name('company');
    Route::get('company/companies', [HomeController::class, 'company'])->name('company/companies');

    // Service Type
    Route::post('service-types/media', [ServiceTypeController::class, 'storeMedia'])->name('service-types.storeMedia');
    Route::resource('service-types', ServiceTypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Peak Time
    Route::resource('peak-times', PeakTimeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Geo Fencing
    Route::resource('geo-fencings', GeoFencingController::class, ['except' => ['store', 'update', 'destroy']]);

    // Service
    Route::get('service', [HomeController::class, 'service'])->name('service');
    Route::get('service/service-types', [HomeController::class, 'service'])->name('service.service-types');
    Route::get('service/peak-times', [HomeController::class, 'service'])->name('service.peak-times');
    Route::get('service/geo-fencings', [HomeController::class, 'service'])->name('service.geo-fencings');

    // Static Page
    Route::resource('static-pages', StaticPageController::class, ['except' => ['store', 'update', 'destroy']]);
    Route::get('static-page', [HomeController::class, 'staticPage'])->name('static-page');
    Route::get('static-page/static-pages', [HomeController::class, 'staticPage'])->name('static-page/static-pages');

    // App Setting
    Route::resource('app-settings', AppSettingController::class, ['except' => ['store', 'update', 'destroy']]);

    // M Settings
    Route::resource('m-settings', MSettingController::class, ['except' => ['store', 'update', 'destroy']]);

    // M Statements
    Route::post('m-statements/media', [MStatementController::class, 'storeMedia'])->name('m-statements.storeMedia');
    Route::resource('m-statements', MStatementController::class, ['except' => ['store', 'update', 'destroy']]);
    Route::get('statements', [HomeController::class, 'statements'])->name('statements');
    Route::get('statements/m-statements', [HomeController::class, 'statements'])->name('statements/m-statements');

    // Payment Settings
    Route::resource('payment-settings', PaymentSettingController::class, ['except' => ['store', 'update', 'destroy']]);

    // Settings
    Route::get('settings', [HomeController::class, 'settings'])->name('settings');;
    Route::get('settings/m-settings', [HomeController::class, 'settings'])->name('settings.m-settings');
    Route::get('settings/app-settings', [HomeController::class, 'settings'])->name('settings.app-settings');
    Route::get('settings/payment-settings', [HomeController::class, 'settings'])->name('settings.payment-settings');

    // Request History
    Route::resource('request-histories', RequestHistoryController::class, ['except' => ['store', 'update', 'destroy']]);
    Route::get('request-history', [HomeController::class, 'requestHistory'])->name('request-history');
    Route::get('request-history/request-histories', [HomeController::class, 'requestHistory'])->name('request-history/request-histories');

    Route::get('my-account', [HomeController::class, 'myAccount'])->name('my-account');
    Route::get('my-account/security', [HomeController::class, 'myAccount'])->name('my-account.security');

});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});