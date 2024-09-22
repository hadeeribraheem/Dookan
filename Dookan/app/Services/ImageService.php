<?php

namespace App\Services;

use App\traits\upload_image;
use Illuminate\Support\Facades\DB;

class ImageService
{
    use upload_image;
    protected $DefaultImage;

    public function resolveImage($file, $user = null)
    {
        //dd($file);

        return DB::transaction(function() use ($file, $user) {
            //dd($file);
            // Check if no file is provided
            if ($file === null) {
                // If no file and no user (new user case), return default
                if ($user === null) {
                    return 'default.png';
                }
                // If user exists and has an image, return that image's name
                if ($user && $user->image) {

                    return $user->image->name;
                }

                    return 'default.png';

            }
/*
 * if ($user && $user->image) {
                $oldImagePath = public_path('images/' . $user->image->name);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
*/
            /* && $user->image->name !== 'default.png'*/
            // If file is provided and user already has an image, delete old one
            if ($user && $user->image) {
                //dd($user->image->name);
                $this->deleteOldImage($user);
            }
            //dd($this->upload($file, 'users'));
            // Upload new image and return its name
            return $this->upload($file, 'users');
        });
    }

    // Delete the old image if it exists
    public function deleteOldImage($user)
    {
        /*if($user->image->name !== 'default.png') {

            $oldImagePath = public_path('images/' . $user->image->name);
            //dd($oldImagePath);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

        }*/
        // Ensure the user has an image record in the database and it's not the default image
        //&& $user->image->name !== 'default.png'
        $this->DefaultImage = 'default.png';
        if ($user->image) {
            //dd('check delete');
            // If the old image is not the default one, remove it from the file system
            if($user->image->name != $this->DefaultImage){
                $oldImagePath = public_path('images/' . $user->image->name);
                //dd($oldImagePath);

                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }

            }
            $user->image->delete();
        }

    }
}
