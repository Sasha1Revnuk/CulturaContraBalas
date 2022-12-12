<?php

namespace App\Http\Requests\Roles;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:190',
                \Illuminate\Validation\Rule::unique('roles')->ignore($this->route('role')->name, 'name')
            ],
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('admin.roles.name'),
        ];
    }
}
