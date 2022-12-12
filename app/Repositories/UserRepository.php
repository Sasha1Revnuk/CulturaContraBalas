<?php

namespace App\Repositories;

use App\Classes\Admin\UserClass;
use App\Enumerators\Admin\RolesEnumerator;
use App\Models\PermissionGroup;
use App\Models\User;
use App\Services\LanguageService;
use App\Services\TableService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserRepository
{
    private $userClass;

    public function __construct(TableService $tableService, UserClass $userClass)
    {
        $this->tableService = $tableService;
        $this->userClass = $userClass;
    }

    public function getDataTable(Request $request): array
    {
        $models = User::notAuthUser()->notSuperAdmin();

        if ($request->get('search')) {
            $search_field = ['%' . mb_strtolower($request->get('search')) . '%'];
            $models = $models->where(function ($q) use ($search_field) {
                $q->whereRaw('LOWER(name) like ?', $search_field)
                    ->orWhereRaw('LOWER(surname) like ?', $search_field)
                    ->orWhereRaw('LOWER(phone) like ?', $search_field)
                    ->orWhereRaw('LOWER(email) like ?', $search_field);
            });
        }

        $modelsCount = $models->count();
        $models = $models->orderBy('surname')->offset($request->get('start'))->limit($request->get('length'))->get();

        $data = [];
        foreach ($models as $model) {
            $buttons = [];
            $dataArray = [
                $model->id,
                $model->full_name,
                $model->email,
                $model->phone,
                implode('<br /> ', $model->getRoleNames()->toArray()),
                implode('<br /> ', $model->getPermissionNames()->toArray()),
            ];
            if (auth()->user()->hasDirectPermission(RolesEnumerator::PERMISSION_UPDATE_INFO_USER) ||
                auth()->user()->hasDirectPermission(RolesEnumerator::PERMISSION_UPDATE_PASSWORD_USER) ||
                auth()->user()->hasDirectPermission(RolesEnumerator::PERMISSION_UPDATE_ROLES_AND_PERMISSIONS_USER)) {
                $buttons[] = [
                    'title' => __('admin.system.edit'),
                    'href' => route('admin.users.edit', ['user' => $model]),
                ];
            }

            if (auth()->user()->hasDirectPermission(RolesEnumerator::PERMISSION_DELETE_USER)) {
                $buttons[] = [
                    'title' => __('admin.system.delete'),
                    'class' => 'delete',
                    'attributes' => [
                        'data-user' => $model->id
                    ]
                ];
            }

            $dataArray[] = $this->tableService->getButtons($buttons ?? []);
            $data[] = $dataArray;
        }
        return [
            'data' => $data,
            'recordsTotal' => $modelsCount,
            'recordsFiltered' => $modelsCount,
        ];
    }

    public function prepareAvailableRolles(): array
    {
        if (auth()->user()->hasRole(RolesEnumerator::ROLE_SUPER_ADMINISTRATOR)) {
            return Role::whereNotIn('name', [RolesEnumerator::ROLE_SUPER_ADMINISTRATOR])->get()->pluck('name')->toArray(
            );
        }

        $roles = auth()->user()->getRoleNames()->toArray();

        $keySuperAdmin = array_search(RolesEnumerator::ROLE_SUPER_ADMINISTRATOR, $roles);
        if ($keySuperAdmin !== false && $roles[$keySuperAdmin] === RolesEnumerator::ROLE_SUPER_ADMINISTRATOR) {
            unset($roles[$keySuperAdmin]);
        }
        return $roles;
    }

    public function prepareAvailablePermissionsForRoot(): array
    {
        $permissionGroups = PermissionGroup::with('permissions')->withTranslations([LanguageService::LANGUAGE_UA])->get(
        );

        $result = [];
        foreach ($permissionGroups as $group) {
            foreach ($group->permissions as $permission) {
                if (auth()->user()->hasDirectPermission($permission->name)) {
                    $rolesName = $permission->getRoleNames()->toArray();
                    $result[$group->translations->first()->title][$permission->name] = count($rolesName) ? implode(
                        ' ',
                        str_replace(' ', '', $rolesName)
                    ) : '';
                }
            }
        }
        return $result;
    }

    public function create(array $data): User
    {
        return $this->userClass->create($data);
    }

    public function syncRoles(User $user, array $roles)
    {
        $this->userClass->syncRoles($user, $roles);
    }

    public function syncPermissions(User $user, array $permissions)
    {
        $this->userClass->syncPermissions($user, $permissions);
    }


    public function update(User $user, array $data): User
    {
        $this->userClass->update($user, $data);
        return $user;
    }

    public function changePassword(User $user, string $password)
    {
        $this->userClass->update($user, [
            'password' => Hash::make($password),
        ]);
    }

    public function delete(User $user)
    {
        $this->userClass->delete($user);
        return true;
    }

}
