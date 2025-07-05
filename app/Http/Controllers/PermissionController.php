<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view_permissions', ['only' => ['index', 'show']]);
        $this->middleware('permission:create_permissions', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_permissions', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_permissions', ['only' => ['destroy']]);
    }


    public function index()
    {
        $query = Permission::query();

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

        $permissions = $query->get();
        return view('admin.role-permission.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.role-permission.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
            'guard_name' => 'required',
            'status' => 'required|boolean'
        ]);

        Permission::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
            'status' => $request->status
        ]);

        return redirect()->route('permissions.index')
            ->with('success', 'تم إنشاء الصلاحية بنجاح');
    }

    public function edit(Permission $permission)
    {
        return view('admin.role-permission.permission.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $permission->id,
            'guard_name' => 'required',
            'status' => 'required|boolean'
        ]);

        $permission->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
            'status' => $request->status
        ]);

        return redirect()->route('permissions.index')
            ->with('success', 'تم تحديث الصلاحية بنجاح');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')
            ->with('success', 'تم حذف الصلاحية بنجاح');
    }

    public function show(Permission $permission)
    {
        $permission->load('roles');

        return view('admin.role-permission.permission.show', [
            'permission' => $permission,
            'roles' => $permission->roles,
            'title' => __('dashboard.permission_details'),
            'breadcrumb' => [
                ['name' => __('dashboard.permissions'), 'url' => route('permissions.index')],
                ['name' => $permission->name, 'url' => '#'],
            ]
        ]);
    }
}
