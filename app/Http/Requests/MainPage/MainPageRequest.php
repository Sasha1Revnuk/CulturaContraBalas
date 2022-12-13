<?php

namespace App\Http\Requests\MainPage;

use App\Services\LanguageService;
use Illuminate\Foundation\Http\FormRequest;

class MainPageRequest extends FormRequest
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
        $rules = LanguageService::getForRequest([
            'title' =>['nullable', 'string', 'max:190'],
            'meta_description' =>['nullable', 'string', 'max:190'],
            'meta_keywords' =>['nullable', 'string', 'max:190'],
            'meta_robots' =>['nullable', 'string', 'max:190'],
        ]);
        return $rules;
    }

    public function attributes()
    {
        $rules = LanguageService::getForRequest([
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'meta_robots' => 'Meta Robots',
        ]);

        return $rules;
    }
}
