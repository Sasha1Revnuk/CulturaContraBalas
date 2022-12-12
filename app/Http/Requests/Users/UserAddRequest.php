<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:190'],
            'surname' => ['required', 'string', 'max:190'],
            'father_name' => ['nullable', 'string', 'max:190'],
            'phone' => ['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:190'],
            'email' => ['required', 'unique:users', 'email:rfc,dns'],
            'password' => ['required', 'string', 'max:190', 'confirmed'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Ім\'я',
            'surname' => 'Прізвище',
            'father_name' => 'Побатькові',
            'phone' => 'Телефон',
            'email' => 'Email',
            'password' => 'Пароль',
        ];
    }
}
