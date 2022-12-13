<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stories\StoryRequest;
use App\Models\Story;
use App\Repositories\Admin\Stories\StoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StoryController extends Controller
{
    private $repository;
    public function __construct(StoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): View
    {
        $data = [
            'meta' => [
                'pageTitle' => __('admin.stories.index'),
            ],
            'breadcrumbs' => [
                __('admin.stories.index') => '',
            ],
        ];

        return view('admin.stories.index', $data);
    }

    public function create(): View
    {
        $data = [
            'meta' => [
                'pageTitle' => __('admin.system.add'),
            ],
            'breadcrumbs' => [
                __('admin.stories.index') => route('admin.stories.index'),
                __('admin.system.add') => '',
            ],
        ];

        return view('admin.stories.create', $data);
    }

    public function edit(Story $story): View
    {
        $data = [
            'meta' => [
                'pageTitle' => __('admin.system.edit'),
            ],
            'breadcrumbs' => [
                __('admin.stories.index') => route('admin.stories.index'),
                __('admin.system.edit') => '',
            ],
            'story' => $story,
            'storyTranslations' => $story->translations
        ];

        return view('admin.stories.edit', $data);
    }

    public function store(StoryRequest $request): RedirectResponse
    {
        $story = $this->repository->store($request->validated());
        return redirect()->route('admin.stories.edit', ['story' => $story]);
    }

    public function update(StoryRequest $request, Story $story): RedirectResponse
    {
        $this->repository->update($request->validated(), $story);
        return redirect()->route('admin.stories.edit', ['story' => $story]);
    }

    public function getDataTable(Request $request) : array
    {
        return $this->repository->getDataTable($request);
    }

    public function sorting(Request $request): JsonResponse
    {
        $this->repository->sorting($request);
        return response()->json(true, 200);
    }

    public function delete(Story $story) : JsonResponse
    {
        $this->repository->delete($story);
        return response()->json(true, 200);
    }
}