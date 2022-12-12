<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolesRequest extends FormRequest
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
        $roleRule = ['nullable', 'string', 'max:190', 'unique:roles'];
        if($this->route('role')) {
            $roleRule = ['required', 'string', 'max:190', \Illuminate\Validation\Rule::unique('roles')->ignore($this->route('role')->name, 'name')];
        }
        return [
            'name' => $roleRule,
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('content/roles/translates.name'),
        ];
    }
}
