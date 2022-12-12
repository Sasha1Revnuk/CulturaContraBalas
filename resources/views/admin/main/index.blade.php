@extends('layouts.admin.components.pages.indexClear')
@section('styles')
@endsection

@section('pageContent')
    <div class="row">
        <div class="col-md-4">
            <x-admin.card :withHeader="false" :withFooter="false">
                <x-slot name="body">
                    <div class="d-flex justify-content-between">
                        @foreach($pageTranslations as $pageTranslation)
                            <a href="{{route('admin.main.editor', ['pageTranslation' => $pageTranslation])}}"
                               class="btn btn-outline-primary waves-effect waves-light">
                                <img
                                        src="{{asset('/adm/custom/flags/' . \App\Services\LanguageService::getLanguagePhoto()[$pageTranslation->language_slug])}}"
                                        alt="{{$pageTranslation->language_slug}}" class="me-1" height="12">
                                <span class="align-middle">{{\App\Services\LanguageService::getLangualgeTitle()[$pageTranslation->language_slug]}}</span>
                            </a>
                        @endforeach
                    </div>
                </x-slot>

            </x-admin.card>

        </div>
        <div class="col-md-8">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <x-admin.card :withHeader="true" :withFooter="true">
                    <x-slot name="header"
                            class="text-right">SEO
                    </x-slot>
                    <x-slot name="body">
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            @foreach(\App\Services\LanguageService::LANGUAGES as $language)
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link @if(app()->getLocale() === $language) active @endif"
                                       data-bs-toggle="tab" href="#seo-{{$language}}" role="tab"
                                       aria-selected=" @if(app()->getLocale() === $language) true @else false @endif">
                                        <span class="d-none d-sm-block">{{\App\Services\LanguageService::getLangualgeTitle()[$language]}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content p-3 text-muted">
                            @foreach(\App\Services\LanguageService::LANGUAGES as $language)
                                <div class="tab-pane  @if(app()->getLocale() === $language) active @endif"
                                     id="seo-{{$language}}"
                                     role="tabpanel">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-8">
                                            <x-admin.form.simple.input
                                                    field="{{$language}}_meta_descriptions"
                                                    label="Meta Descriptions"
                                                    id="{{$language}}_meta_descriptions"
                                                    value="{{$pageTranslations->where('language_slug', $language)->first()?->metaDescription}}"
                                                    :customAttributes="[
                                                        'placeholder' => 'Meta Descriptions ' . $language
                                                ]"
                                            >
                                            </x-admin.form.simple.input>
                                        </div>
                                        <div class="col-md-8">
                                            <x-admin.form.simple.input
                                                    field="{{$language}}_meta_keywords"
                                                    label="Meta Keywords"
                                                    id="{{$language}}_meta_keywords"
                                                    value="{{$pageTranslations->where('language_slug', $language)->first()?->metaKeywords}}"
                                                    :customAttributes="[
                                                        'placeholder' => 'Meta Keywords ' . $language
                                                ]"
                                            >
                                            </x-admin.form.simple.input>
                                        </div>
                                        <div class="col-md-8">
                                            <x-admin.form.simple.input
                                                    field="{{$language}}_meta_robots"
                                                    label="Meta Robots"
                                                    id="{{$language}}_meta_robots"
                                                    value="{{$pageTranslations->where('language_slug', $language)->first()?->metaRobots}}"
                                                    :customAttributes="[
                                                        'placeholder' => 'Meta Robots ' . $language
                                                ]"
                                            >
                                            </x-admin.form.simple.input>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </x-slot>
                    <x-slot name="footer" class="border-top text-center">
                        <x-admin.button
                                type="submit"
                                class="btn-success"
                                :customAttributes="[]">{{__('admin.system.save')}}
                        </x-admin.button>
                    </x-slot>

                </x-admin.card>
            </form>

        </div>
    </div>
@endsection

@section('modals')
@endsection

@section('scripts')
@endsection
