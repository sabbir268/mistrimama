<?php

namespace App\Listeners;

use App\Events\ImageUploadEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Image;

class ImageUploadEventListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ImageUploadEvent  $event
     * @return void
     */
    public function handle(ImageUploadEvent $event)
    {
        $image = $event->image;
        $input['imagename'] = $event->imageName . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());

        //  $image->move($destinationPath, $input['imagename']);
        $destinationPath = public_path('/uploads/SP/');
        $img->resize(250, 250, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $input['imagename']);
    }
}
