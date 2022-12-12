<?php

namespace App\Console\Commands;

use App\Classes\Admin\PermissionGroupClass;
use App\Classes\Admin\UserClass;
use App\Enumerators\Admin\AdminSettingsEnumerator;
use App\Enumerators\Admin\RolesEnumerator;
use App\Models\AdminSettings;
use App\Models\AdminSettingsTranslations;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class InitialCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:init {--method=handle}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initial project';


    private $adminSettingsEnumerator;
    private $userClass;
    private $permissionGroupClass;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        AdminSettingsEnumerator $adminSettingsEnumerator,
        UserClass $userClass,
        PermissionGroupClass $permissionGroupClass
    ) {
        parent::__construct();
        $this->adminSettingsEnumerator = $adminSettingsEnumerator;
        $this->userClass = $userClass;
        $this->permissionGroupClass = $permissionGroupClass;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->option('method') == 'handle') {
            app()[PermissionRegistrar::class]->forgetCachedPermissions();
            $this->initialAdminSettings();
            $this->createRoles();
            $this->createPermissions();
            $this->asignAllPermissionToRoot();
            $this->createRoot();
            $this->addGroups();
        } else {
            $method = $this->option('method');
            $this->$method();
        }
        return 0;
    }

    private function createRoles()
    {
        $rolesList = [RolesEnumerator::ROLE_SUPER_ADMINISTRATOR, RolesEnumerator::ROLE_USER];
        foreach ($rolesList as $role) {
            Role::updateOrCreate(['name' => $role], []);
        }
    }

    private function createPermissions()
    {
        $permissionsList = RolesEnumerator::getPermissionList();
        foreach ($permissionsList as $permission) {
            Permission::updateOrCreate(['name' => $permission], []);
        }
    }

    private function createRoot()
    {
        $root = Role::where('name', RolesEnumerator::ROLE_SUPER_ADMINISTRATOR)->first();
        $user = Role::where('name', RolesEnumerator::ROLE_USER)->first();
        if ($root) {
            DB::table('users')->delete();
            $sasha = $this->userClass->create([
                'name' => 'Олександр',
                'surname' => 'Ревнюк',
                'father_name' => 'Андрійович',
                'email' => 'revnyuk.a@isitlab.com',
                'password' => 'n92ZF7aGx4PH2cNUrrN26amM7i4',
            ]);

            $sasha->assignRole($root);
            $sasha->assignRole($user);
            foreach ($root->permissions()->get() as $permission) {
                $sasha->givePermissionTo($permission->name);
            }
        }
    }

    private function asingAllPermissionWithRootRole()
    {
        $root = Role::where('name', RolesEnumerator::ROLE_SUPER_ADMINISTRATOR)->first();
        $users = $root->users;
        foreach ($users as $user) {
            $user->syncPermissions(Permission::all()->pluck('name'));
        }
    }

    private function asignAllPermissionToRoot()
    {
        $role = Role::where('name', RolesEnumerator::ROLE_SUPER_ADMINISTRATOR)->first();
        if ($role) {
            $role->syncPermissions(Permission::all()->pluck('name'));
        }
    }

    private function addGroups()
    {
        DB::table('permission_groups')->delete();

        $adminSystemGroup = $this->permissionGroupClass->create('adminSystemGroup', [
            'ua' => 'Функціонал адміністратора',
            'en' => 'Functionality of the administrator'
        ]);
        $adminSystemGroup->givePermissionTo(RolesEnumerator::PERMISSION_LOGIN_TO_ADMIN);

        $rolesGroup = $this->permissionGroupClass->create('rolesGroup', [
            'ua' => 'Ролі',
            'en' => 'Roles'
        ]);
        $rolesGroup->givePermissionTo(
            RolesEnumerator::PERMISSION_SHOW_ROLES_LIST,
            RolesEnumerator::PERMISSION_CREATE_ROLE,
            RolesEnumerator::PERMISSION_UPDATE_ROLE,
            RolesEnumerator::PERMISSION_DELETE_ROLE
        );

        $usersGroup = $this->permissionGroupClass->create('usersGroup', [
            'ua' => 'Користувачі',
            'en' => 'Users'
        ]);
        $usersGroup->givePermissionTo(
            RolesEnumerator::PERMISSION_SHOW_USER_LIST,
            RolesEnumerator::PERMISSION_CREATE_USER,
            RolesEnumerator::PERMISSION_UPDATE_INFO_USER,
            RolesEnumerator::PERMISSION_UPDATE_PASSWORD_USER,
            RolesEnumerator::PERMISSION_UPDATE_ROLES_AND_PERMISSIONS_USER,
            RolesEnumerator::PERMISSION_DELETE_USER
        );
    }

    private function initialAdminSettings()
    {
        foreach ($this->adminSettingsEnumerator->getValues() as $value) {
            $settings = AdminSettings::updateOrCreate([
                'key' => $value['key'],
            ], [
                'default_value' => $value['default_value'],
                'type' => $value['type'],
            ]);

            foreach ($value['translations'] as $language => $title) {
                AdminSettingsTranslations::updateOrCreate([
                    'language_slug' => $language,
                    'admin_settings_id' => $settings->id,
                ], [
                    'title' => $title,
                ]);
            }
        }
    }
}
