<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ProgramPhotoController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $programImages = ProgramPhoto::latest('created_at')->paginate(8);
        $links = $programImages->links(
            'vendor.pagination.custom_default',
            ['paginationClass' => 'paginationProgramImage']
        );
        $programImages = $programImages->map(function ($item) {
            return [
                'id' => $item->id,
                'path' => $item->path,
                'image' => $item->image,
                'thumbnail' => $item->thumbnail,
                'ifUsed' => $item->ifUsed($item->image)
            ];
        })->toArray();
        return view('admin.programPhotos.images', compact('programImages', 'links'));
    }

    public function download(ProgramPhoto $programPhoto): StreamedResponse
    {
        return Storage::disk('public')->download(str_replace('/storage/', '', $programPhoto->path));
    }

    public function delete(ProgramPhoto $programPhoto)
    {
        $programPhoto->delete();
    }
}
