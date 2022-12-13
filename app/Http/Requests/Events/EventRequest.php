<?php

namespace App\Http\Requests\Events;

use App\Services\LanguageService;
use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:190'],
            'short_description' => ['required', 'string', 'max:190'],
            'description' => ['required', 'string', 'max:190'],
            'meta_description' => ['nullable', 'string', 'max:190'],
            'meta_keywords' => ['nullable', 'string', 'max:190'],
            'meta_robots' => ['nullable', 'string', 'max:190'],
        ]);
        $rules['image'] = ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:10000'];
        return $rules;
    }

    public function attributes()
    {
        $titles = LanguageService::getForRequest([
            'title' => __('admin.events.title'),
            'short_description' => __('admin.events.short_description'),
            'description' => __('admin.events.description'),
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'meta_robots' => 'Meta Robots',
        ]);

        $titles['image'] = __('admin.events.image');

        return $titles;
    }
}
