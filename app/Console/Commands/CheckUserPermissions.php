<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CheckUserPermissions extends Command
{
    protected $signature = 'check:permissions {email}';
    protected $description = 'Check user permissions and roles';

    public function handle()
    {
        $email = $this->argument('email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("User with email {$email} not found!");
            return;
        }

        $this->info("Checking permissions for user: {$user->name} ({$user->email})");

        // Get user roles
        $roles = $user->roles->pluck('name')->toArray();
        $this->info("Roles: " . implode(', ', $roles));

        // Get direct permissions
        $permissions = $user->getDirectPermissions()->pluck('name')->toArray();
        $this->info("Direct Permissions: " . implode(', ', $permissions));

        // Get all permissions (including through roles)
        $allPermissions = $user->getAllPermissions()->pluck('name')->toArray();
        $this->info("All Permissions: " . implode(', ', $allPermissions));

        // Check specific permissions
        $requiredPermissions = [
            'view_permission',
            'create_permission',
            'update_permission',
            'delete_permission'
        ];

        $this->info("\nChecking required permissions:");
        foreach ($requiredPermissions as $permission) {
            $hasPermission = $user->hasPermissionTo($permission);
            $this->info("{$permission}: " . ($hasPermission ? 'YES' : 'NO'));
        }
    }
}
