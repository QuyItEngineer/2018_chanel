<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $roleNames = [
            'admin',
            'user'
        ];

        $permissionMapping = [
            'admin.create',
            'user'
        ];

        $roles = [];

        foreach ($roleNames as $roleName) {
            $roles[$roleName] = Role::create([
                'name' => $roleName
            ]);
        }

        foreach ($permissionMapping as $roleName => $permissionNames) {
            if (!isset($roles[$roleName])) {
                break;
            }
            /** @var Role $role */
            $role = $roles[$roleName];
            foreach ($permissionNames as $permissionName) {
                Permission::create([
                    'name' => $permissionName
                ]);
            }
            $role->syncPermissions($permissionNames);
        }
    }
}
