<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Admin\PageEnumerator;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageTranslation;
use Dotlogics\Grapesjs\App\Traits\EditorTrait;
use Illuminate\Http\Request;


class MainController extends Controller
{
    use EditorTrait;

    public function index(Request $request)
    {
        $data = [
            'meta' => [
                'pageTitle' => __('admin.menu.mainPage'),
            ],
            'breadcrumbs' => [
                __('admin.menu.mainPage') => '',
            ],
            'pageTranslations' => Page::where('slug', PageEnumerator::MAINPAGE_SLUG)->first()->translations

        ];

        return view('admin.main.index', $data);
    }

    public function editor(Request $request, PageTranslation $pageTranslation)
    {
        return $this->show_gjs_editor($request, $pageTranslation);
    }
}
