<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveUserInfoFormRequest;
use App\Services\API\Messages;
use App\Services\Users\UserRegistrationService;
use Illuminate\Http\Request;

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

        // Use the service to register the user
        $user = $this->userRegistrationService->registerOrUpdateUser($data, $file);

        return Messages::success([], 'User created successfully');
        // Return a JSON response for API
        /*return response()->json([
            'status' => 'success',
            'user' => $user,
            'message' => 'User registered successfully',
        ], 201);*/
    }
}
