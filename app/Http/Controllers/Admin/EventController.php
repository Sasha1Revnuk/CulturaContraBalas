<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\EventRequest;
use App\Models\Event;
use App\Repositories\Admin\Events\EventRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    private $repository;

    public function __construct(EventRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): View
    {
        $data = [
            'meta' => [
                'pageTitle' => __('admin.events.index'),
            ],
            'breadcrumbs' => [
                __('admin.events.index') => '',
            ],
        ];

        return view('admin.events.index', $data);
    }

    public function create(): View
    {
        $data = [
            'meta' => [
                'pageTitle' => __('admin.system.add'),
            ],
            'breadcrumbs' => [
                __('admin.events.index') => route('admin.events.index'),
                __('admin.system.add') => '',
            ],
        ];

        return view('admin.events.create', $data);
    }

    public function edit(Event $event): View
    {
        $data = [
            'meta' => [
                'pageTitle' => __('admin.system.edit'),
            ],
            'breadcrumbs' => [
                __('admin.events.index') => route('admin.events.index'),
                __('admin.system.edit') => '',
            ],
            'event' => $event,
            'eventTranslations' => $event->translations
        ];

        return view('admin.events.edit', $data);
    }

    public function store(EventRequest $request): RedirectResponse
    {
        $event = $this->repository->store($request->validated());
        return redirect()->route('admin.events.edit', ['event' => $event]);
    }

    public function update(EventRequest $request, Event $event): RedirectResponse
    {
        $this->repository->update($request->validated(), $event);
        return redirect()->route('admin.events.edit', ['event' => $event]);
    }

    public function getDataTable(Request $request): array
    {
        return $this->repository->getDataTable($request);
    }

    public function sorting(Request $request): JsonResponse
    {
        $this->repository->sorting($request);
        return response()->json(true, 200);
    }

    public function delete(Event $event): JsonResponse
    {
        $this->repository->delete($event);
        return response()->json(true, 200);
    }
}