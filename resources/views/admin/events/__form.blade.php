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
            <div class="row">
                <div class="col-md-12">
                    <x-admin.form.simple.input
                            type="text"
                            field="title_{{$language}}"
                            label="{{__('admin.events.title')}}"
                            id="title_{{$language}}"
                            :required="true"
                            value="{{$eventTranslations?->where('language_slug', $language)?->first()->title}}"
                            :customAttributes="[]"
                    >
                    </x-admin.form.simple.input>
                </div>
                <div class="col-md-12">
                    <x-admin.form.simple.textarea
                            field="short_description_{{$language}}"
                            label="{{__('admin.events.short_description')}}"
                            id="short_description_{{$language}}"
                            :required="true"
                            value="{{$eventTranslations?->where('language_slug', $language)?->first()->short_description}}"
                            :customAttributes="[]"
                    >
                    </x-admin.form.simple.textarea>
                </div>
                <div class="col-md-12">
                    <x-admin.form.simple.textarea
                            class="tinyMCE"
                            field="description_{{$language}}"
                            label="{{__('admin.events.description')}}"
                            id="description_{{$language}}"
                            :required="true"
                            :value="$eventTranslations?->where('language_slug', $language)?->first()->description"
                            :customAttributes="[]"
                    >
                    </x-admin.form.simple.textarea>
                </div>
            </div>
            <div class="col-md-12 mt-4 mb-4 p-0">
                <hr/>
                <h3>SEO</h3>
                <hr/>
            </div>

            <div class="col-md-12">
                <x-admin.form.simple.input
                        field="meta_description_{{$language}}"
                        label="Meta Description"
                        id="meta_description_{{$language}}"
                        value="{{$eventTranslations?->where('language_slug', $language)->first()?->metaDescription}}"
                        :customAttributes="[
                                'placeholder' => 'Meta Descriptions ' . $language
                        ]"
                >
                </x-admin.form.simple.input>
            </div>
            <div class="col-md-12">
                <x-admin.form.simple.input
                        field="meta_keywords_{{$language}}"
                        label="Meta Keywords"
                        id="meta_keywords_{{$language}}"
                        value="{{$eventTranslations?->where('language_slug', $language)->first()?->metaKeywords}}"
                        :customAttributes="[
                                'placeholder' => 'Meta Keywords ' . $language
                        ]"
                >
                </x-admin.form.simple.input>
            </div>
            <div class="col-md-12">
                <x-admin.form.simple.input
                        field="meta_robots_{{$language}}"
                        label="Meta Robots"
                        id="meta_robots_{{$language}}"
                        value="{{$eventTranslations?->where('language_slug', $language)->first()?->metaRobots}}"
                        :customAttributes="[
                                'placeholder' => 'Meta Robots ' . $language
                        ]"
                >
                </x-admin.form.simple.input>
            </div>
        </div>
    @endforeach
</div>


