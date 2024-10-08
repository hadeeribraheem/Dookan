<?php

namespace App\Services\Users;

use App\Actions\ImageModalSave;
use App\Models\User;
use App\Repositories\Auth\RegisterRepository;
use App\Services\ImageService;
use App\Services\PasswordService;
use App\traits\upload_image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRegistrationService
{

    use upload_image;

    protected $registerRepository;
    protected $imageService;
    protected $passwordService;

    public function __construct(RegisterRepository $registerRepository, ImageService $imageService, PasswordService $passwordService)
    {
        $this->registerRepository = $registerRepository;
        $this->imageService = $imageService;
        $this->passwordService = $passwordService;
    }

    public function registerUser($data, $file = null, $id = null)
    {
        return DB::transaction(function() use ($data, $file, $id) {

            // Find existing user if updating
            $user = $this->registerRepository->findUserById($id);

            if ($user !== null) {
                if (empty($data['password'])) {
                    unset($data['password']); // Remove password from data if it's empty
                }
            }

            $image_name = $this->imageService->resolveImage($file, $user);
            // Save the user using the repository (for create or update)
            $user = $this->registerRepository->saveUser($data, $id);

            // Save or update the user image
            ImageModalSave::make($user->id, 'User', $image_name);


            return $user;
        });
    }

    public function registerNewUser($data, $file = null)
    {
        return $this->registerUser($data, $file);
    }

    public function updateExistingUser($data, $file = null, $id)
    {
        return $this->registerUser($data, $file, $id);
    }

}

