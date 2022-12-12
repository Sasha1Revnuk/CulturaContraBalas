<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'phone' => ['nullable', 'string', 'max:190'],
            'email' => ['nullable', 'string', 'max:190',  \Illuminate\Validation\Rule::unique('users')->ignore($this->route('user')->email, 'email')],
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
        ];
    }
}
