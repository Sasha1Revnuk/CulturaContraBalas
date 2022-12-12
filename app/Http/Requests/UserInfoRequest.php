<?php

namespace App\Http\Requests;

use App\Enumerators\Admin\AdminSettingsEnumerator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserInfoRequest extends FormRequest
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
            'mode' => [
                'required',
                Rule::in([AdminSettingsEnumerator::DARK_THEME, AdminSettingsEnumerator::LIGHT_THEME])
            ],
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('admin.user_settings.name'),
            'surname' => __('admin.user_settings.surname'),
            'father_name' => __('admin.user_settings.father_name'),
            'phone' => __('admin.user_settings.phone'),
            'mode' => __('admin.user_settings.mode'),
        ];
    }
}
