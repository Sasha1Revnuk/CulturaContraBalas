<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Admin\PageEnumerator;
use App\Http\Controllers\Controller;
use App\Http\Requests\Page\PageRequest;
use App\Models\Page;
use App\Models\PageTranslation;
use App\Repositories\Admin\About\AboutRepository;
use Dotlogics\Grapesjs\App\Traits\EditorTrait;
use Illuminate\Http\Request;


class AboutController extends Controller
{
    use EditorTrait;

    private $repository;

    public function __construct(AboutRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $data = [
            'meta' => [
                'pageTitle' => __('admin.menu.about'),
            ],
            'breadcrumbs' => [
                __('admin.menu.about') => '',
            ],
            'pageTranslations' => Page::where('slug', PageEnumerator::ABOUTPAGE_SLUG)->first()->translations

        ];

        return view('admin.main.index', $data);
    }

    public function editor(Request $request, PageTranslation $pageTranslation)
    {
        return $this->show_gjs_editor($request, $pageTranslation);
    }

    public function storeSeo(PageRequest $mainPageRequest)
    {
        $this->repository->store($mainPageRequest->validated());
        return redirect()->back()->with(
            ['sweetAlert' => ['type' => 'success', 'title' => __('admin.system.info_stored_successfully')]]
        );
    }
}
