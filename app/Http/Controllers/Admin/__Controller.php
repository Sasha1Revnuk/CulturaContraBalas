<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\__Repository;
use App\Repositories\RequestRepository;
use App\Services\SortingService;
use App\Services\TableService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class __Controller extends Controller
{
    public function __construct(__Repository $__repository)
    {
        $this->__repository = $__repository;
    }

    public function index() : View
    {
        $data = [
            'meta' => [
                'pageTitle' => ''
            ],
            'breadcrumbs' => [
                '' => '',
            ],
        ];

        return view('admin.__.index', $data);
    }


    public function getApi( Request $request) : JsonResponse
    {
        return response()->json($this->__repository->getApi($request));
    }

    public function form( __ $__) : View
    {
        $data = [
            'meta' => [
                'pageTitle' => $__->id ? __('content/buttons.edit') . ' ' . $__->title : __('content/buttons.add')
            ],
            'breadcrumbs' => [
                '__' => route('admin.__.index'),
                $__->id ? __('content/buttons.edit') . ' ' . $__->title : __('content/buttons.add') => '',
            ],

            '__' => $__->id ? $__ : null,
        ];

        return view('admin.__.form', $data);
    }


    public function store(__Request $request, __ $__) : RedirectResponse
    {
        $model = $this->__repository->store($__, RequestRepository::getObject($request));
        return redirect()->route('admin.__.form', ['__' => $model]);
    }

    public function sorting( SortingService $sortingService, Request $request) : JsonResponse
    {
        $sortingService->sort($request->get('ids'), $request->get('ranges'), __::class);

        return response()->json(true, 200);
    }

    public function delete(__ $__) : JsonResponse
    {
        $this->__repository->delete($__);
        return response()->json(true, 200);
    }
}
