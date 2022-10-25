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
                'title' => 'perizinan_create',
            ],
            [
                'id'    => 19,
                'title' => 'perizinan_edit',
            ],
            [
                'id'    => 20,
                'title' => 'perizinan_show',
            ],
            [
                'id'    => 21,
                'title' => 'perizinan_delete',
            ],
            [
                'id'    => 22,
                'title' => 'perizinan_access',
            ],
            [
                'id'    => 23,
                'title' => 'data_stakeholder_create',
            ],
            [
                'id'    => 24,
                'title' => 'data_stakeholder_edit',
            ],
            [
                'id'    => 25,
                'title' => 'data_stakeholder_show',
            ],
            [
                'id'    => 26,
                'title' => 'data_stakeholder_delete',
            ],
            [
                'id'    => 27,
                'title' => 'data_stakeholder_access',
            ],
            [
                'id'    => 28,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 29,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 30,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 31,
                'title' => 'user_alert_edit',
            ],
            [
                'id'    => 32,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 33,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 34,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 35,
                'title' => 'system_calendar_access',
            ],
            [
                'id'    => 36,
                'title' => 'contact_company_create',
            ],
            [
                'id'    => 37,
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => 38,
                'title' => 'contact_company_show',
            ],
            [
                'id'    => 39,
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => 40,
                'title' => 'contact_company_access',
            ],
            [
                'id'    => 41,
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => 42,
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => 43,
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => 44,
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => 45,
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => 46,
                'title' => 'data_umum_create',
            ],
            [
                'id'    => 47,
                'title' => 'data_umum_edit',
            ],
            [
                'id'    => 48,
                'title' => 'data_umum_show',
            ],
            [
                'id'    => 49,
                'title' => 'data_umum_delete',
            ],
            [
                'id'    => 50,
                'title' => 'data_umum_access',
            ],
            [
                'id'    => 51,
                'title' => 'jenis_kerjasama_create',
            ],
            [
                'id'    => 52,
                'title' => 'jenis_kerjasama_edit',
            ],
            [
                'id'    => 53,
                'title' => 'jenis_kerjasama_show',
            ],
            [
                'id'    => 54,
                'title' => 'jenis_kerjasama_delete',
            ],
            [
                'id'    => 55,
                'title' => 'jenis_kerjasama_access',
            ],
            [
                'id'    => 56,
                'title' => 'master_data_access',
            ],
            [
                'id'    => 57,
                'title' => 'ketua_create',
            ],
            [
                'id'    => 58,
                'title' => 'ketua_edit',
            ],
            [
                'id'    => 59,
                'title' => 'ketua_show',
            ],
            [
                'id'    => 60,
                'title' => 'ketua_delete',
            ],
            [
                'id'    => 61,
                'title' => 'ketua_access',
            ],
            [
                'id'    => 62,
                'title' => 'province_create',
            ],
            [
                'id'    => 63,
                'title' => 'province_edit',
            ],
            [
                'id'    => 64,
                'title' => 'province_show',
            ],
            [
                'id'    => 65,
                'title' => 'province_delete',
            ],
            [
                'id'    => 66,
                'title' => 'province_access',
            ],
            [
                'id'    => 67,
                'title' => 'regency_create',
            ],
            [
                'id'    => 68,
                'title' => 'regency_edit',
            ],
            [
                'id'    => 69,
                'title' => 'regency_show',
            ],
            [
                'id'    => 70,
                'title' => 'regency_delete',
            ],
            [
                'id'    => 71,
                'title' => 'regency_access',
            ],
            [
                'id'    => 72,
                'title' => 'district_create',
            ],
            [
                'id'    => 73,
                'title' => 'district_edit',
            ],
            [
                'id'    => 74,
                'title' => 'district_show',
            ],
            [
                'id'    => 75,
                'title' => 'district_delete',
            ],
            [
                'id'    => 76,
                'title' => 'district_access',
            ],
            [
                'id'    => 77,
                'title' => 'village_create',
            ],
            [
                'id'    => 78,
                'title' => 'village_edit',
            ],
            [
                'id'    => 79,
                'title' => 'village_show',
            ],
            [
                'id'    => 80,
                'title' => 'village_delete',
            ],
            [
                'id'    => 81,
                'title' => 'village_access',
            ],
            [
                'id'    => 82,
                'title' => 'data_khusu_access',
            ],
            [
                'id'    => 83,
                'title' => 'data_daerah_create',
            ],
            [
                'id'    => 84,
                'title' => 'data_daerah_edit',
            ],
            [
                'id'    => 85,
                'title' => 'data_daerah_show',
            ],
            [
                'id'    => 86,
                'title' => 'data_daerah_delete',
            ],
            [
                'id'    => 87,
                'title' => 'data_daerah_access',
            ],
            [
                'id'    => 88,
                'title' => 'data_cabang_create',
            ],
            [
                'id'    => 89,
                'title' => 'data_cabang_edit',
            ],
            [
                'id'    => 90,
                'title' => 'data_cabang_show',
            ],
            [
                'id'    => 91,
                'title' => 'data_cabang_delete',
            ],
            [
                'id'    => 92,
                'title' => 'data_cabang_access',
            ],
            [
                'id'    => 93,
                'title' => 'data_ranting_create',
            ],
            [
                'id'    => 94,
                'title' => 'data_ranting_edit',
            ],
            [
                'id'    => 95,
                'title' => 'data_ranting_show',
            ],
            [
                'id'    => 96,
                'title' => 'data_ranting_delete',
            ],
            [
                'id'    => 97,
                'title' => 'data_ranting_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
