<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\CreateRoleRequest;
use App\Http\Requests\Roles\UpdateRoleRequest;
use App\Models\PermissionGroup;
use App\Repositories\RoleRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index(): View
    {
        $data = [
            'meta' => [
                'pageTitle' => __('admin.roles.roles')
            ],
            'breadcrumbs' => [
                __('admin.roles.roles') => '',
            ],
        ];

        return view('admin.roles.index', $data);
    }

    public function getDataTable(Request $request): JsonResponse
    {
        return response()->json($this->roleRepository->getDataTable($request));
    }

    public function create(): View
    {
        $permissionGroups = PermissionGroup::with('permissions')->withTranslations([app()->getLocale()])->get();
        $data = [
            'meta' => [
                'pageTitle' => __('admin.system.create')
            ],
            'breadcrumbs' => [
                __('admin.roles.roles') => route('admin.roles.index'),
                __('admin.system.create') => '',
            ],
            'permissionGroups' => $permissionGroups,

        ];

        return view('admin.roles.create', $data);
    }

    public function edit(Role $role): View
    {
        $permissionGroups = PermissionGroup::with('permissions')->withTranslations([app()->getLocale()])->get();
        $data = [
            'meta' => [
                'pageTitle' => __('admin.system.edit') . ' ' . $role->name
            ],
            'breadcrumbs' => [
                __('admin.roles.roles') => route('admin.roles.index'),
                __('admin.system.edit') . ' ' . $role->name => '',
            ],
            'permissionGroups' => $permissionGroups,
            'role' => $role,

        ];

        return view('admin.roles.edit', $data);
    }


    public function store(CreateRoleRequest $request): RedirectResponse
    {
        return redirect()->route(
            'admin.roles.edit',
            ['role' => $this->roleRepository->create($request->name, $request->permissions)]
        );
    }

    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        return redirect()->route(
            'admin.roles.edit',
            ['role' => $this->roleRepository->update($role, $request->name, $request->permissions)]
        );
    }


    public function delete(Role $role): JsonResponse
    {
        $this->roleRepository->delete($role);
        return response()->json(true, 200);
    }
}
