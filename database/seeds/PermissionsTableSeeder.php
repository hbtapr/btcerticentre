<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'exam_access',
            ],
            [
                'id'    => 18,
                'title' => 'certificate_create',
            ],
            [
                'id'    => 19,
                'title' => 'certificate_edit',
            ],
            [
                'id'    => 20,
                'title' => 'certificate_show',
            ],
            [
                'id'    => 21,
                'title' => 'certificate_delete',
            ],
            [
                'id'    => 22,
                'title' => 'certificate_access',
            ],
            [
                'id'    => 23,
                'title' => 'partner_create',
            ],
            [
                'id'    => 24,
                'title' => 'partner_edit',
            ],
            [
                'id'    => 25,
                'title' => 'partner_show',
            ],
            [
                'id'    => 26,
                'title' => 'partner_delete',
            ],
            [
                'id'    => 27,
                'title' => 'partner_access',
            ],
            [
                'id'    => 28,
                'title' => 'client_create',
            ],
            [
                'id'    => 29,
                'title' => 'client_edit',
            ],
            [
                'id'    => 30,
                'title' => 'client_show',
            ],
            [
                'id'    => 31,
                'title' => 'client_delete',
            ],
            [
                'id'    => 32,
                'title' => 'client_access',
            ],
            [
                'id'    => 33,
                'title' => 'question_create',
            ],
            [
                'id'    => 34,
                'title' => 'question_edit',
            ],
            [
                'id'    => 35,
                'title' => 'question_show',
            ],
            [
                'id'    => 36,
                'title' => 'question_delete',
            ],
            [
                'id'    => 37,
                'title' => 'question_access',
            ],
            [
                'id'    => 38,
                'title' => 'theme_create',
            ],
            [
                'id'    => 39,
                'title' => 'theme_edit',
            ],
            [
                'id'    => 40,
                'title' => 'theme_show',
            ],
            [
                'id'    => 41,
                'title' => 'theme_delete',
            ],
            [
                'id'    => 42,
                'title' => 'theme_access',
            ],
            [
                'id'    => 43,
                'title' => 'attempt_create',
            ],
            [
                'id'    => 44,
                'title' => 'attempt_edit',
            ],
            [
                'id'    => 45,
                'title' => 'attempt_show',
            ],
            [
                'id'    => 46,
                'title' => 'attempt_delete',
            ],
            [
                'id'    => 47,
                'title' => 'attempt_access',
            ],
            [
                'id'    => 48,
                'title' => 'demo_create',
            ],
            [
                'id'    => 49,
                'title' => 'demo_edit',
            ],
            [
                'id'    => 50,
                'title' => 'demo_show',
            ],
            [
                'id'    => 51,
                'title' => 'demo_delete',
            ],
            [
                'id'    => 52,
                'title' => 'demo_access',
            ],
            [
                'id'    => 53,
                'title' => 'alternative_create',
            ],
            [
                'id'    => 54,
                'title' => 'alternative_edit',
            ],
            [
                'id'    => 55,
                'title' => 'alternative_show',
            ],
            [
                'id'    => 56,
                'title' => 'alternative_delete',
            ],
            [
                'id'    => 57,
                'title' => 'alternative_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
