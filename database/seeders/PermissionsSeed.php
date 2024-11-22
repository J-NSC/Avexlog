<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class PermissionsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'super_admin',
                'display' => 'Super Administrator',
            ],
            [
                'name' => 'admin',
                'display' => 'Administrator',
            ],
            [
                'name' => 'delivery_driver',
                'display' => 'Entregador',
            ],
        ];


        $permissions = [
            'user' => [
                'create user',
                'view user',
                'edit user',
                'delete user',
            ],
            'scheduler' => [
                'create scheduler',
                'view scheduler',
                'edit scheduler',
                'delete scheduler',
            ],
            'justification' => [
                'create justification',
                'view justification',
                'edit justification',
                'delete justification',
            ],
            'Advance' => [
                'create Advance',
                'view Advance',
                'edit Advance',
                'delete Advance',
            ]
        ];

        $rolePermissions = [
            'super_admin' => array_merge(...array_values($permissions)),
            'admin' => array_diff(array_merge(...array_values($permissions)), ['delete user']),
            'delivery_driver' => array_merge(
                $permissions['scheduler'],
                $permissions['Advance'],
            ),
        ];
        DB::beginTransaction();
        try {
            foreach ($permissions as $scope => $group) {
                foreach ($group as $permission) {
                    Permission::query()->firstOrCreate([
                        'scope' => $scope,
                        'name' => $permission,
                    ]);
                    echo "Permission created: $permission\n";

                }
            }

            foreach ($roles as $roleData) {
                $role = Role::query()->firstOrCreate(
                    ['name' => $roleData['name']],
                    ['display' => $roleData['display']]
                );

                if (isset($rolePermissions[$roleData['name']])) {
                    $permissionsForRole = $rolePermissions[$roleData['name']];
                    $role->syncPermissions($permissionsForRole);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
        }
    }
}
