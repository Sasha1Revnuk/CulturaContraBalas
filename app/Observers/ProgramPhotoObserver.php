<?php

namespace App\Observers;

use App\Models\ProgramPhoto;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProgramPhotoObserver
{
    /**
     * Handle the ProgramPhoto "created" event.
     *
     * @param \App\Models\ProgramPhoto $programPhoto
     * @return void
     */
    public function created(ProgramPhoto $programPhoto)
    {
        //
    }

    /**
     * Handle the ProgramPhoto "updated" event.
     *
     * @param \App\Models\ProgramPhoto $programPhoto
     * @return void
     */
    public function updated(ProgramPhoto $programPhoto)
    {
        //
    }

    /**
     * Handle the ProgramPhoto "deleted" event.
     *
     * @param \App\Models\ProgramPhoto $programPhoto
     * @return void
     */
    public function deleted(ProgramPhoto $programPhoto)
    {
        try {
            Storage::disk('public')->delete(str_replace('/storage/', '', $programPhoto->path));
        } catch (\Excepttion $exception) {
            Log::error($exception->getMessage());
        }

        try {
            Storage::disk('public')->delete(str_replace('/storage/', '', $programPhoto->thumbnail));
        } catch (\Excepttion $exception) {
            Log::error($exception->getMessage());
        }
    }

    /**
     * Handle the ProgramPhoto "restored" event.
     *
     * @param \App\Models\ProgramPhoto $programPhoto
     * @return void
     */
    public function restored(ProgramPhoto $programPhoto)
    {
        //
    }

    /**
     * Handle the ProgramPhoto "force deleted" event.
     *
     * @param \App\Models\ProgramPhoto $programPhoto
     * @return void
     */
    public function forceDeleted(ProgramPhoto $programPhoto)
    {
        //
    }
}
