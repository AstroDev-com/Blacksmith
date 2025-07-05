<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view_roles', ['only' => ['index', 'show']]);
        $this->middleware('permission:create_roles', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_roles', ['only' => ['edit', 'update', 'addPermissionsToRole', 'givePermissionsToRole']]);
        $this->middleware('permission:delete_roles', ['only' => ['destroy']]);
    }

    // ===================  ::       roles      :: ===================
    public function index()
    {
        $query = Role::query();

        // Search functionality
        if ($search = request('search')) {
            $query->where('name', 'like', "%{$search}%");
        }

        // Status filter
        if (request()->has('status') && request('status') !== '') {
            $query->where('status', request('status'));
        }

        // Sort functionality
        if ($sort = request('sort')) {
            switch ($sort) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'date_asc':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'date_desc':
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $roles = $query->with('permissions')->get();
        return view('admin.role-permission.role.index', compact('roles'));
    }
    // ======================(***) ==== && ---------:: Function ::------- && (***)======================
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role-permission.role.create', compact('permissions'));
    }
    // ======================(***) ==== && ---------:: Function ::------- && (***)======================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'guard_name' => 'required',
            'permissions' => 'array',
            'status' => 'required|boolean'
        ]);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
            'status' => $request->status
        ]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        return redirect()->route('roles.index')
            ->with('success', 'تم إنشاء الدور بنجاح');
    }
    // ======================(***) ==== && ---------:: Function ::------- && (***)======================
    public function edit(Role $role)
    {
        $role->load('permissions');
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        return view('admin.role-permission.role.edit', compact('role', 'permissions', 'rolePermissions'));
    }
    // ======================(***) ==== && ---------:: Function ::------- && (***)======================
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'guard_name' => 'required',
            'permissions' => 'array',
            'status' => 'required|boolean'
        ]);

        $role->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
            'status' => $request->status
        ]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        return redirect()->route('roles.index')
            ->with('success', 'تم تحديث الدور بنجاح');
    }
    // ======================(***) ==== && ---------:: Function ::------- && (***)======================
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')
            ->with('success', 'تم حذف الدور بنجاح');
    }
    // ======================(***) ==== && ---------:: Function ::------- && (***)======================

    // =========================================
    public function addPermissionsToRole($roleId)
    {
        $permissions = Permission::all();
        $role = Role::with('permissions')->findOrFail($roleId);
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        return view('admin.role-permission.role.add-permissions', compact('role', 'permissions', 'rolePermissions'));
    }
    // ======================(***) ==== && ---------:: Function ::------- && (***)======================
    public function givePermissionsToRole(Request $request, $roleId)
    {
        $role = Role::findOrFail($roleId);
        if ($request->has('permission')) {
            $role->syncPermissions($request->permission);
        }
        return redirect()->route('roles.index')
            ->with('success', 'تم تحديث صلاحيات الدور بنجاح');
    }

    public function show(Role $role)
    {
        $role->load('permissions');

        return view('admin.role-permission.role.show', [
            'role' => $role,
            'permissions' => $role->permissions,
            'title' => __('dashboard.role_details'),
            'breadcrumb' => [
                ['name' => __('dashboard.roles'), 'url' => route('roles.index')],
                ['name' => $role->name, 'url' => '#'],
            ]
        ]);
    }
}
