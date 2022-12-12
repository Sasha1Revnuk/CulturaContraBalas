<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserChangePasswordRequest;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\Users\UserAddRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function index(): View
    {
        $data = [
            'meta' => [
                'pageTitle' => __('admin.users.users'),
            ],
            'breadcrumbs' => [
                __('admin.users.users') => '',
            ],
        ];

        return view('admin.users.index', $data);
    }

    public function getDataTable(Request $request): JsonResponse
    {
        return response()->json($this->userRepository->getDataTable($request));
    }


    public function create(): View
    {
        $availableRoles = $this->userRepository->prepareAvailableRolles();
        $availablePermissionGroups = $this->userRepository->prepareAvailablePermissionsForRoot();
        $data = [
            'meta' => [
                'pageTitle' => __('admin.system.add'),
            ],
            'breadcrumbs' => [
                __('admin.users.users') => route('admin.users.index'),
                __('admin.system.add') => '',
            ],

            'availableRoles' => $availableRoles,
            'availablePermissionGroups' => $availablePermissionGroups,
        ];

        return view('admin.users.create', $data);
    }


    public function store(UserAddRequest $request): RedirectResponse
    {
        $user = $this->userRepository->create($request->validated());

        if ($request->roles) {
            $this->userRepository->syncRoles($user, $request->roles);
        }

        if ($request->permissions) {
            $this->userRepository->syncPermissions($user, $request->permissions);
        }
        return redirect()->route('admin.users.index');
    }


    public function edit(User $user): View
    {
        $availableRoles = $this->userRepository->prepareAvailableRolles();
        $availablePermissionGroups = $this->userRepository->prepareAvailablePermissionsForRoot();
        $data = [
            'meta' => [
                'pageTitle' => __('admin.system.edit') . ' ' . $user->full_name,
            ],
            'breadcrumbs' => [
                __('admin.users.users') => route('admin.users.index'),
                __('admin.system.edit') . ' ' . $user->full_name => '',
            ],

            'user' => $user,
            'availableRoles' => $availableRoles,
            'availablePermissionGroups' => $availablePermissionGroups,
        ];

        return view('admin.users.edit', $data);
    }

    public function update(UserEditRequest $request, User $user): RedirectResponse
    {
        $user = $this->userRepository->update($user, $request->validated());
        return redirect()->route('admin.users.edit', ['user' => $user])->with(
            ['sweetAlert' => ['type' => 'success', 'title' => __('admin.users.info_updated')]]
        );
    }


    public function changePassword(
        UserChangePasswordRequest $request,
        User $user,
        UserRepository $repository
    ): RedirectResponse {
        $repository->changePassword($user, $request->password);
        return redirect()->route('admin.users.edit', ['user' => $user])->with(
            ['sweetAlert' => ['type' => 'success', 'title' => __('admin.users.password_updated')]]
        );
    }


    public function changeRoles(Request $request, User $user): RedirectResponse
    {
        $this->userRepository->syncRoles($user, $request->roles);
        $this->userRepository->syncPermissions($user, $request->permissions);

        return redirect()->route('admin.users.edit', ['user' => $user])->with(
            ['sweetAlert' => ['type' => 'success', 'title' => __('admin.users.roles_and_permissions_updated')]]
        );
    }


    public function delete(User $user): JsonResponse
    {
        $this->userRepository->delete($user);
        return response()->json(true, 200);
    }


}
