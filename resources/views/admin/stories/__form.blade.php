    <ul class="nav nav-pills nav-justified" role="tablist">
        @foreach(\App\Services\LanguageService::LANGUAGES as $language)
            <li class="nav-item waves-effect waves-light">
                <a class="nav-link @if(app()->getLocale() === $language) active @endif"
                   data-bs-toggle="tab" href="#form-{{$language}}" role="tab"
                   aria-selected=" @if(app()->getLocale() === $language) true @else false @endif">
                    <span class="d-none d-sm-block">{{\App\Services\LanguageService::getLangualgeTitle()[$language]}}</span>
                </a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content p-3 text-muted">
        @foreach(\App\Services\LanguageService::LANGUAGES as $language)
            <div class="tab-pane  @if(app()->getLocale() === $language) active @endif"
                 id="form-{{$language}}"
                 role="tabpanel">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <x-admin.form.simple.input
                                type="text"
                                field="name_{{$language}}"
                                label="{{__('admin.stories.name')}}"
                                id="name_{{$language}}"
                                :required="true"
                                value="{{$storyTranslations?->where('language_slug', $language)?->first()->name}}"
                                :customAttributes="[]"
                        >
                        </x-admin.form.simple.input>
                    </div>
                    <div class="col-md-8">
                        <x-admin.form.simple.input
                                type="text"
                                field="text_{{$language}}"
                                label="{{__('admin.stories.text')}}"
                                id="text_{{$language}}"
                                :required="true"
                                value="{{$storyTranslations?->where('language_slug', $language)?->first()->text}}"
                                :customAttributes="[]"
                        >
                        </x-admin.form.simple.input>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


