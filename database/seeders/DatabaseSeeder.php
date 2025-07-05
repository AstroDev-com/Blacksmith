<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. إنشاء الصلاحيات والأدوار
        $this->call([
            RolePermissionSeeder::class,
        ]);

        // 2. إنشاء المستخدمين
        $this->call([
            UserSeeder::class,
        ]);
    }
}
