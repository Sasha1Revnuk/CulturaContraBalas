<?php

namespace App\Http\Requests\Stories;

use App\Services\LanguageService;
use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
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
        return LanguageService::getForRequest([
            'name' => ['required', 'string', 'max:190'],
            'text' => ['required', 'string', 'max:190'],
        ]);
    }

    public function attributes()
    {
        return LanguageService::getForRequest([
            'name' => __('admin.stories.name'),
            'text' => __('admin.stories.text'),
        ]);

    }
}
