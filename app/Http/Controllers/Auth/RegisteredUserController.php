<?php

namespace App\Http\Controllers\Auth;

use App\Classes\Admin\UserClass;
use App\Enumerators\Admin\RolesEnumerator;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    private $userClass;

    public function __construct(UserClass $userClass)
    {
        $this->userClass = $userClass;
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'father_name' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [], [
            'name' => 'Ім\'я',
            'surname' => 'Прізвище',
            'father_name' => 'По батькові',
            'phone' => 'Телефон',
            'email' => 'Пошта',
            'password' => 'Пароль',
        ]);

        $user = $this->userClass->create($request->all());
        $userRole = \Spatie\Permission\Models\Role::where('name', RolesEnumerator::ROLE_USER)->first();
        if ($userRole) {
            $user->assignRole($userRole->name);
            foreach ($userRole->permissions()->get() as $permission) {
                $user->givePermissionTo($permission->name);
            }
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
