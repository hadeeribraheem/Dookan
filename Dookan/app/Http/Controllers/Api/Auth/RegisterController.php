<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveUserInfoFormRequest;
use App\Services\API\Messages;
use App\Services\Users\UserRegistrationService;

class RegisterController extends Controller
{
    protected $userRegistrationService;

    public function __construct(UserRegistrationService $userRegistrationService)
    {
        $this->userRegistrationService = $userRegistrationService;
    }

    public function register(SaveUserInfoFormRequest $request)
    {
        $data = $request->validated();
        $file = $request->file('image');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
        } else {
            $file = null;
        }
        // Use the service to register the user
        $user = $this->userRegistrationService->registerNewUser($data, $file);

        return Messages::success($user, __('keywords.user_created_successfully'));
    }
}
