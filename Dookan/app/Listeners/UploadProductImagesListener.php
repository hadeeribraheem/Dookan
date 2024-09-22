<?php

namespace App\Listeners;

use App\Actions\ImageModalSave;
use App\Events\ProductsImagesSaveEvent;
use App\traits\upload_image;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UploadProductImagesListener
{
    use upload_image;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductsImagesSaveEvent $event): void
    {
        foreach ($event->images as $image) {
            $name = $this->upload($image, folder_name: 'products');
            ImageModalSave::make($event->product->id,'Products',$name);
        }
    }
}
