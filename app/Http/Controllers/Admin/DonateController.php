<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Admin\PageEnumerator;
use App\Http\Controllers\Controller;
use App\Http\Requests\Page\PageRequest;
use App\Models\Page;
use App\Models\PageTranslation;
use App\Repositories\Admin\Donate\DonateRepository;
use Dotlogics\Grapesjs\App\Traits\EditorTrait;
use Illuminate\Http\Request;


class DonateController extends Controller
{
    use EditorTrait;

    private $repository;

    public function __construct(DonateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $data = [
            'meta' => [
                'pageTitle' => __('admin.menu.donate'),
            ],
            'breadcrumbs' => [
                __('admin.menu.donate') => '',
            ],
            'pageTranslations' => Page::where('slug', PageEnumerator::DONATEPAGE_SLUG)->first()->translations

        ];

        return view('admin.donate.index', $data);
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
