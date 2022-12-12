<?php

namespace App\Http\Requests;

use App\Rules\CheckUserPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class UserAuthRequest extends FormRequest
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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'old_password' => ['required', 'string', new CheckUserPasswordRule(auth()->user())]
        ];
    }

    public function attributes()
    {
        return [
            'password' => __('admin.user_settings.password'),
            'old_password' => __('admin.user_settings.old_password')
        ];
    }
}
