<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // حذف جميع الصلاحيات والأدوار الموجودة
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate();
        Role::truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->command->info('Truncated permissions and roles tables.');

        // إنشاء الصلاحيات الأساسية
        $dashboardPermissions = ['view_dashboard', 'view_statistics', 'view_reports'];
        $userPermissions = ['view_users', 'create_users', 'edit_users', 'delete_users', 'restore_users', 'assign_user_roles'];
        $rolePermissions = ['view_roles', 'create_roles', 'edit_roles', 'delete_roles', 'assign_role_permissions', 'view_permissions'];
        $categoryPermissions = ['view_categories', 'create_categories', 'edit_categories', 'delete_categories'];
        $productPermissions = ['view_products', 'create_products', 'edit_products', 'delete_products'];
        $settingPermissions = ['view_settings', 'update_settings'];

        $allPermissions = array_merge(
            $dashboardPermissions,
            $userPermissions,
            $rolePermissions,
            $categoryPermissions,
            $productPermissions,
            $settingPermissions
        );

        DB::beginTransaction();
        try {
            // إنشاء الصلاحيات
            foreach ($allPermissions as $permission) {
                Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
            }
            $this->command->info('Created/verified all permissions.');

            // إنشاء الأدوار
            $superAdminRole = Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'web']);
            $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
            $userRole = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);
            $this->command->info('Created/verified core roles.');

            // منح جميع الصلاحيات للمدير العام
            $superAdminRole->syncPermissions($allPermissions);
            $this->command->info('Synced all permissions for super-admin.');

            // منح صلاحيات المدير
            $adminPermissions = [
                'view_dashboard',
                'view_statistics',
                'view_reports',
                'view_users',
                'create_users',
                'edit_users',
                'delete_users', // User management (no restore/assign roles)
                'view_roles',
                'view_permissions',
                'view_categories',
                'create_categories',
                'edit_categories',
                'delete_categories',
                'view_settings',
                'update_settings',
                'view_products',
                'create_products',
                'edit_products',
                'delete_products',
            ];
            $adminRole->syncPermissions($adminPermissions); // Use sync for admin too for consistency
            $this->command->info('Synced permissions for admin role.');

            // منح صلاحيات موظف المبيعات

            // منح صلاحيات موظف المخزون
            $inventoryPermissionsToAssign = [
                'view_dashboard',
                'view_products',
                'create_products',
                'edit_products',
                'delete_products',
                'view_categories',
                'create_categories',
                'edit_categories',
                'delete_categories',
            ];
            // منح صلاحيات المستخدم العادي (للقراءة فقط بشكل أساسي)
            $userPermissionsToAssign = [
                'view_dashboard',
                // Add other 'view_*' permissions as needed for basic users
                // 'view_products',
                // 'view_sales', // Maybe view own sales?
            ];
            $userRole->syncPermissions($userPermissionsToAssign);
            $this->command->info('Synced permissions for user role.');

            DB::commit();
            $this->command->info('RolePermissionSeeder finished successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->command->error('Error in RolePermissionSeeder: ' . $e->getMessage());
        }
    }
}
