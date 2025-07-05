<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends SpatieRole
{
    protected $table = 'roles';
    protected $fillable = [
        'name',
        'guard_name',
        'status'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'model_has_roles', 'role_id', 'model_id');
    }
    // ================:: Function ::================
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions');
    }
    // ================:: Function ::================
    public static function defaultRoleId()
    {
        return self::where('name', 'user')->value('id') ?? 1;
    }
}
