<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 19,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_edit',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 23,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 24,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 25,
                'title' => 'providersettlement_create',
            ],
            [
                'id'    => 26,
                'title' => 'providersettlement_edit',
            ],
            [
                'id'    => 27,
                'title' => 'providersettlement_show',
            ],
            [
                'id'    => 28,
                'title' => 'providersettlement_delete',
            ],
            [
                'id'    => 29,
                'title' => 'providersettlement_access',
            ],
            [
                'id'    => 30,
                'title' => 'document_create',
            ],
            [
                'id'    => 31,
                'title' => 'document_edit',
            ],
            [
                'id'    => 32,
                'title' => 'document_show',
            ],
            [
                'id'    => 33,
                'title' => 'document_delete',
            ],
            [
                'id'    => 34,
                'title' => 'document_access',
            ],
            [
                'id'    => 35,
                'title' => 'dispute_panel_access',
            ],
            [
                'id'    => 36,
                'title' => 'dispute_type_create',
            ],
            [
                'id'    => 37,
                'title' => 'dispute_type_edit',
            ],
            [
                'id'    => 38,
                'title' => 'dispute_type_show',
            ],
            [
                'id'    => 39,
                'title' => 'dispute_type_delete',
            ],
            [
                'id'    => 40,
                'title' => 'dispute_type_access',
            ],
            [
                'id'    => 41,
                'title' => 'promocode_create',
            ],
            [
                'id'    => 42,
                'title' => 'promocode_edit',
            ],
            [
                'id'    => 43,
                'title' => 'promocode_show',
            ],
            [
                'id'    => 44,
                'title' => 'promocode_delete',
            ],
            [
                'id'    => 45,
                'title' => 'promocode_access',
            ],
            [
                'id'    => 46,
                'title' => 'setting_access',
            ],
            [
                'id'    => 47,
                'title' => 'dispute_request_create',
            ],
            [
                'id'    => 48,
                'title' => 'dispute_request_edit',
            ],
            [
                'id'    => 49,
                'title' => 'dispute_request_show',
            ],
            [
                'id'    => 50,
                'title' => 'dispute_request_delete',
            ],
            [
                'id'    => 51,
                'title' => 'dispute_request_access',
            ],
            [
                'id'    => 52,
                'title' => 'ratings_review_access',
            ],
            [
                'id'    => 53,
                'title' => 'user_rating_create',
            ],
            [
                'id'    => 54,
                'title' => 'user_rating_edit',
            ],
            [
                'id'    => 55,
                'title' => 'user_rating_show',
            ],
            [
                'id'    => 56,
                'title' => 'user_rating_delete',
            ],
            [
                'id'    => 57,
                'title' => 'user_rating_access',
            ],
            [
                'id'    => 58,
                'title' => 'provider_rating_create',
            ],
            [
                'id'    => 59,
                'title' => 'provider_rating_edit',
            ],
            [
                'id'    => 60,
                'title' => 'provider_rating_show',
            ],
            [
                'id'    => 61,
                'title' => 'provider_rating_delete',
            ],
            [
                'id'    => 62,
                'title' => 'provider_rating_access',
            ],
            [
                'id'    => 63,
                'title' => 'payment_detail_access',
            ],
            [
                'id'    => 64,
                'title' => 'payment_history_create',
            ],
            [
                'id'    => 65,
                'title' => 'payment_history_edit',
            ],
            [
                'id'    => 66,
                'title' => 'payment_history_show',
            ],
            [
                'id'    => 67,
                'title' => 'payment_history_delete',
            ],
            [
                'id'    => 68,
                'title' => 'payment_history_access',
            ],
            [
                'id'    => 69,
                'title' => 'member_access',
            ],
            [
                'id'    => 70,
                'title' => 'provider_create',
            ],
            [
                'id'    => 71,
                'title' => 'provider_edit',
            ],
            [
                'id'    => 72,
                'title' => 'provider_show',
            ],
            [
                'id'    => 73,
                'title' => 'provider_delete',
            ],
            [
                'id'    => 74,
                'title' => 'provider_access',
            ],
            [
                'id'    => 75,
                'title' => 'fleet_owner_create',
            ],
            [
                'id'    => 76,
                'title' => 'fleet_owner_edit',
            ],
            [
                'id'    => 77,
                'title' => 'fleet_owner_show',
            ],
            [
                'id'    => 78,
                'title' => 'fleet_owner_delete',
            ],
            [
                'id'    => 79,
                'title' => 'fleet_owner_access',
            ],
            [
                'id'    => 80,
                'title' => 'dispatcher_create',
            ],
            [
                'id'    => 81,
                'title' => 'dispatcher_edit',
            ],
            [
                'id'    => 82,
                'title' => 'dispatcher_show',
            ],
            [
                'id'    => 83,
                'title' => 'dispatcher_delete',
            ],
            [
                'id'    => 84,
                'title' => 'dispatcher_access',
            ],
            [
                'id'    => 85,
                'title' => 'account_manager_create',
            ],
            [
                'id'    => 86,
                'title' => 'account_manager_edit',
            ],
            [
                'id'    => 87,
                'title' => 'account_manager_show',
            ],
            [
                'id'    => 88,
                'title' => 'account_manager_delete',
            ],
            [
                'id'    => 89,
                'title' => 'account_manager_access',
            ],
            [
                'id'    => 90,
                'title' => 'dispute_manager_create',
            ],
            [
                'id'    => 91,
                'title' => 'dispute_manager_edit',
            ],
            [
                'id'    => 92,
                'title' => 'dispute_manager_show',
            ],
            [
                'id'    => 93,
                'title' => 'dispute_manager_delete',
            ],
            [
                'id'    => 94,
                'title' => 'dispute_manager_access',
            ],
            [
                'id'    => 95,
                'title' => 'company_create',
            ],
            [
                'id'    => 96,
                'title' => 'company_edit',
            ],
            [
                'id'    => 97,
                'title' => 'company_show',
            ],
            [
                'id'    => 98,
                'title' => 'company_delete',
            ],
            [
                'id'    => 99,
                'title' => 'company_access',
            ],
            [
                'id'    => 100,
                'title' => 'service_type_create',
            ],
            [
                'id'    => 101,
                'title' => 'service_type_edit',
            ],
            [
                'id'    => 102,
                'title' => 'service_type_show',
            ],
            [
                'id'    => 103,
                'title' => 'service_type_delete',
            ],
            [
                'id'    => 104,
                'title' => 'service_type_access',
            ],
            [
                'id'    => 105,
                'title' => 'peak_time_create',
            ],
            [
                'id'    => 106,
                'title' => 'peak_time_edit',
            ],
            [
                'id'    => 107,
                'title' => 'peak_time_show',
            ],
            [
                'id'    => 108,
                'title' => 'peak_time_delete',
            ],
            [
                'id'    => 109,
                'title' => 'peak_time_access',
            ],
            [
                'id'    => 110,
                'title' => 'geo_fencing_create',
            ],
            [
                'id'    => 111,
                'title' => 'geo_fencing_edit',
            ],
            [
                'id'    => 112,
                'title' => 'geo_fencing_show',
            ],
            [
                'id'    => 113,
                'title' => 'geo_fencing_delete',
            ],
            [
                'id'    => 114,
                'title' => 'geo_fencing_access',
            ],
            [
                'id'    => 115,
                'title' => 'service_access',
            ],
            [
                'id'    => 116,
                'title' => 'static_page_create',
            ],
            [
                'id'    => 117,
                'title' => 'static_page_edit',
            ],
            [
                'id'    => 118,
                'title' => 'static_page_show',
            ],
            [
                'id'    => 119,
                'title' => 'static_page_delete',
            ],
            [
                'id'    => 120,
                'title' => 'static_page_access',
            ],
            [
                'id'    => 121,
                'title' => 'app_setting_create',
            ],
            [
                'id'    => 122,
                'title' => 'app_setting_edit',
            ],
            [
                'id'    => 123,
                'title' => 'app_setting_show',
            ],
            [
                'id'    => 124,
                'title' => 'app_setting_delete',
            ],
            [
                'id'    => 125,
                'title' => 'app_setting_access',
            ],
            [
                'id'    => 126,
                'title' => 'm_setting_create',
            ],
            [
                'id'    => 127,
                'title' => 'm_setting_edit',
            ],
            [
                'id'    => 128,
                'title' => 'm_setting_show',
            ],
            [
                'id'    => 129,
                'title' => 'm_setting_delete',
            ],
            [
                'id'    => 130,
                'title' => 'm_setting_access',
            ],
            [
                'id'    => 131,
                'title' => 'm_statement_create',
            ],
            [
                'id'    => 132,
                'title' => 'm_statement_edit',
            ],
            [
                'id'    => 133,
                'title' => 'm_statement_show',
            ],
            [
                'id'    => 134,
                'title' => 'm_statement_delete',
            ],
            [
                'id'    => 135,
                'title' => 'm_statement_access',
            ],
            [
                'id'    => 136,
                'title' => 'payment_setting_create',
            ],
            [
                'id'    => 137,
                'title' => 'payment_setting_edit',
            ],
            [
                'id'    => 138,
                'title' => 'payment_setting_show',
            ],
            [
                'id'    => 139,
                'title' => 'payment_setting_delete',
            ],
            [
                'id'    => 140,
                'title' => 'payment_setting_access',
            ],
            [
                'id'    => 141,
                'title' => 'request_history_create',
            ],
            [
                'id'    => 142,
                'title' => 'request_history_edit',
            ],
            [
                'id'    => 143,
                'title' => 'request_history_show',
            ],
            [
                'id'    => 144,
                'title' => 'request_history_delete',
            ],
            [
                'id'    => 145,
                'title' => 'request_history_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
