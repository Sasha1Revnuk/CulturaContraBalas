<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramPhoto;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $imagePath = request()->file('file')->store('program_photo', 'public');
        $thumbName = $this->saveThumbnail(storage_path('app/public/' . $imagePath));
        $imagePath = '/storage/' . $imagePath;
        $thumbPath = '/storage/program_photo/' . $thumbName;
        $image = explode('/', $imagePath);
        $image = $image[count($image) - 1];


        ProgramPhoto::create([
            'path' => $imagePath,
            'image' => $image,
            'thumbnail' => $thumbPath
        ]);
        return response()->json(['location' => url($imagePath)]);
    }

    private function saveThumbnail(string $photoPath): string
    {
        $img = \Image::make($photoPath);
        $img->resize(250, 150, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $thumbName = $img->filename . '_thumb.' . $img->extension;
        $img->save(storage_path('app/public/program_photo/' . $thumbName), 85);

        return $thumbName;
    }
}

