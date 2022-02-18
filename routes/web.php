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

    // Providersettlement
    Route::resource('providersettlements', ProvidersettlementController::class, ['except' => ['store', 'update', 'destroy']]);

    // Documents
    Route::resource('documents', DocumentController::class, ['except' => ['store', 'update', 'destroy']]);

    // Dispute Types
    Route::resource('dispute-types', DisputeTypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Promocode
    Route::resource('promocodes', PromocodeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Dispute Requests
    Route::resource('dispute-requests', DisputeRequestController::class, ['except' => ['store', 'update', 'destroy']]);

    // User Ratings
    Route::resource('user-ratings', UserRatingController::class, ['except' => ['store', 'update', 'destroy']]);

    // Provider Ratings
    Route::resource('provider-ratings', ProviderRatingController::class, ['except' => ['store', 'update', 'destroy']]);

    // Payment History
    Route::resource('payment-histories', PaymentHistoryController::class, ['except' => ['store', 'update', 'destroy']]);

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

    // Company
    Route::post('companies/media', [CompanyController::class, 'storeMedia'])->name('companies.storeMedia');
    Route::resource('companies', CompanyController::class, ['except' => ['store', 'update', 'destroy']]);

    // Service Type
    Route::post('service-types/media', [ServiceTypeController::class, 'storeMedia'])->name('service-types.storeMedia');
    Route::resource('service-types', ServiceTypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Peak Time
    Route::resource('peak-times', PeakTimeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Geo Fencing
    Route::resource('geo-fencings', GeoFencingController::class, ['except' => ['store', 'update', 'destroy']]);

    // Static Page
    Route::resource('static-pages', StaticPageController::class, ['except' => ['store', 'update', 'destroy']]);

    // App Setting
    Route::resource('app-settings', AppSettingController::class, ['except' => ['store', 'update', 'destroy']]);

    // M Settings
    Route::resource('m-settings', MSettingController::class, ['except' => ['store', 'update', 'destroy']]);

    // M Statements
    Route::post('m-statements/media', [MStatementController::class, 'storeMedia'])->name('m-statements.storeMedia');
    Route::resource('m-statements', MStatementController::class, ['except' => ['store', 'update', 'destroy']]);

    // Payment Settings
    Route::resource('payment-settings', PaymentSettingController::class, ['except' => ['store', 'update', 'destroy']]);

    // Request History
    Route::resource('request-histories', RequestHistoryController::class, ['except' => ['store', 'update', 'destroy']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
