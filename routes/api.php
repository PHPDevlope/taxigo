<?php

use App\Http\Controllers\Api\V1\Admin\CompanyApiController;
use App\Http\Controllers\Api\V1\Admin\DisputeRequestApiController;
use App\Http\Controllers\Api\V1\Admin\DisputeTypeApiController;
use App\Http\Controllers\Api\V1\Admin\DocumentApiController;
use App\Http\Controllers\Api\V1\Admin\GeoFencingApiController;
use App\Http\Controllers\Api\V1\Admin\MSettingApiController;
use App\Http\Controllers\Api\V1\Admin\MStatementApiController;
use App\Http\Controllers\Api\V1\Admin\PaymentHistoryApiController;
use App\Http\Controllers\Api\V1\Admin\PeakTimeApiController;
use App\Http\Controllers\Api\V1\Admin\PermissionApiController;
use App\Http\Controllers\Api\V1\Admin\PromocodeApiController;
use App\Http\Controllers\Api\V1\Admin\ProviderApiController;
use App\Http\Controllers\Api\V1\Admin\ProviderLocationApiController;
use App\Http\Controllers\Api\V1\Admin\ProviderRatingApiController;
use App\Http\Controllers\Api\V1\Admin\ProvidersettlementApiController;
use App\Http\Controllers\Api\V1\Admin\RequestHistoryApiController;
use App\Http\Controllers\Api\V1\Admin\RoleApiController;
use App\Http\Controllers\Api\V1\Admin\ServiceTypeApiController;
use App\Http\Controllers\Api\V1\Admin\StaticPageApiController;
use App\Http\Controllers\Api\V1\Admin\UserAlertApiController;
use App\Http\Controllers\Api\V1\Admin\UserApiController;
use App\Http\Controllers\Api\V1\Admin\UserRatingApiController;

Route::post('login', [UserApiController::class, 'login']);
Route::post('getotp', [UserApiController::class, 'getOtp']);
Route::post('register', [UserApiController::class, 'register']);
Route::post('loginWithOtp', [UserApiController::class, 'mobileLogin']);

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', PermissionApiController::class);

    // Roles
    Route::apiResource('roles', RoleApiController::class);

    // Users
    Route::post('users/media', [UserApiController::class, 'storeMedia'])->name('users.store_media');
    Route::apiResource('users', UserApiController::class);
    Route::get('checkAccessToken', [UserApiController::class, 'accessToken']);
    Route::put('firebaseToken', [UserApiController::class, 'firebaseToken']);
    Route::put('updateUser', [UserApiController::class, 'userUpdate']);
    Route::get('userLoginProfile', [UserApiController::class, 'loginUserProfile']);

    // User Alert
    Route::apiResource('user-alerts', UserAlertApiController::class);

    // Providersettlement
    Route::apiResource('providersettlements', ProvidersettlementApiController::class);

    // Documents
    Route::apiResource('documents', DocumentApiController::class);

    // Dispute Types
    Route::apiResource('dispute-types', DisputeTypeApiController::class);

    // Promocode
    Route::apiResource('promocodes', PromocodeApiController::class);

    // Dispute Requests
    Route::apiResource('dispute-requests', DisputeRequestApiController::class);

    // User Ratings
    Route::apiResource('user-ratings', UserRatingApiController::class);

    // Provider Ratings
    Route::apiResource('provider-ratings', ProviderRatingApiController::class);

    // Payment History
    Route::apiResource('payment-histories', PaymentHistoryApiController::class);

    // Company
    Route::post('companies/media', [CompanyApiController::class, 'storeMedia'])->name('companies.store_media');
    Route::apiResource('companies', CompanyApiController::class);

    // Service Type
    Route::post('service-types/media', [ServiceTypeApiController::class, 'storeMedia'])->name('service_types.store_media');
    Route::apiResource('service-types', ServiceTypeApiController::class);

    // Peak Time
    Route::apiResource('peak-times', PeakTimeApiController::class);

    // Geo Fencing
    Route::apiResource('geo-fencings', GeoFencingApiController::class);

    // Static Page
    Route::apiResource('static-pages', StaticPageApiController::class);

    // M Settings
    Route::apiResource('m-settings', MSettingApiController::class);

    // M Statements
    Route::apiResource('m-statements', MStatementApiController::class);
    Route::post('request-statements', [MStatementApiController::class, 'statementRequest']);

    // Request History
    Route::apiResource('request-histories', RequestHistoryApiController::class);
    Route::post('request-providers', [RequestHistoryApiController::class, 'providerRequest']);
    Route::post('request-created', [RequestHistoryApiController::class, 'createdRequest']);

    // Provider Location
    Route::apiResource('provider-locations', ProviderLocationApiController::class);
    Route::post('provider-locations-createupdate', [ProviderLocationApiController::class, 'createupdate']);
});
