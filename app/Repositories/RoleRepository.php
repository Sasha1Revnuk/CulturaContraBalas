<?php

namespace App\Repositories;

use App\Classes\Admin\RoleClass;
use App\Enumerators\Admin\RolesEnumerator;
use App\Services\TableService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleRepository
{
    private $roleClass;

    public function __construct(RoleClass $roleClass, TableService $tableService)
    {
        $this->tableService = $tableService;
        $this->roleClass = $roleClass;
    }

    public function getDataTable(Request $request): array
    {
        $models = Role::whereNotIn('name', RolesEnumerator::getUnvisibledRoles());
        if ($request->get('search')) {
            $search_field = ['%' . mb_strtolower($request->get('search')) . '%'];
            $models = $models->where(function ($q) use ($search_field) {
                $q->whereRaw('LOWER(name) like ?', $search_field);
            });
        }
        $modelsCount = $models->count();
        $models = $models->oldest('name')->offset($request->get('start'))->limit($request->get('length'))->get();
        $data = [];
        foreach ($models as $model) {
            $buttons = [];
            $dataArray = [
                $model->name,

            ];
            if (in_array($model->name, RolesEnumerator::getUneditedRoles()) == false) {
                $buttons[] = [
                    'title' => __('admin.system.edit'),
                    'href' => route('admin.roles.edit', ['role' => $model]),
                ];
            }

            if (in_array($model->name, RolesEnumerator::getUndeletedRoles()) == false) {
                $buttons[] = [
                    'title' => __('admin.system.delete'),
                    'attributes' => [
                        'data-role' => $model->id,
                    ],
                    'class' => 'delete',
                ];
            }

            $dataArray[] = $this->tableService->getButtons($buttons);
            $data[] = $dataArray;
        }
        return [
            'data' => $data,
            'recordsTotal' => $modelsCount,
            'recordsFiltered' => $modelsCount,
        ];
    }

    public function create(string $name, array $permissions = null): Role
    {
        $role = $this->roleClass->create($name);
        $role->syncPermissions($permissions ?? []);
        return $role;
    }

    public function update(Role $role, string $name, array $permissions = null): Role
    {
        $role = $this->roleClass->update($role, $name);
        $role->syncPermissions($permissions ?? null);
        return $role;
    }

    public function delete(Role $role)
    {
        if (in_array($role->name, RolesEnumerator::getUndeletedRoles()) == false) {
            $this->roleClass->delete($role);
        }
    }

}
